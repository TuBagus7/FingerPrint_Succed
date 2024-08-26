<html>
    <head>
        <title>Tutorial jQuery Select Picker</title>

        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
        <link rel="stylesheet" href="css/bootstrap-select.min.css"/>
		 <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
		
    </head>

    <body>

        <div class="container">
            <h1 class="page-header">jQuery Select Picker</h1>

            <div class="col-md-5">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        Formulir
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="txtNama" class="form-control" required autofocus>
                        </div>

                        <div class="form-group">
                            <label>Bidang Keahlian</label>

                            <select class="form-control selectpicker" name="cmbKeahlian" data-live-search="true" required>
                                <option disabled selected value> -- Pilih Salah Satu -- </option>
                                <option value="Teknologi">Teknologi</option>
                                <option value="Kesenian">Kesenian</option>
                                <option value="Olahraga">Olahraga</option>
                                <option value="Kesehatan">Kesehatan</option>
                                <option value="Politik">Politik</option>
                                <option value="Ekonomi">Ekonomi</option>
                            </select>
                        </div>
                    </div>

                    <div class="panel-footer">

                    </div>

                </div>
            </div>
        </div>

       
    </body>
</html>