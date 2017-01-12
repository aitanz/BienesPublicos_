  <div class="reportes_form">

      <?php

  $reportico = \Yii::$app->getModule('reportico');
        $engine = $reportico->getReporticoEngine();        // Fetches reportico engine
                                                            // Allows access to report output only
        $engine->initial_execute_mode = "PREPARE";         // Just executes specified report
        $engine->initial_project = "bienes";            //NOMBRE DE LA CARPETA DEL PROYECTO   
        $engine->initial_report = "bienes.xml";           // NOMBRE DEL REPORTE DEL PROYECTO XML
        $engine->initial_output_format = "PDF";
        $engine->bootstrap_styles = "3";                   // Set to "3" for bootstrap v3, "2" for V2 or false for no bootstrap
        $engine->force_reportico_mini_maintains = true;    // Often required
        $engine->bootstrap_preloaded = true;               // true if you dont need Reportico to load its own bootstrap
        $engine->clear_reportico_session = true;           // Normally required

        $engine->execute();       

          ?> 
      
 
      
</div>