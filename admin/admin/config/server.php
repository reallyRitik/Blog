<?php

if(isset($_POST['publishblog']))
   {
       $author           = trim(strip_tags($_POST['author']));
       $title            = trim(strip_tags($_POST['title']));
       $description      = trim($_POST['description']);
       $tag              = trim(strip_tags($_POST['tag']));
       $category1        = $_POST['category'];
       $category         = implode(",", $category1);
       $image_alt        = trim(strip_tags($_POST['image_alt']));
       $page_title       = trim(strip_tags($_POST['page_title']));
       $page_description = trim(strip_tags($_POST['page_description']));
       $page_keyword     = trim(strip_tags($_POST['page_keyword']));
       $other_meta_tags  = $_POST['other_meta_tags'];
       $file    = '';
       $tmpfile = '';

       if(!empty($_FILES['thumbnail']['name']))
       {
           $file    = $_FILES['thumbnail']['name'];
           $tmpfile = $_FILES['thumbnail']['tmp_name'];
       }
       
       $obj  = new Blog();
       $blog = $obj->addblog($title, $description, $tag, $file, $tmpfile, $image_alt, $category,$author,$page_title,$page_description,$page_keyword,$other_meta_tags);
       if($blog)
       {
           header('location:'.$baseurl.'/dashboard');
       }
   }


   if(isset($_POST['editblog']))
   {

       $author           = trim(strip_tags($_POST['author']));
       $title            = trim(strip_tags($_POST['title']));
       $description      = trim($_POST['description']);
       $tag              = trim(strip_tags($_POST['tag']));
       $image_alt        = trim(strip_tags($_POST['image_alt']));
       $category1        = $_POST['category'];
       $category         = implode(",", $category1);
       $id               = trim(strip_tags($_POST['id']));
       $page_title       = trim(strip_tags($_POST['page_title']));
       $page_description = trim(strip_tags($_POST['page_description']));
       $page_keyword     = trim(strip_tags($_POST['page_keyword']));
       $other_meta_tags  = $_POST['other_meta_tags'];
       
       
       $obj  = new Blog();
       $blog = $obj->editblog($id, $title, $description, $tag, $image_alt, $category,$author,$page_title,$page_description,$page_keyword,$other_meta_tags);
       if($blog)
       { 
       	   echo "<script>alert('Blog updated');location.href='$baseurl/dashboard';</script>";
           //header('location:'.$baseurl.'/dashboard');
       }
   }


   if(!empty($_FILES['updatethumbnail']['name']))
   {
	    $file    = $_FILES['updatethumbnail']['name'];
        $tmpfile = $_FILES['updatethumbnail']['tmp_name'];
        $id      = $_POST['id']; 

        $obj  = new Blog();
        if($obj->updatethumbnail($id, $file, $tmpfile))
        {
        	echo "<script>location.href='$baseurl/edit-blog/$id';</script>";
        }
   }

  //=======================================================================

  if(isset($_POST['add_category']))
  {
    $obj = new Category();
    $category         = trim(strip_tags($_POST['category']));
    $category         = $_POST['category'];
    $page_title       = $_POST['page_title'];
    $page_description = $_POST['page_description'];
    $page_keyword     = $_POST['page_keyword'];
    $other_meta_tags  = $_POST['other_meta_tags'];
    
    $category = $obj->addCategory($category,$page_title,$page_description,$page_keyword,$other_meta_tags);
    if($category)
    {
      header('location:'.$baseurl.'/category');
    }
  }

  if(isset($_POST['deleteCategory']))
  {
    $obj = new Category();
    $categoryId = trim(strip_tags($_POST['categoryId']));

    $catId = $obj->deleteCategory($categoryId);

    if($catId)
    {
      header('location:'.$baseurl.'/category');
    }
  }

  if(isset($_POST['edit_category']))
  {
    $obj = new Category();
    $category         = $_POST['category'];
    $page_title       = $_POST['page_title'];
    $page_description = $_POST['page_description'];
    $page_keyword     = $_POST['page_keyword'];
    $other_meta_tags  = $_POST['other_meta_tags'];
    $categoryId       = $_POST['categoryId'];

    $cat = $obj->editCategory($category,$categoryId,$page_title,$page_description,$page_keyword,$other_meta_tags);

    if($cat)
    {
      header('location:'.$baseurl.'/category');
    }
  }

  //=======================================================================

  if(isset($_POST['add_author']))
  {
    $obj = new Author();
    $author       = trim(strip_tags($_POST['author']));
    $about_author = trim(strip_tags($_POST['about_author']));
    $linkedin     = trim(strip_tags($_POST['linkedin']));
    $twitter      = trim(strip_tags($_POST['twitter']));
    
    $author = $obj->addAuthor($author,$about_author,$linkedin,$twitter);
    if($author)
    {
      header('location:'.$baseurl.'/author');
    }
  }

  if(isset($_POST['deleteAuthor']))
  {
    $obj = new Author();
    $authorId = trim(strip_tags($_POST['authorId']));

    $author_Id = $obj->deleteAuthor($authorId);

    if($author_Id)
    {
      header('location:'.$baseurl.'/author');
    }
  }

  if(isset($_POST['edit_author']))
  {
    $obj = new Author();
    $author       = trim(strip_tags($_POST['author']));
    $about_author = $_POST['about_author'];
    $authorId     = trim(strip_tags($_POST['authorId']));
    $linkedin     = trim(strip_tags($_POST['linkedin']));
    $twitter      = trim(strip_tags($_POST['twitter']));

    $cat = $obj->editAuthor($author,$about_author,$authorId,$linkedin,$twitter);

    if($cat)
    {
      header('location:'.$baseurl.'/author');
    }
  }

    //=======================================================================

  if(isset($_POST['add_social_link']))
  {
    $obj = new Social_link();
    $facebook = trim(strip_tags($_POST['facebook']));
    $linkedin = trim(strip_tags($_POST['linkedin']));
    $twitter  = trim(strip_tags($_POST['twitter']));
    
    $author = $obj->addLink($facebook,$linkedin,$twitter);
    if($author)
    {
      header('location:'.$baseurl.'/social_link');
    }
  }

  if(isset($_POST['delete_social_link']))
  {
    $obj = new Social_link();
    $social_link_id = trim(strip_tags($_POST['social_link_id']));

    $social_link_Id = $obj->deleteSocialLink($social_link_id);

    if($social_link_Id)
    {
      header('location:'.$baseurl.'/social_link');
    }
  }

  if(isset($_POST['edit_social_link']))
  {
    $obj = new Social_link();
    $social_link_id = trim(strip_tags($_POST['social_link_id']));
    $facebook       = trim(strip_tags($_POST['facebook']));
    $linkedin       = trim(strip_tags($_POST['linkedin']));
    $twitter        = trim(strip_tags($_POST['twitter']));

    $cat = $obj->editLink($facebook,$linkedin,$twitter,$social_link_id);

    if($cat)
    {
      header('location:'.$baseurl.'/social_link');
    }
  }

//======================================================================================


if(isset($_POST['comment_status_btn']))
  {
    $obj = new BlogComments();
    $comment_id = trim(strip_tags($_POST['comment_id']));
    $comment_status = trim(strip_tags($_POST['comment_status']));

    $comment_Id = $obj->commentStatus($comment_id,$comment_status);

    if($comment_Id)
    {
      header('location:'.$baseurl.'/blog_comments');
    }
  } 


  if(isset($_POST['delete_comment']))
  {
    $obj = new BlogComments();
    $comment_id = trim(strip_tags($_POST['comment_id']));

    $comment_Id = $obj->deleteComment($comment_id);

    if($comment_Id)
    {
      header('location:'.$baseurl.'/blog_comments');
    }
  }
 ?>