<<<<<<< HEAD
<?php
include "connexionbdd.php";
if (isset($_REQUEST['emailname']) && !empty($_REQUEST['emailname'])){
    $email = htmlentities($_REQUEST['emailname']);
    $reqverifemail =  'SELECT Mail FROM utilisateur WHERE Mail="'.$email.'";';

    
    $resemail = $pdo->query($reqverifemail);

    $count = $resemail->rowCount();

        if ($count != 0){
            header('Location:registrationdelegue.php?err=2');
        }else{
            //echo 'ça passe ici';
            if ( isset($_REQUEST['pseudoname']) && isset($_REQUEST['nomname']) && isset($_REQUEST['prenomname']) && isset($_REQUEST['passname'])   and !empty($_REQUEST['pseudoname'])  && !empty($_REQUEST['nomname'])  && !empty($_REQUEST['prenomname'])  && !empty($_REQUEST['passname'])){
               
                
                   if (isset($_REQUEST['rechercherenname'])){
                    $rechercheren= htmlentities(1);
               
                   }
                   else{
                       $rechercheren= htmlentities(0);
                   }
                   
                 if (isset($_REQUEST['creerenname'])){
                    $creeren= htmlentities(1);
               
                   }
                   else{
                       $creeren= htmlentities(0);
                   }
                   
                   if (isset($_REQUEST['modifenname'])){
                    $modifen= htmlentities(1);
               
                   }
                   else{
                       $modifen= htmlentities(0);
                   }

                   if (isset($_REQUEST['supprenname'])){
                    $suppren= htmlentities(1);
               
                   }
                   else{
                       $suppren= htmlentities(0);
                   }

                   if (isset($_REQUEST['consultenname'])){
                    $consulten= htmlentities(1);
               
                   }
                   else{
                       $consulten= htmlentities(0);
                   }

                   if (isset($_REQUEST['evalenname'])){
                    $evalen= htmlentities(1);
               
                   }
                   else{
                       $evalen= htmlentities(0);
                   }

                     if (isset($_REQUEST['rechercherofname'])){
                      $rechercherof= htmlentities(1);
                
                     }
                     else{
                          $rechercherof= htmlentities(0);
                     }

                     if (isset($_REQUEST['creerofname'])){
                        $creerof= htmlentities(1);
                    
                        }
                        else{
                            $creerof= htmlentities(0);
                        }
                        
                        if (isset($_REQUEST['modifofname'])){
                           $modifof= htmlentities(1);
                    
                           }
                           else{
                               $modifof= htmlentities(0);
                           }

                           if (isset($_REQUEST['supprofname'])){
                              $supprof= htmlentities(1);
                    
                              }
                              else{
                                  $supprof= htmlentities(0);
                              }

                              if (isset($_REQUEST['rechercherpiname'])){
                                $rechercherpi= htmlentities(1);
                          
                               }
                               else{
                                    $rechercherpi= htmlentities(0);
                               }
                               
                                 if (isset($_REQUEST['creerpiname'])){
                                     $creerpi= htmlentities(1);
                              
                                     }
                                     else{
                                        $creerpi= htmlentities(0);
                                     }
                                     
                                     if (isset($_REQUEST['modifpiname'])){
                                         $modifpi= htmlentities(1);
                              
                                         }
                                         else{
                                            $modifpi= htmlentities(0);
                                         }
                                         
                                         if (isset($_REQUEST['supprpiname'])){
                                         $supprpi= htmlentities(1);
                              
                                         }
                                         else{
                                                $supprpi= htmlentities(0);
                                         }
                                        
                                         if (isset($_REQUEST['rechercherdename'])){
                                            $rechercherde= htmlentities(1);
                                      
                                           }
                                           else{
                                                $rechercherde= htmlentities(0);
                                           }
                                        
                                            if (isset($_REQUEST['creerdename'])){
                                                $creerde= htmlentities(1);
                                        
                                                }
                                                else{
                                                     $creerde= htmlentities(0);
                                                }
                                                
                                                if (isset($_REQUEST['modifdename'])){
                                                    $modifde= htmlentities(1);
                                        
                                                    }
                                                    else{
                                                         $modifde= htmlentities(0);
                                                    }
                                                    
                                                    if (isset($_REQUEST['supprdename'])){
                                                    $supprde= htmlentities(1);
                                        
                                                    }
                                                    else{
                                                             $supprde= htmlentities(0);
                                                    }
                                                    
                                                    if (isset($_REQUEST['rechercheretname'])){
                                                        $rechercheret= htmlentities(1);
                                                  
                                                       }
                                                       else{
                                                            $rechercheret= htmlentities(0);
                                                       }

                                                         if (isset($_REQUEST['creeretname'])){
                                                              $creeret= htmlentities(1);
                                                     
                                                              }
                                                              else{
                                                                 $creeret= htmlentities(0);
                                                              }
                                                              
                                                              if (isset($_REQUEST['modifetname'])){
                                                                $modifet= htmlentities(1);
                                                     
                                                                }
                                                                else{
                                                                      $modifet= htmlentities(0);
                                                                }
                                                                
                                                                if (isset($_REQUEST['suppretname'])){
                                                                $suppret= htmlentities(1);
                                                     
                                                                }
                                                                else{
                                                                            $suppret= htmlentities(0);
                                                                }
                                                                
                $req3 = "INSERT INTO delegue(`Rechercher_Entreprise`, `Creer_Entreprise`, `Modifier_Entreprise`, `Evaluer_Entreprise`, `Supprimer_Entreprise`, `Consulter_Entreprise`, `Rechercher_Offre`, `Creer_Offre`, `Modifier_Offre`, `Supprimer_Offre`, `Consulter_Offre`, `Rechercher_Pilote`, `Creer_Pilote`, `Modifier_Pilote`, `Supprimer_Pilote`, `Rechercher_Delegue`, `Creer_Delegue`, `Modifier_Delegue`, `Supprimer_Delegue`, `Rechercher_Etudiant`, `Creer_Etudiant`, `Modifier_Etudiant`, `Supprimer_Etudiant`, `Candidature_Step_3`,`Candidature_Step_4`) Values (:rechercheren,:creeren,:modifen,:evalen,:suppren,:consulten,:rechercherof,:creerof,:modifof,:supprof,0,:rechercherpi,:creerpi,:modifpi,:supprpi,:rechercherde,:creerde,:modifde,:supprde,:rechercheret,:creeret,:modifet,:suppret,0,0);";

                $query = $pdo->prepare($req3);
                $query->bindValue(':rechercheren',$rechercheren, PDO::PARAM_STR);
                $query->bindValue(':creeren',$creeren, PDO::PARAM_STR);
                $query->bindValue(':modifen',$modifen, PDO::PARAM_STR);
                $query->bindValue(':evalen',$evalen, PDO::PARAM_STR);
                $query->bindValue(':suppren',$suppren, PDO::PARAM_STR);
                $query->bindValue(':consulten',$consulten, PDO::PARAM_STR);
                $query->bindValue(':rechercherof',$rechercherof, PDO::PARAM_STR);
                $query->bindValue(':creerof',$creerof, PDO::PARAM_STR);
                $query->bindValue(':modifof',$modifof, PDO::PARAM_STR);
                $query->bindValue(':supprof',$supprof, PDO::PARAM_STR);
                $query->bindValue(':rechercherpi',$rechercherpi, PDO::PARAM_STR);
                $query->bindValue(':creerpi',$creerpi, PDO::PARAM_STR);
                $query->bindValue(':modifpi',$modifpi, PDO::PARAM_STR);
                $query->bindValue(':supprpi',$supprpi, PDO::PARAM_STR);
                $query->bindValue(':rechercherde',$rechercherde, PDO::PARAM_STR);
                $query->bindValue(':creerde',$creerde, PDO::PARAM_STR);
                $query->bindValue(':modifde',$modifde, PDO::PARAM_STR);
                $query->bindValue(':supprde',$supprde, PDO::PARAM_STR);
                $query->bindValue(':rechercheret',$rechercheret, PDO::PARAM_STR);
                $query->bindValue(':creeret',$creeret, PDO::PARAM_STR);
                $query->bindValue(':modifet',$modifet, PDO::PARAM_STR);
                $query->bindValue(':suppret',$suppret, PDO::PARAM_STR);
                $query->execute();
                echo $rechercheren;
                echo"a";
                
                $req2 = 'SELECT Max(ID_Delegue) As id from delegue';

                $recipesStatement1 = $pdo->prepare($req2);
                $recipesStatement1->execute();
                $recipes1 = $recipesStatement1->fetchAll();
                echo $recipes1[0]['id'];


                $pseudoo = htmlentities($_REQUEST['pseudoname']);
                $nomo = htmlentities($_REQUEST['nomname']);
                $prenomo = htmlentities($_REQUEST['prenomname']);
                $passo =htmlentities($_REQUEST['passname']) ;
                
                $req = 'INSERT INTO utilisateur(Identifiant,Nom,Prenom, Mail, Password, ID_Delegue) VALUES (":pseudo",":nom",":prenom",":email",":pass",'.$recipes1[0]["id"].');';

                $query = $pdo->prepare($req);
                $query->bindValue(':pseudo',$pseudoo, PDO::PARAM_STR);
                $query->bindValue(':nom',$nomo, PDO::PARAM_STR);
                $query->bindValue(':prenom',$prenomo, PDO::PARAM_STR);
                $query->bindValue(':email',$email, PDO::PARAM_STR);
                $query->bindValue(':pass', $passo, PDO::PARAM_STR);
                $query->execute();
                echo $pseudoo;
                echo $nomo;
                echo $prenomo;
                echo $passo;
                echo $email;
                echo $recipes1[0]['id'];
                echo"a";

               // header('Location:login.php');
                
            }
            else{
                //
            }
            
        }
}
    

   



