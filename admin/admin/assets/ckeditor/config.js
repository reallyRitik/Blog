CKEDITOR.editorConfig = function( config )
{

   config.skins = 'office2003';

   config.toolbar = 'toolbarLight';

    config.height = '400px';


    config.toolbar_toolbarLight =
    [ 
        
        ['Image', 'Table','HorizontalRule' , 'Link','Unlink' ] ,
       
        ['Styles','Format','Font','FontSize', 'Bold','Italic','Strike','NumberedList','BulletedList','Outdent','Indent','Blockquote', 'TextColor','BGColor'],
        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock']

    ];

   config.toolbar_Fullx =
   [
      
      ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
      ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
      ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
      ['Link','Unlink','Anchor'],
      ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar'],
      '/',
      ['Styles','Format','Font','FontSize'],
      ['TextColor','BGColor'],
      ['Maximize', 'ShowBlocks']
   ];

};