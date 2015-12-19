<?php

class post_controller extends base_controller
{
    function __construct()
    {
        parent::__construct();
    }
    function __destruct()
    {
        parent::__destruct();
    }

    public function search()
    {
        global $Hardy_config;
        $this->data['rootUrl'] = $Hardy_config['base_url'];
        if (isset ($_POST['searchContent'])) {
            $keyword = $_POST['searchContent'];
        }
        else {
            $keyword = null;
        }

        $this->model = Hardy_get_class('post', 'model');
        $this->model->connect();
        $this->data['data'] = $this->model->seach_posts($keyword);
        require $Hardy_config['view_dir'].'search_view.php';
        $this->model->close ();

    }

    public function ask()
    {
        global $Hardy_config;
        $this->data['rootUrl'] = $Hardy_config['base_url'];
        $this->model = Hardy_get_class('post', 'model');
        $this->model->connect();
        require $Hardy_config['view_dir'].'ask_view.php';
        $this->model->close ();

    }


    public function index()
    {
        global $Hardy_config;

        // Retrieve posts
        if (isset ($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
        }
        else {
            $keyword = null;
        }
        $this->model = Hardy_get_class('post', 'model');
        $this->model->connect();
        $this->data['data'] = $this->model->get_posts($keyword);
        $this->data['rootUrl'] = $Hardy_config['base_url'];

        // Rendering
        require $Hardy_config['view_dir'].'search_view.php';
        $this->model->close ();
    }

    public function showPost(){
        global $Hardy_config;
        $this->data['rootUrl'] = $Hardy_config['base_url'];

        $this->model = Hardy_get_class('post', 'model');
        $this->model->connect();
        $pid=$_GET['pid'];
        $this->data['data']=$this->model->seach_post_by_id($pid);
        $this->data['pid']=$this->data['data'][0];
        $this->data['comments']=$this->model->search_comments_by_post($pid);
        require $Hardy_config['view_dir'].'post_view.php';
        $this->model->close();

    }

    public function postComment(){
        global $Hardy_config;
        $this->data['rootUrl'] = $Hardy_config['base_url'];

        $this->model = Hardy_get_class('post', 'model');
        $this->model->connect();
        $pid=$_GET['pid'];
        $comment_id='';
        if(!isset($_POST['subject'])) {
            if(isset($_GET['parent_comment_id'])){
                $comment_id=$_GET['parent_comment_id'];
            }
            require $Hardy_config['view_dir'].'comment.php';
            
        }      
        else{
            if(!isset($_GET['parent_comment_id'])){
                $this->model->postComment($pid,$_POST['subject'],$_POST['content'],"Anonymous");
                echo '<script type="text/javascript">'
                , 'parent.$.fancybox.close();'
                , '</script>'
                ;
            }
            else{
                $comment_id=$_GET['parent_comment_id'];
                $this->model->postReply($pid,$_POST['subject'],$_POST['content'],"Anonymous",$comment_id);
                echo '<script type="text/javascript">'
                , 'parent.$.fancybox.close();'
                , '</script>'
                ;
            }
        }
    }
   
}

?>