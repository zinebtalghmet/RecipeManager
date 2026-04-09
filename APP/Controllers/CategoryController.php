<?php
// CategoryController: kay-handle ga3 les operations dyal categories (ajout, suppression, affichage)
require_once __DIR__ .'/../Models/category.php';

class CategoryController {
    private $categoryModel;

    // Constructeur: kay-initialiser l'objet Category model
    public function __construct()
    {
        $this->categoryModel = new Category();
    }

    // Ajouter categorie jdida — kayt-appela mn formulaire POST f addRecipe.php
    public function addCategory(){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_category'])){
            $cat_name = trim($_POST['cat_name']); // 7yed les espaces mn l'début o la fin
            if(!empty($cat_name)){
                $this->categoryModel->addCategory($cat_name); // Sauvegarder f la base de données
            }
            header('Location: addRecipe.php'); // Rje3 l page addRecipe
            exit();
        }
    }

    // Supprimer categorie — kayt-appela via GET parameter (ex: ?delete_cat=5)
    public function deleteCategory(){
        if(isset($_GET['delete_cat'])){
            $this->categoryModel->deleteCategory($_GET['delete_cat']); // 7yed mn la base
            header('Location: addRecipe.php'); // Rje3 l page addRecipe
            exit();
        }
    }

    // Jib ga3 les categories — kayrje3 tableau dyal categories bach yt-afficha f dropdown
    public function getAllCategories(){
        return $this->categoryModel->getAllCategories();
    }
}
?>
