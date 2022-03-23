<?php

namespace Drupal\webcam\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;
use Drupal\file\Entity\File;
use Symfony\Component\HttpFoundation\Request;
use \Drupal\Core\Ajax\AjaxResponse;



class WebcamController extends ControllerBase {

   /**
     * Article status change
     *
     * @Method("POST")
     **/

    public function checkName(Request $request) {
     
      $img = \Drupal::request()->request->get('photo');


       $img = str_replace('data:image/png;base64,', '', $img);
       $img = str_replace(' ', '+', $img);
       $data = base64_decode($img);
       $file = 'sites/default/files/capture/IMG.'. uniqid() . '.png';
       $success = file_put_contents($file, $data);
       print $success ? $file : 'Unable to save the file.';

       return new Response($file);
        
      }
}
