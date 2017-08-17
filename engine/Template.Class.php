<?php
//https://www.revista-programar.info/artigos/sistema-basico-de-templates-em-php/2/
class Template {
   var $template_html = array();
   var $template_vars = array();
   var $template_path;
   //---------------------------
   // Load template html files into variables
   //---------------------------
   function TemplateLoad($template) {
      // Goes through every template and loads it
      foreach ($template as $index=> $value) {
         // Just load the template or check if we should load it?
         if (is_array($value)) {
            foreach ($value as $file => $load) {
               // Should we load this template?
               if ($load) {
                  $this->template_html[$index] = file_get_contents($this->template_path.$file);
               }
            }
         } else {
            $this->template_html[$index] = file_get_contents($this->template_path.$value);
         }
      }
   }

   //------------------------------------
   // Define template content for some references
   //------------------------------------
   function TemplateDefine($references) {
       // Clears the current references and their content
       $this->template_vars = array();
       // Saves the content with it's reference associated
       foreach ($references as $reference => $content) {
          $this->template_vars['{'.$reference.'}'] = $content;
       }
   }

   //------------------------------------
   // Replace references in template with saved content
   //------------------------------------
   function TemplateExport($template,
                           $getonly = false) {
      // Should we parse the template references or just get the HTML?
      if (!$getonly) {
         // Split the HTML code into lines
         $html_code = $this->template_html[$template];
         $html_code = explode("\n",$html_code);
         $line_count = count($html_code);
         // Replace only the lines needed
         for ($i = 0; $i <$line_count; $i++) {
            foreach ($this->template_vars as $reference =>$content) {
               if(strstr($html_code[$i],$reference)) {
                  $html_code[$i] = str_replace($reference, $content, $html_code[$i]);
               }
            }
         }
         // Join the HTML code lines and return the final code
         $html_code = implode("\n",$html_code);
      } else {
         $html_code = $this->template_html[$template];
      }
      // Return our template HTML code
      return $html_code;
   }
}
?>
