<?php 
    include 'Session.php';
    
    function AfficherPage($NomMenu){
        include 'vTableauBord.php';
        include 'Model.php';
        $menu = "";
        
        switch($NomMenu){
            case "Profil":      $menu = include 'Profil.php';
                break;
            case "Main":    
                if($_SESSION['IdRole'] == 5)
                                $menu = include 'TBSMain.php';
                else if(($_SESSION['IdRole'] == 4) || ($_SESSION['IdRole'] == 3) || ($_SESSION['IdRole'] == 2))
                                $menu = include 'TBEMain.php';
                    break;
                case "Modif":   $menu = include 'ModifProfil.php';
                    break;
                case "ModifBD": $menu = include 'ModifBDStagiaire.php';
                    break;    
                case "Journal": $menu = include 'JournalBord.php';
                    break;
                case "Avenir":  $menu = include 'AVenir.php';
                    break;
                case "Eval":    $menu = include 'Evaluation.php';
                    break;
                case "CRUDStage":   $menu = include 'CRDStage.php';
                    break;
                case "CRUDStagiaire":   $menu = include 'CRUDStagiaire.php';
                    break;
                case "CRUDEntreprise":  $menu = include 'CRUDEntreprise.php';
                    break;
                case "CRUDEmployeEntreprise" : $menu = include 'CRUDEmployeEntreprise.php';
                    break;
            }
                else if($_SESSION['IdRole'] == 1)
                                $menu = include 'ConsoleAdminMain.php';
                break;
            case "Modif":       $menu = include 'ModifProfil.php';
                break;  
            case "Journal":     $menu = include 'JournalBord.php';
                break;
            case "Avenir":      $menu = include 'AVenir.php';
                break;
            case "Eval":        $menu = include 'Evaluation.php';
                break;
            case "Stage":       $menu = include 'CreationStage.php';
                break;
            case "Session":     $menu = include 'CreationSession.php';
                break;
            case "Entreprise":  $menu = include 'CreationEntreprise.php';
        }
        
        echo json_encode($menu);
    }

    AfficherPage($_REQUEST["nomMenu"]);

?>