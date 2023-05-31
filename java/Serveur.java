
import com.sun.net.httpserver.HttpExchange;
import com.sun.net.httpserver.HttpHandler;
import com.sun.net.httpserver.HttpServer;

import java.io.*;
import java.net.InetSocketAddress;
import java.util.concurrent.ThreadPoolExecutor;
import java.util.HashMap;
import java.util.Map;
import java.util.TreeMap;
import java.util.concurrent.Executors;
import java.util.logging.Logger;
import com.google.gson.Gson;
import com.google.gson.GsonBuilder;


	public class Serveur {
	    // logger pour trace
	    private static final Logger LOGGER = Logger.getLogger( Serveur.class.getName() );
	    private static final String SERVEUR = "localhost"; // url de base du service
	    private static final int PORT = 8001; // port serveur
	    private static final String URL = "/api"; // url de base du service
	    // boucle principale qui lance le serveur sur le port 8001, à l'url test
	    public static void main(String[] args) {
	        HttpServer server = null;
	        try {
	            server = HttpServer.create(new InetSocketAddress(SERVEUR, PORT), 0);

	            server.createContext(URL, new  MyHttpHandler());
	            ThreadPoolExecutor threadPoolExecutor = (ThreadPoolExecutor) Executors.newFixedThreadPool(10);
	            server.setExecutor(threadPoolExecutor);
	            server.start();
	            LOGGER.info(" Server started on port " + PORT);

	            
	        } catch (IOException e) {
	            e.printStackTrace();
	        }
	    }

	    private static class MyHttpHandler implements HttpHandler {
	        /**
	         * Manage GET request param
	         * @param httpExchange
	         * @return first value
	         */
	        private String handleGetRequest(HttpExchange httpExchange) {
	            return httpExchange.getRequestURI()
	                    .toString()
	                    .split("\\?")[1]
	                    .split("=")[1];
	        }

	        /** 
	         * Generate simple response html page
	         * @param httpExchange
	         * @param requestParamVaue
	         */
	        private void handleResponseJson(HttpExchange httpExchange, String requestParamValue)  throws  IOException {
	            OutputStream outputStream = httpExchange.getResponseBody();
	            StringBuilder htmlBuilder = new StringBuilder();
	            htmlBuilder.append(requestParamValue);
	            // encode HTML content
	            String htmlResponse = htmlBuilder.toString();
	            // this line is a must
	            httpExchange.sendResponseHeaders(200, htmlResponse.length());
	            outputStream.write(htmlResponse.getBytes());
	            outputStream.flush();
	            outputStream.close();
	        }

	        // Interface method to be implemented
	        @Override
	        public void handle(HttpExchange httpExchange) throws IOException {
	            LOGGER.info(" Je réponds");
	            String requestParamValue=null;
	            if("GET".equals(httpExchange.getRequestMethod())) {
	                requestParamValue = handleGetRequest(httpExchange);
	            }
	            else if("POST".equals(httpExchange.getRequestMethod())) {
	            	if(httpExchange.getRequestURI().toString().length() == 4) {
	            		
	            		try {
	            			requestParamValue = handlePostRequest1(httpExchange);
	            		} catch (IOException e) {
	            			// TODO Auto-generated catch block
	            			e.printStackTrace();
	            		} catch (FichierInvalide e) {
	            		// TODO Auto-generated catch block
	            			e.printStackTrace();
	            		}
	            	}else {
	            		
	            		try {
							requestParamValue = handlePostRequest2(httpExchange);
						} catch (IOException e) {
							// TODO Auto-generated catch block
							e.printStackTrace();
						} catch (FichierInvalide e) {
							// TODO Auto-generated catch block
							e.printStackTrace();
						}
	            		
	            		
	            		
	            		
	            	}
	            }
	            
	            handleResponseJson(httpExchange,requestParamValue);

	        }

			private String handlePostRequest1(HttpExchange httpExchange) throws IOException, FichierInvalide {
				// TODO Auto-generated method stub
				// Ajouter les en-têtes CORS
	            httpExchange.getResponseHeaders().add("Access-Control-Allow-Origin", "*");
	            httpExchange.getResponseHeaders().add("Access-Control-Allow-Methods", "GET, POST, OPTIONS");
	            httpExchange.getResponseHeaders().add("Access-Control-Allow-Headers", "Content-Type");
				// Récupérez le flux de données de la requête
				// Récupérez le flux de données de la requête
				InputStream inputStream = httpExchange.getRequestBody();

				// Créez un objet File avec le nom de fichier souhaité
				File file = new File("test1.py");

				try (OutputStream outputStream = new FileOutputStream(file)) {
				    byte[] buffer = new byte[1024];
				    int bytesRead;

				    while ((bytesRead = inputStream.read(buffer)) != -1) {
				        // Écrire les octets dans le fichier de sortie
				        outputStream.write(buffer, 0, bytesRead);
				    }
				} catch (IOException e) {
				    // Gérer les erreurs de lecture/écriture
				    e.printStackTrace();
				}
				
				//Appele de notre clasee AnalyseCodeSource pour récupérer les donées
		        AnalyseCodeSource acs = new AnalyseCodeSource(file);
		        
		        
		        //On les stocks dans une map
		        Map<String,String> map = new TreeMap<String,String>();
		        map.put("nbFonction",acs.nbFonctions()+"");
		        map.put("nbLigne",acs.nbLigne()+"");
		        map.put("minLigneFonction",acs.minLigneFonction()+"");
		        map.put("MaxLigneFonction",acs.MaxLigneFonction()+"");
		        map.put("AvgLigneFonction",acs.AvgLigneFonction()+"");
		        
		        //On utilise la library Gson pour transformer notre map ne json
		        Gson gson = new GsonBuilder().setPrettyPrinting().create();
		        String json = gson.toJson(map);
		        
				return json;		
				}
			
			
			
			private String handlePostRequest2(HttpExchange httpExchange) throws IOException, FichierInvalide {
				// TODO Auto-generated method stub
				// Ajouter les en-têtes CORS
	            httpExchange.getResponseHeaders().add("Access-Control-Allow-Origin", "*");
	            httpExchange.getResponseHeaders().add("Access-Control-Allow-Methods", "GET, POST, OPTIONS");
	            httpExchange.getResponseHeaders().add("Access-Control-Allow-Headers", "Content-Type");
				// Récupérez le flux de données de la requête
				// Récupérez le flux de données de la requête
				InputStream inputStream = httpExchange.getRequestBody();

				// Créez un fichier temporaire qui vas stocker nos données
				File file = File.createTempFile("temp2", ".py");
				
				//On écrit les données dans notre fichier temporaire
				try (OutputStream outputStream = new FileOutputStream(file)) {
				    byte[] buffer = new byte[1024];
				    int bytesRead;

				    while ((bytesRead = inputStream.read(buffer)) != -1) {
				        // Écrire les octets dans le fichier de sortie
				        outputStream.write(buffer, 0, bytesRead);
				    }
				} catch (IOException e) {
				    // Gérer les erreurs de lecture/écriture
				    e.printStackTrace();
				}


				//Appele de notre clasee AnalyseCodeSource pour récupérer les donées
		        AnalyseCodeSource acs = new AnalyseCodeSource(file);
		        
		        //On créer notre map
		        Map<String,String> map = new HashMap<String,String>();
		        
		        //On récupérer la liste des mots
		        String[] url = httpExchange.getRequestURI().toString().split("/")[2].split(",");


		        //On apelle notre class AnalyseCodeSourcs pour trouver le nb d'ocurrence de chaque mots de notre liste
		        for(int i=0;i< url.length;i++) {
		                	
		                	map.put(url[i],(acs.nbOccurences(url[i])+""));

		                }
		        
		        
		        //On utilise la library Gson pour transformer notre map en json
		        Gson gson = new GsonBuilder().setPrettyPrinting().create();
		        String json = gson.toJson(map);
		        
				return json;	
		        }
		        
		
				}
			
	    }