=======
<?php
include "connexionbdd.php";
if (isset($_REQUEST['emailname']) && !empty($_REQUEST['emailname'])){
    $email = htmlentities($_REQUEST['emailname']);
    $reqverifemail =  'SELECT Mail FROM utilisateur WHERE Mail="'.$email.'";';

    
    $resemail = $pdo->query($reqverifemail);

    $count = $resemail->rowCount();

        if ($count != 0){
            header('Location:registrationdelegue.php?err=2');
        }else{
            //echo 'ça passe ici';
            if ( isset($_REQUEST['pseudoname']) && isset($_REQUEST['nomname']) && isset($_REQUEST['prenomname']) && isset($_REQUEST['passname'])   and !empty($_REQUEST['pseudoname'])  && !empty($_REQUEST['nomname'])  && !empty($_REQUEST['prenomname'])  && !empty($_REQUEST['passname'])){
                $pseudo = htmlentities($_REQUEST['pseudoname']);

                $nom = htmlentities($_REQUEST['nomname']);
                $prenom = htmlentities($_REQUEST['prenomname']);
                $pass =htmlentities($_REQUEST['passname']) ;
                
                   if (isset($_REQUEST['rechercherenname'])){
                    $rechercheren= htmlentities(1);
               
                   }
                   else{
                       $rechercheren= htmlentities(0);
                   }
                   
                 if (isset($_REQUEST['creerenname'])){
                    $creeren= htmlentities(1);
               
                   }
                   else{
                       $creeren= htmlentities(0);
                   }
                   
                   if (isset($_REQUEST['modifenname'])){
                    $modifen= htmlentities(1);
               
                   }
                   else{
                       $modifen= htmlentities(0);
                   }

                   if (isset($_REQUEST['supprenname'])){
                    $suppren= htmlentities(1);
               
                   }
                   else{
                       $suppren= htmlentities(0);
                   }

                   if (isset($_REQUEST['consultenname'])){
                    $consulten= htmlentities(1);
               
                   }
                   else{
                       $consulten= htmlentities(0);
                   }

                   if (isset($_REQUEST['evalenname'])){
                    $evalen= htmlentities(1);
               
                   }
                   else{
                       $evalen= htmlentities(0);
                   }

                     if (isset($_REQUEST['rechercherofname'])){
                      $rechercherof= htmlentities(1);
                
                     }
                     else{
                          $rechercherof= htmlentities(0);
                     }

                     if (isset($_REQUEST['creerofname'])){
                        $creerof= htmlentities(1);
                    
                        }
                        else{
                            $creerof= htmlentities(0);
                        }
                        
                        if (isset($_REQUEST['modifofname'])){
                           $modifof= htmlentities(1);
                    
                           }
                           else{
                               $modifof= htmlentities(0);
                           }

                           if (isset($_REQUEST['supprofname'])){
                              $supprof= htmlentities(1);
                    
                              }
                              else{
                                  $supprof= htmlentities(0);
                              }

                              if (isset($_REQUEST['rechercherpiname'])){
                                $rechercherpi= htmlentities(1);
                          
                               }
                               else{
                                    $rechercherpi= htmlentities(0);
                               }
                               
                                 if (isset($_REQUEST['creerpiname'])){
                                     $creerpi= htmlentities(1);
                              
                                     }
                                     else{
                                        $creerpi= htmlentities(0);
                                     }
                                     
                                     if (isset($_REQUEST['modifpiname'])){
                                         $modifpi= htmlentities(1);
                              
                                         }
                                         else{
                                            $modifpi= htmlentities(0);
                                         }
                                         
                                         if (isset($_REQUEST['supprpiname'])){
                                         $supprpi= htmlentities(1);
                              
                                         }
                                         else{
                                                $supprpi= htmlentities(0);
                                         }
                                        
                                         if (isset($_REQUEST['rechercherdename'])){
                                            $rechercherde= htmlentities(1);
                                      
                                           }
                                           else{
                                                $rechercherde= htmlentities(0);
                                           }
                                        
                                            if (isset($_REQUEST['creerdename'])){
                                                $creerde= htmlentities(1);
                                        
                                                }
                                                else{
                                                     $creerde= htmlentities(0);
                                                }
                                                
                                                if (isset($_REQUEST['modifdename'])){
                                                    $modifde= htmlentities(1);
                                        
                                                    }
                                                    else{
                                                         $modifde= htmlentities(0);
                                                    }
                                                    
                                                    if (isset($_REQUEST['supprdename'])){
                                                    $supprde= htmlentities(1);
                                        
                                                    }
                                                    else{
                                                             $supprde= htmlentities(0);
                                                    }
                                                    
                                                    if (isset($_REQUEST['rechercheretname'])){
                                                        $rechercheret= htmlentities(1);
                                                  
                                                       }
                                                       else{
                                                            $rechercheret= htmlentities(0);
                                                       }

                                                         if (isset($_REQUEST['creeretname'])){
                                                              $creeret= htmlentities(1);
                                                     
                                                              }
                                                              else{
                                                                 $creeret= htmlentities(0);
                                                              }
                                                              
                                                              if (isset($_REQUEST['modifetname'])){
                                                                $modifet= htmlentities(1);
                                                     
                                                                }
                                                                else{
                                                                      $modifet= htmlentities(0);
                                                                }
                                                                
                                                                if (isset($_REQUEST['suppretname'])){
                                                                $suppret= htmlentities(1);
                                                     
                                                                }
                                                                else{
                                                                            $suppret= htmlentities(0);
                                                                }
                                                                
                $req3 = "INSERT INTO delegue(`Rechercher_Entreprise`, `Creer_Entreprise`, `Modifier_Entreprise`, `Evaluer_Entreprise`, `Supprimer_Entreprise`, `Consulter_Entreprise`, `Rechercher_Offre`, `Creer_Offre`, `Modifier_Offre`, `Supprimer_Offre`, `Consulter_Offre`, `Rechercher_Pilote`, `Creer_Pilote`, `Modifier_Pilote`, `Supprimer_Pilote`, `Rechercher_Delegue`, `Creer_Delegue`, `Modifier_Delegue`, `Supprimer_Delegue`, `Rechercher_Etudiant`, `Creer_Etudiant`, `Modifier_Etudiant`, `Supprimer_Etudiant`, `Candidature_Step_3`,`Candidature_Step_4`) Values (':rechercheren',':creeren',':modifen',':evalen',':suppren',':consulten',':rechercherof',':creerof',':modifof',':supprof',0,':rechercherpi',':creerpi',':modifpi',':supprpi',':rechercherde',':creerde',':modifde',':supprde',':rechercheret',':creeret',':modifet',':suppret',0,0);";

                $query = $pdo->prepare($req3);
                $query->bindParam(':rechercheren',$rechercheren, PDO::PARAM_STR);
                $query->bindValue(':creeren',$creeren, PDO::PARAM_STR);
                $query->bindValue(':modifen',$modifen, PDO::PARAM_STR);
                $query->bindValue(':evalen',$evalen, PDO::PARAM_STR);
                $query->bindValue(':suppren',$suppren, PDO::PARAM_STR);
                $query->bindValue(':consulten',$consulten, PDO::PARAM_STR);
                $query->bindValue(':rechercherof',$rechercherof, PDO::PARAM_STR);
                $query->bindValue(':creerof',$creerof, PDO::PARAM_STR);
                $query->bindValue(':modifof',$modifof, PDO::PARAM_STR);
                $query->bindValue(':supprof',$supprof, PDO::PARAM_STR);
                $query->bindValue(':rechercherpi',$rechercherpi, PDO::PARAM_STR);
                $query->bindValue(':creerpi',$creerpi, PDO::PARAM_STR);
                $query->bindValue(':modifpi',$modifpi, PDO::PARAM_STR);
                $query->bindValue(':supprpi',$supprpi, PDO::PARAM_STR);
                $query->bindValue(':rechercherde',$rechercherde, PDO::PARAM_STR);
                $query->bindValue(':creerde',$creerde, PDO::PARAM_STR);
                $query->bindValue(':modifde',$modifde, PDO::PARAM_STR);
                $query->bindValue(':supprde',$supprde, PDO::PARAM_STR);
                $query->bindValue(':rechercheret',$rechercheret, PDO::PARAM_STR);
                $query->bindValue(':creeret',$creeret, PDO::PARAM_STR);
                $query->bindValue(':modifet',$modifet, PDO::PARAM_STR);
                $query->bindValue(':suppret',$suppret, PDO::PARAM_STR);
                $query->execute();
                echo $rechercheren;
                echo"a";

                $req2 = 'SELECT Max(ID_Delegue) As id from delegue';

                $recipesStatement1 = $pdo->prepare($req2);
                $recipesStatement1->execute();
                $recipes1 = $recipesStatement1->fetchAll();

                $req = 'INSERT INTO `utilisateur`(`Identifiant`,`Nom`,`Prenom`, `Mail`, `Password`, ID_Delegue) VALUES (:pseudo,:nom,:prenom,:email,:pass,'.$recipes1[0]['id'].');';

                $query = $pdo->prepare($req);
                $query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
                $query->bindValue(':nom',$nom, PDO::PARAM_STR);
                $query->bindValue(':prenom',$prenom, PDO::PARAM_STR);
                $query->bindValue(':email',$email, PDO::PARAM_STR);
                $query->bindValue(':pass', $pass, PDO::PARAM_STR);
                $query->execute();
               // header('Location:login.php');
                
            }
            else{
                //
            }
            
        }
}
    

   



>>>>>>> 17090cd36af27c005f832f90332690339a946e21
