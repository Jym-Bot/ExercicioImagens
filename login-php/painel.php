<?php
include('funcao.php');

?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meu Álbum</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/painel.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3d7b354ff0.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="row py-5 px-4">
        <div class="col-xl-10 col-md-10 col-sm-10 mx-auto">
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-0 pb-4 bg-dark">
                    <div class="media align-items-end profile-header">
                        <div class="media-body mb-4 text-white">
                            <h4 class="mt-5 mb-5"><?php echo "Olá, " . $_SESSION['nome'] . ", Bem-vindo(a) ao seu album de fotos! "; ?><i class="far fa-smile-wink"></i></h4>
                        </div>
                    </div>
                </div>
                <div class="py-5 px-5">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="mb-0"><i class="fas fa-camera-retro"> Fotos recentes</i></h5>
                        <h5><a class="btn-danger btn-sm btn-block" href="logout.php"> <i class="fas fa-sign-out-alt"> Sair </i></a></h5>
                    </div>
                    <br />
                    <div>
                        <form name="enviarimagem" action="enviar.php" method="POST" enctype="multipart/form-data">
                            <input class="btn btn-dark btn-sm btn-block" type="file" name="img" value="" />
                            <input class="btn btn-primary btn-sm btn-block" type="submit" value="Enviar" name="enviar" />
                            <!--<a href="#" class="btn btn-dark btn-sm btn-block">Adicionar foto ao album</a>-->
                        </form>
                    </div>
                    <br>
                    <div class="row">
                        <table>
                            <tr>
                                <?php
                                $cont = 0;
                                foreach ($album as $foto) {
                                    $cont++;
                                ?>
                                    <td>
                                        <form name="deletarimagem" action="deletar.php" method="POST" enctype="multipart/form-data">
                                            <img src="<?php echo "./imagems/" . $foto["nome"] ?>" width="250" height="200" alt="" class="img-fluid rounded shadow-sm" />
                                            <input type="hidden" value="<?php echo $foto['id_imagem']; ?>" name="idimg"/>
                                            <h5><input class="btn-danger btn-sm btn-block" type="submit" value="Deletar" name="delete" /></h5>
                                        </form>
                                    </td>
                                <?php
                                    if ($cont == 4) {
                                        echo "</tr>";
                                        echo "<tr>";
                                        $cont = 0;
                                    }
                                }
                                ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>