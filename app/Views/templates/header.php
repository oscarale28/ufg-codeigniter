<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'CRUD Alumnos') ?></title>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcg4a0PKz9VlD82e125ww==" crossorigin="anonymous" />
    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />
    <!--  Datatables Responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        main {
            gap: 1.5rem;
        }
        
        @media (max-width: 768px) {
            main {
                gap: 0;
                padding: 1rem !important;
            }
            
            main .main-content {
                width: 100% !important;
                max-width: 100% !important;
                flex: 1 1 100%;
                min-width: 0;
                margin: 0;
            }
        }
    </style>
</head>

<body class="bg-light">
    <header class="bg-white border-bottom shadow-sm py-3">
        <div class="container d-flex align-items-center justify-content-center">
            <button class="btn btn-link d-md-none" id="sidebarToggle">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
            </svg>
            </button>
            <div class="d-flex flex-column justify-content-center">
                <h1 class="h2 text-dark text-center"><?= esc($title ?? 'CRUD Alumnos') ?></h1>
                <p class="text-primary lead mb-0 text-center">Oscar Orellana - OM100123</p>
            </div>
        </div>
    </header>
    
    <main class="container-fluid d-flex justify-content-center gap-4 p-4 min-vh-100">
    
    <?= view('templates/sidebar') ?>
    
    <div class="main-content w-100">