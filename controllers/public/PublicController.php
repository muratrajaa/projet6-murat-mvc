 <?php

require_once('./models/admin/AdminCategorieModel.php');
require_once('./models/admin/AdminArticleModel.php');
require_once('./models/public/PublicModel.php');
require_once('./assets/librairie/vendor/autoload.php');

class PublicController{

    private $driver1;
    private $driver2;
    private $driver3;

    public function __construct()
    {
        $this->driver1 = new AdminCategorieModel(); 
        $this->driver2 = new AdminArticleModel(); 
        $this->driver3 = new PublicModel();
    }

    public function getData(){
        $datasCat = $this->driver1->getCategories();
        $datasArt = $this->driver2->getArticle();
        require_once('./views/public/listData.php');
    }

    public function checkout(){
        if(isset($_POST['payer'])){
            $image = $_POST['image'];
            $titre = $_POST['titre'];
            $prix = $_POST['prix'];
            $id_article = $_POST['id'];

            require_once('./views/public/viewCheckout.php');
        }
    }

    public function payment(){
        if(isset($_POST) && !empty($_POST['stripeToken'])){
            $token = $_POST['stripeToken'];
            $prix = $_POST['prix'];
            $id_article = (int)$_POST['id'];
            $titre = $_POST['titre'];
            $numero = uniqid();
        
             \Stripe\Stripe::setApiKey("sk_test_51HRCbSGpbf5zKJ9as8mYW2Py9O2Zt6beIGTfnQiM2p6tos60C2WnQ2pf9GA6C0WHgUVpVaSilJw5kvSi7kXeqVNo00pPzrKl2n");
             $charge = \Stripe\Charge::create([
                 'amount'=>$prix.'00',
                 'currency'=>'eur',
                'description'=>'L\'élégence avec une touche marocaine',
                 'source'=>$token
             ]);
        
            
           if($charge['captured']){
               
               $nb = $this->driver3->switchEtat(0,$id_article);
               if($nb){
                //require_once('billing.php');
                header('location:index.php');
               }
           }
            
        }
        
    }
} 