<?php

class post_model extends Hardy_mysql_handler
{
    function __construct()
    {
        global $Hardy_config;
        parent::__construct($Hardy_config['host'], $Hardy_config['user'], $Hardy_config['password'], $Hardy_config['schema']);
    }
    function __destruct()
    {
        parent::__destruct();
    }
    
    public function new_post($subject, $file_pic, $file_audio, $content, $username, $uid)
    {
        $subject = mysql_escape_string($subject);
        $content = mysql_escape_string($content);
        $username = mysql_escape_string($username);
        $uid = mysql_escape_string($uid);
        $this->query ("INSERT INTO etk_post (subject, content, file_pic, file_audio, addtime, user, user_id) VALUES('$subject', '$content', '$file_pic', '$file_audio', '".date("Y-m-d H:i:s")."', '$username', $uid)");
    }
    public function get_posts()
    {
        return $this->query ("SELECT * FROM etk_post WHERE status=1");
    }

    public function seach_posts($keyword){
        if (null !== $keyword) {
            $keyword = mysql_real_escape_string ($keyword);
            $q = "SELECT * FROM etk_post WHERE (status=0 OR status=1) AND (subject LIKE '%{$keyword}%' OR content LIKE '%{$keyword}%')";
        }
        else {
            $q = "SELECT * FROM etk_post WHERE status=0 OR status=1";
        }
        return $this->query ($q);
    }

    public function seach_post_by_id($post_id)
    {
        $post_id = mysql_real_escape_string($post_id);
        $q = "SELECT * FROM etk_post WHERE id={$post_id}";
        $results = $this->query ($q);
        return $results;
    }

    public function search_comments_by_post($post_id){
        $post_id = mysql_real_escape_string($post_id);
        $q = "SELECT * FROM etk_comment WHERE post_id={$post_id} order by time";
        $results = $this->query ($q);
        return $results;
    }

    public function postComment($post_id, $subject, $content, $user){
        $post_id = mysql_real_escape_string($post_id);
        $subject = mysql_real_escape_string($subject);
        $content = mysql_real_escape_string($content);
        $user = mysql_real_escape_string($user);
        $this->query ("INSERT INTO etk_comment (subject, content, time, user, post_id, num_replies) VALUES('$subject', '$content',UTC_TIMESTAMP(), '$user', '$post_id',0)");


    }

     public function postReply($post_id, $subject, $content, $user, $comment_id){
        $post_id = mysql_real_escape_string($post_id);
        $subject = mysql_real_escape_string($subject);
        $content = mysql_real_escape_string($content);
        $user = mysql_real_escape_string($user);
        $comment_id=mysql_real_escape_string($comment_id);
        $this->query ("INSERT INTO etk_comment (subject, content, time, user, post_id, parent_comment_id) VALUES('$subject', '$content',UTC_TIMESTAMP(), '$user', '$post_id','$comment_id')");
        $num=(int)$this->query ("SELECT num_replies FROM etk_comment WHERE parent_comment_id={$comment_id}");
        $num=$num+1;
        $this->query ("INSERT INTO etk_comment (num_replies) VALUES('$num')");

    } 
}

?>