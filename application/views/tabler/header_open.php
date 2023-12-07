<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Clustering Wilayah Rawan Longsor Dengan K-Means</title>
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="<?=base_url('asset/favicon.ico');?>" />
    <!-- CSS files -->
    <link href="<?=base_url('asset/tabler/css/tabler.min.css?1684106062');?>" rel="stylesheet"/>
    <link href="<?=base_url('dist/css/demo.min.css?1684106062');?>" rel="stylesheet"/>
	<style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.1/sweetalert2.min.css" integrity="sha512-l1vPIxNzx1pUOKdZEe4kEnWCBzFVVYX5QziGS7zRZE4Gi5ykXrfvUgnSBttDbs0kXe2L06m9+51eadS+Bg6a+A==" crossorigin="anonymous" referrerpolicy="no-referrer" />