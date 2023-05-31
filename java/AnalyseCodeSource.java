
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;

	public class AnalyseCodeSource {
		
		//Fichier à analyser
		private File fichier;
		
		
		
		//Constructeur
		public AnalyseCodeSource(File fichier) throws FichierInvalide, IOException {
			
			setFichier(fichier);
			
		}
		
		
		//Getteur
		public File getFichier() {
			return fichier;
		}
		
		
		//Setteur
		public void setFichier(File fichier) throws FichierInvalide {
			
			//Renvoie une erreur si le fichier n'éxiste pas
			if(!(fichier.exists())) {
				
				throw new FichierInvalide("Erreur, ce fichier n'existe pas");
			}
			
			//Renvoie une erreur si le fichier est vide
			if(fichier.length() == 0) {
				
				throw new FichierInvalide("Erreur fichier vide");
			}
			
			this.fichier = fichier;
			
		}
		
		//Méthode qui retourne le nombre de ligne du fichier
		public int nbLigne() {
			
			//Variables
			int compteur = 0;
			boolean comment1 = false;
			boolean comment2 = false;
			
			
			//Parcours du fichier en ignorant les commentaires
			try (BufferedReader reader = new BufferedReader(new FileReader(this.fichier.getAbsolutePath()))) {
	            String ligne;
	            while((ligne = reader.readLine())!=null) {
	            	
	            	//Commentaires multiligne """
	            	if(ligne.contains("\"\"\"")&&comment1){
	            		if(ligne.trim().indexOf("\"\"\"") + 4<ligne.length()) {
	            			compteur+=1;
	            		}
	            		comment1 = false;
	            	}else if(ligne.trim().startsWith("\"\"\"")&& !comment1) {
	            		comment1 = true;
	            	}else if (ligne.contains("\"\"\"") && !comment1) {
	            		comment1=true;
	            		compteur+=1;
	            		
	            		
	            	//Comentaires multiligne '''	
	            	}else if(ligne.contains("\'\'\'")&&comment2){
	                		if(ligne.trim().indexOf("\'\'\'") + 4<ligne.length()) {
	                			compteur+=1;
	                		}
	                		comment2 = false;
	                }else if(ligne.trim().startsWith("\'\'\'")&& !comment2) {
	                		comment2 = true;
	                }else if (ligne.contains("\'\'\'") && !comment2) {
	                		comment2=true;
	                		compteur+=1;
	            		
	         
	                //Commentaire ligne simple #
	            	}else if((!(ligne.isEmpty())) &&  (!(ligne.trim().startsWith("#")) && !(comment1)&& !(comment2))) {
	         
	            		compteur+=1;
	            	}
	            	
	            	
	            	
	            }
	        } catch (IOException e) {
	            e.printStackTrace();
	        }
			
			//retourne le nombre de ligne du fichier
			return compteur;
		}
		
		
		public int nbFonctions() {

			int compteur = 0;
			
			//Parcours du fichier
			try (BufferedReader reader = new BufferedReader(new FileReader(this.fichier.getAbsolutePath()))) {
	            String ligne;
	            while((ligne = reader.readLine())!=null) {
	         
	            	if(ligne.trim().startsWith("def ") || ligne.trim().startsWith("define ")) {
	            		
	            		compteur+=1;
	            	}
	            	
	            	
	            }
	        } catch (IOException e) {
	            e.printStackTrace();
	        }
			
			//retourne le nombre de fonction du fichier
			return compteur;
		}
		
		
			
		//Fonction pour récupérer le niveua d'indentation d'une ligne
	    public int getIndentation(String ligne) {
	    	
	    	//On remplace les tabulation par des espaces
	    	ligne = ligne.replaceAll("\t", "    ");
	    	//On récupérer la ligne sans les espaces
	        String Sespaces = ligne.trim();
	        
	        //On soustrait la taille de la ligne sans espaces avec celle qui a des espaces
	        int indentation = ligne.length() - Sespaces.length();
	        //On retourne le niveau d'indentation de la ligne
	        return indentation;
	    }
	    
	    
	    public int MaxLigneFonction() throws IOException, FichierInvalide {
	    	//on test qu'il y ai une fonction
	    	if(this.nbFonctions()==0) {
	    		
	    		return 0;
	    	}
	    	//Variables
	    	int max = Integer.MIN_VALUE;
	    	int indentation = Integer.MAX_VALUE;
	    	boolean fonct = false;
	    	//fichier temporarires qui vas contenir à chaque fois une fonction
	    	File fichierF = File.createTempFile("temporaire", ".py");
	    	
	    	//On parcours notre fichier
	    	try (BufferedReader reader = new BufferedReader(new FileReader(this.fichier.getAbsolutePath()))) {
	            String ligne;
	            
	            while((ligne = reader.readLine())!=null) {
	            	
	            	//Si c'est la fin d'une fonction et qu'il y a une autre fonction
	    			if((ligne.trim().startsWith("def ") || ligne.trim().startsWith("define ")) && getIndentation(ligne)<= indentation) {
	    				
	    				//On test si c'est le max grace à nbLigne que l'on à écit plus haut
	    				if(fonct) {
	    					
	        				AnalyseCodeSource acs = new AnalyseCodeSource(fichierF);
	        				
	        				if(acs.nbLigne()>max) {
	        					max = acs.nbLigne();
	        				}
	    					
	    				}
	    				
	    				//On renitialise notre fichier et le niveau d'indentation à la nouvelle fonction
	    				indentation = getIndentation(ligne);
	    				fonct = true;
	    				fichierF = File.createTempFile("temporaire", ".py");
	                    try (BufferedWriter writer = new BufferedWriter(new FileWriter(fichierF.getAbsolutePath()))) {
	                        writer.write(ligne);
	                        writer.newLine();
	                    }
	                    
	                    
	                    
	    				
	    			//Si c'est la fin d'une fonction
	    			}else if (fonct && getIndentation(ligne)<= indentation  && !(ligne.trim().isEmpty())) {
	    				
	    				//On test notre max
	    				fonct = false;
	    				indentation = Integer.MAX_VALUE;
	    				
        				AnalyseCodeSource acs = new AnalyseCodeSource(fichierF);
        				
        				if(acs.nbLigne()>max) {
        					max = acs.nbLigne();
        				
	    					
	    				}
	    				
	    			//Sinon si on est toujours dans la fonction on écrit dans le fichier la ligne
	    			}else if (fonct && !(ligne.trim().isEmpty())) {
	    				try (BufferedWriter writer = new BufferedWriter(new FileWriter(fichierF.getAbsolutePath(),true))) {
	                        writer.write(ligne);
	                        writer.newLine();
	                    }
	    				
	    			}
	    		
	    
	    		}
	            
	            //Si c'est la fin du fichier et qu'on est dans une fonction
	            if (fonct) {
	            	
	            	//On test le max
    				AnalyseCodeSource acs = new AnalyseCodeSource(fichierF);
    				
    				if(acs.nbLigne()>max) {
    					max = acs.nbLigne();
    				
    				}
	            }
	    		

	    			
	    		}catch (IOException e) {
	    			e.printStackTrace();
	    		}
	    	
	    	
	    	return max;
	    }

	public int minLigneFonction() throws IOException, FichierInvalide {
		
		
    	//on test si il y'a une fonction
    	if(this.nbFonctions()==0) {
    		
    		return 0;
    	}
    	
    		//Idem que pour max mais avec min
	    	int min = Integer.MAX_VALUE;
	    	int indentation = Integer.MAX_VALUE;
	    	boolean fonct = false;
	    	File fichierF = File.createTempFile("temporaire", ".py");
	 
	    	try (BufferedReader reader = new BufferedReader(new FileReader(this.fichier.getAbsolutePath()))) {
	            String ligne;
	            
	            while((ligne = reader.readLine())!=null) {
	    	
	    			if((ligne.trim().startsWith("def ") || ligne.trim().startsWith("define "))) {
	    				
	    				
	    				if(fonct) {
	        				AnalyseCodeSource acs = new AnalyseCodeSource(fichierF);
	        				
	        				if(acs.nbLigne()<min) {
	        					min = acs.nbLigne();
	        				
	        				}
	    					
	    				}
	    				
	    				indentation = getIndentation(ligne);
	    				fonct = true;
	    				fichierF = File.createTempFile("temporaire", ".py");
	                    try (BufferedWriter writer = new BufferedWriter(new FileWriter(fichierF.getAbsolutePath()))) {
	                        writer.write(ligne);
	                        writer.newLine();
	                    }
	                    
	                    
	                    
	    				
	    				
	    			}else if (fonct && getIndentation(ligne)<= indentation  && !(ligne.trim().isEmpty())) {
	    				
	    				fonct = false;
	    				indentation = Integer.MAX_VALUE;
	    				
        				AnalyseCodeSource acs = new AnalyseCodeSource(fichierF);
        				
        				if(acs.nbLigne()<min) {
        					min = acs.nbLigne();
        				
        				}
	    				
	    				
	    			}else if (fonct && !(ligne.trim().isEmpty())) {
	    				try (BufferedWriter writer = new BufferedWriter(new FileWriter(fichierF.getAbsolutePath(),true))) {
	                        writer.write(ligne);
	                        writer.newLine();
	                    }
	    				
	    			}
	    		
	    
	    		}
	    		
	            if (fonct) {
    				AnalyseCodeSource acs = new AnalyseCodeSource(fichierF);
    				
    				if(acs.nbLigne()<min) {
    					min = acs.nbLigne();
    				
    				}
	            	
	            }

	    			
	    		}catch (IOException e) {
	    			e.printStackTrace();
	    		}
	    	
	    	
	    	return min;
	    }


	public double AvgLigneFonction() throws IOException, FichierInvalide {
		
    	//on test qu'il y ai une fonction
    	if(this.nbFonctions()==0) {
    		
    		return 0;
    	}
    	
    	//Idem que pour max mais on cumul la taille des fonction
		double avg = 0;
		int indentation = Integer.MAX_VALUE;
		boolean fonct = false;
		File fichierF = File.createTempFile("temporaire", ".py");

		try (BufferedReader reader = new BufferedReader(new FileReader(this.fichier.getAbsolutePath()))) {
	        String ligne;
	        
	        while((ligne = reader.readLine())!=null) {
		
				if((ligne.trim().startsWith("def ") || ligne.trim().startsWith("define "))&& getIndentation(ligne)<= indentation) {
					
					
					if(fonct) {
						
	    				AnalyseCodeSource acs = new AnalyseCodeSource(fichierF);
	    				
	    				avg+=acs.nbLigne();
						
					}
					
					indentation = getIndentation(ligne);
					fonct = true;
					fichierF = File.createTempFile("temporaire", ".py");
	                try (BufferedWriter writer = new BufferedWriter(new FileWriter(fichierF.getAbsolutePath()))) {
	                    writer.write(ligne);
	                    writer.newLine();
	                }
	                
	                
	                
					
					
				}else if (fonct && getIndentation(ligne)<= indentation  && !(ligne.trim().isEmpty())) {
					
					fonct = false;
					indentation = Integer.MAX_VALUE;
					
    				AnalyseCodeSource acs = new AnalyseCodeSource(fichierF);
    				
    				avg+=acs.nbLigne();
					
					
				}else if (fonct && !(ligne.trim().isEmpty())) {
					try (BufferedWriter writer = new BufferedWriter(new FileWriter(fichierF.getAbsolutePath(),true))) {
	                    writer.write(ligne);
	                    writer.newLine();
	                }
					
				}
			

			}
			
	        if (fonct) {
				AnalyseCodeSource acs = new AnalyseCodeSource(fichierF);
				
				avg+=acs.nbLigne();
	        	
	        }

				
			}catch (IOException e) {
				e.printStackTrace();
			}
		
		//et on divise le cumul pas le nombre de fonctionS
		
		return avg/this.nbFonctions();
	}


	public int nbOccurences(String str) throws IOException, FichierInvalide {
		
		//Création d'un fichier temporaire
		File temp = File.createTempFile("tempOc", ".py");
		
		
		//On récupére dans ce fichier le contenu de notre fichier
		try(
		BufferedReader reader = new BufferedReader(new FileReader(fichier));
		BufferedWriter writer = new BufferedWriter(new FileWriter(temp.getAbsolutePath()));
				){
			
			String ligne = reader.readLine();
			
			while(ligne != null) {
			
				writer.write(ligne);
				writer.newLine();
				ligne = reader.readLine();
				
		}
		

			
		}catch (IOException e) {
			e.printStackTrace();
		}
		
		//On y enlève les commentaires
		EnleverCommentaire(temp);
		
		//Et on vas compter le nombre d'occurences
		int compteur = 0;
		
		//On parcours notre fichier
		try (BufferedReader reader = new BufferedReader(new FileReader(temp.getAbsolutePath()))) {
	        String ligne;
	        while((ligne = reader.readLine())!=null) {
	        	//Si la ligne contient l'ocurence
	        	if(ligne.contains(str)) {
	        		//On compte combien de fois elle est présente
	        		compteur+=compterOccurrences(ligne,str);
	        	}
	        	
	        	
	        }
	    } catch (IOException e) {
	        e.printStackTrace();
	    }
	
		//On retourne le nombre d'occurences
		return compteur;
		
		
	}

	public int compterOccurrences(String chaine, String terme) {
		//Variables
	    int compteur = 0;
	    int index = 0;

	    //On compte combien de fois le terme est présent dans la ligne
	    while (index != -1) {
	        index = chaine.indexOf(terme, index);
	        if (index != -1) {
	            compteur++;
	            index += terme.length();
	        }
	    }
	    
	    //On retourne le nombre de fois que le terme est présent dans la ligne
	    return compteur;
	}


	public  void EnleverCommentaire(File fichier) {
		StringBuilder stringBuilder = new StringBuilder();
	    String ligne;
	    
	    //On transforme notre fichier en String
	    try (BufferedReader br = new BufferedReader(new FileReader(fichier.getAbsolutePath()))) {
	        while ((ligne = br.readLine()) != null) {
	            stringBuilder.append(ligne);
	            stringBuilder.append(System.lineSeparator());
	        }
	    } catch (IOException e) {
	        e.printStackTrace();
	    }
	    
	    String txt = stringBuilder.toString();
	    
	    //On supprime les commentaires multilignes
	    txt = supprimerQuotes(txt,'"');
	    txt = supprimerQuotes(txt,'\'');
	    
	    //On suprime les commentaires simple ligne
	   
	    StringBuilder sansDiese = new StringBuilder();
	    
	    for (int i = 0; i <txt.length(); i++) {
	     
	        if (txt.charAt(i) == '#') {
	        	
	            while (i < txt.length() && txt.charAt(i) != '\n') {
	                i++;
	            }
	        } else {
	            sansDiese.append(txt.charAt(i));
	        }
	    }
	    
	    txt = sansDiese.toString();
	    
	    //On écrit le résulats dans fichier
	    try (BufferedWriter writer = new BufferedWriter(new FileWriter(fichier.getAbsolutePath()))) {
	        writer.write(txt);
	    } catch (IOException e) {
	        e.printStackTrace();
	    }
	}

		
	public static String supprimerQuotes(String texte, char type) {
	    // Convertir la chaîne de caractères en un tableau de caractères
	    char[] caracteres = texte.toCharArray();
	    
	    // Initialiser l'index de départ et l'état de la citation
	    int index_depart = 0;
	    boolean state = false;
	    
	    // Créer un StringBuilder pour construire la nouvelle chaîne de caractères
	    StringBuilder sb = new StringBuilder();
	    
	    // Parcourir le tableau de caractères
	    for (int i = index_depart ; i < (texte.length()- 3); i++) {
	        // Vérifier si le caractère courant correspond au caractère de citation
	        if (caracteres[i] == type) {
	            // Vérifier les caractères suivants pour détecter une citation complète
	            if (caracteres[i+1] == type && caracteres[i+2] == type) {
	                // Si l'état est true, la citation est déjà ouverte, donc il faut la fermer
	                if (state == true) {
	                    // Mettre à jour l'état de la citation et remplacer les caractères de citation par des espaces
	                    state = false;
	                    caracteres[i] = ' ';
	                    caracteres[i+1] = ' ';
	                    caracteres[i+2] = ' ';
	                } else {
	                    // Si l'état est false, la citation est fermée, donc il faut l'ouvrir
	                    state = true;
	                }
	            }
	        }
	        
	        // Ajouter le caractère courant au StringBuilder si l'état de la citation est false
	        if (state == false) {
	            sb.append(caracteres[i]);
	        }
	        
	        // Ajouter le caractère courant au StringBuilder si l'état de la citation est true et le caractère est un saut de ligne
	        if (state == true) {
	            if (caracteres[i] == '\n') {
	                sb.append('\n');
	            }
	        }
	    }
	    
	    // Ajouter les trois derniers caractères au StringBuilder
	    sb.append(caracteres[texte.length()-3]);
	    sb.append(caracteres[texte.length()-2]);
	    sb.append(caracteres[texte.length()-1]);
	    
	    // Convertir le StringBuilder en chaîne de caractères et la retourner
	    return sb.toString();
	}


	}


