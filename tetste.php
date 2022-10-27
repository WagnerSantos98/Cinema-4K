<?php
include_once('db/conexao.php');
//include_once('db/filtro_chamado.php');
$consulta= "SELECT * FROM chamado";
$consulta=  mysqli_query($con, $consulta) or die("Erro ao tentar cadastrar");

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assests/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="assests/css/meucss.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assests/css/bootstrap.min.css" rel="stylesheet">
    <script src="assests/js/timer.js"></script>
    <script src="assests/js/bootstrap.min.js"></script>
  <body>

 

    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
<a class="navbar-brand" href="logout.php"><img src="../assests/img/logo2.png" alt="some text" width=80 height=60 style="margin-top:-25%"></a>
  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
    
    </ul>
  </div>
</nav>



    <title>Colaborador</title>
<br>
<br>

<form method="POST" action="db/relatorio.php">
    <div class="container">
        <h1>Lista de chamados em aberto</h1>
        <?php echo "<p style='color: black'>Bem-vindo " . $_SESSION['username'] . "</p>"; ?>
        <input type="button" id="btnBP" value="Bragança">
        <input type="button" id="btnCP" value="Campinas">
        <input type="button" id="btnITB" value="Itatiba">

        
        


<table class="table table-striped table-hover " id="myTable">
  <thead>
      
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Professor</th>
      <th scope="col">Campus</th>
      <th scope="col">Predio</th>
      <th scope="col">Sala</th>
      <th scope="col">Descrição</th>
      <th scope="col">Suporte</th>
      <th scope="col">Status</th>
      <th scope="col">Tempo de Atendimento</th>
      <th scope="col">Solução</th>
      <th scope="col">Conclusão</th>

    </tr>
  </thead>
  <?php while($dado = $consulta->fetch_array()){?>
  <tbody>
    
    <tr class="" id="chamado">
    <td><?php echo $dado["id_chamado"]; ?></td>
      <td><?php echo $dado["nome"]; ?></td>
      <td><?php if($dado['campus']== 1){
        echo "Itatiba";
      }elseif($dado['campus']== 2){
        echo "Bragança";
      }elseif($dado['campus']== 3){
        echo "Swift";
      }else{
        echo "Cambui";
      }?></td>
      <td><?php if ($dado["predio"] == 1) {
                    echo "Prédio 3";
                  } elseif ($dado["predio"] == 2) {
                    echo "Prédio 4";
                  } elseif ($dado["predio"] == 3) {
                    echo "Prédio 5";
                  } elseif ($dado["predio"] == 4) {
                    echo "Bloco 1";
                  } elseif ($dado["predio"] == 5) {
                    echo "Bloco 2";
                  } elseif ($dado["predio"] == 6) {
                    echo "Bloco 3";
                  } elseif ($dado["predio"] == 7) {
                    echo "Bloco 4";
                  } elseif ($dado["predio"] == 8) {
                    echo "Bloco 5";
                  } elseif ($dado["predio"] == 9) {
                    echo "Prédio 1";
                  } elseif ($dado["predio"] == 10) {
                    echo "Prédio 2";
                  } elseif ($dado["predio"] == 11) {
                    echo "Prédio 3";
                  } elseif ($dado["predio"] == 12) {
                    echo "Prédio 4";
                  } elseif ($dado["predio"] == 13) {
                    echo "Prédio 5";
                  } elseif ($dado["predio"] == 14) {
                    echo "Prédio 6";
                  } elseif ($dado["predio"] == 15) {
                    echo "Prédio 7";
                  } elseif ($dado["predio"] == 16) {
                    echo "Prédio 14";
                  } elseif ($dado["predio"] == 17) {
                    echo "CT";
                  } elseif ($dado["predio"] == 18) {
                    echo "UNIFAG";
                  } elseif ($dado["predio"] == 19) {
                    echo "NPJ";
                  } elseif ($dado["predio"] == 20) {
                    echo "Principal";
                  } elseif ($dado["predio"] == 21) {
                    echo "Madre Cecília";
                  } elseif ($dado["predio"] == 22) {
                    echo "Prédio 1";}


                  ?></td>
      <td><?php echo $dado["sala"]; ?></td>
      <td><?php echo $dado["descricao"]; ?></td>
    
      <td>
      <select id="cboTec" name="tecnico" class="form-control" onchange="update();"></select>
      </td>
      <td><input id="a_chkDelete" type="checkbox" class="form-group chkDelete" onclick="start();"></td>
      <td><p type="text" class="form-group startTimer" id="counter" name="tempo_atendimento"></p></td>
      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="pause();" onblur="showTableData();" onblur="showTable();">Solução</button></td>
      <td><a href="db/conclui_chamado.php?delete=<?php echo $dado['id_chamado']; ?>"
    class="btn btn-success" onclick="stop();">Finalizado</a></td>
      

    <script>
    function redirect()
    {
      window.location.reload()
    }
    </script>
      
      </tr>


    
  </tbody>
  <?php }
  ?>
</table>


<br>
<br>
<br>


<script src="jquery.js"></script>
<script>
    $(document).ready(function()
                     {
        $("#fetchval").on('change',function()
                         {
            var keyword = $(this).val();
            $.ajax(
            {
                url:'fetch.php',
                type:'POST',
                data:'request='+keyword,
                
                beforeSend:function()
                {
                    $("#table-container").html('Working...');
                    
                },
                success:function(data)
                {
                    $("#table-container").html(data);
                },
            });
        });
    });
    
</script>


<script src="assests/js/filtro.js"></script>
<script>
  $('#myTable').ddTableFilter();
</script>

<script>
$('#myTable').find('input:checkbox[id$="chkDelete"]').click(function() {
    var isChecked = $(this).prop("checked");
    var $selectedRow = $(this).parent("td").parent("tr");

    if (isChecked) $selectedRow.css({
        "background-color": "#158CBA",
        "color": "GhostWhite"
    });
    else $selectedRow.css({
        "background-color": '',
        "color": "black"
    });
});
</script>


<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="db/relatorio.php">
          <div class="form-group">
          <label for="inputNome" class="col-md-6 control-label">Técnico</label>
            <div class="col-md-12">
              <input name="tecnico" type="text" class="form-control" id="nomeTecnico" value="" disabled="disabled">
            </div>
          </div>
          <div class="form-group">
          <label  class="col-md-6 control-label">Tempo de Atendimento</label>
          <div class="col-md-12">
             <label name="tempo" class="form-control" id="info" value="" ></label>
          </div>
          <div class="form-group">
          <label  class="col-md-6 control-label">Solução</label>
          <div class="col-md-12">
            <textarea class="form-control" id="recipient-message-text" name="solucao" placeholder="Descreva a solução do atendimento..."></textarea>
          </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <input name="send" type="submit" class="btn btn-primary" value="Enviar">
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipienttecnico = button.data('whatevertecnico')
  var recipientatendimento = button.data('whateveratendimento') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Atendimento')
  modal.find('#recipient-tecnico').val(recipienttecnico)
  modal.find('#recipient-tempo_atendimento').val(recipientatendimento)
  
})
</script>


<script>

function showTableData() {
        document.getElementById('info').innerHTML = "";
        var myTab = document.getElementById('myTable');

        // LOOP THROUGH EACH ROW OF THE TABLE AFTER HEADER.
        for (i = 1; i < myTab.rows.length; i++) {

            // GET THE CELLS COLLECTION OF THE CURRENT ROW.
            var objCells = myTab.rows.item(i).cells;

            // LOOP THROUGH EACH CELL OF THE CURENT ROW TO READ CELL VALUES.
            for (var j = 8; j <= objCells.length; j++) {
                

                if(j == 8 || j<=8){
                  info.innerHTML = info.innerHTML + ' ' + objCells.item(j).innerHTML;
                }
            }
            info.innerHTML = info.innerHTML + '<br />';     // ADD A BREAK (TAG).
        }
    }
</script>


<script>
$('#cboTec').on('change', function() {
  $('#exampleModal #nomeTecnico').val($(this).find('option:selected').text());
  
});
</script>

<script>
document.getElementById("btnBP").onclick = function() {
    var comboTec = document.getElementById("cboTec");

    var opt0 = document.createElement("option");
    opt0.value = "0";
    opt0.text = "--Selecione--";
    comboTec.add(opt0, comboTec.options[0]);

    var opt1 = document.createElement("option");
    opt1.value = "Wagner";
    opt1.text = "Wagner";
    comboTec.add(opt1, comboTec.options[1]);
}
document.getElementById("btnCP").onclick = function() {
    var comboTec = document.getElementById("cboTec");

    var opt0 = document.createElement("option");
    opt0.value = "0";
    opt0.text = "--Selecione--";
    comboTec.add(opt0, comboTec.options[0]);

    var opt1 = document.createElement("option");
    opt1.value = "Lucas";
    opt1.text = "Lucas";
    comboTec.add(opt1, comboTec.options[1]);
}
document.getElementById("btnITB").onclick = function() {
    var comboTec = document.getElementById("cboTec");

    var opt0 = document.createElement("option");
    opt0.value = "0";
    opt0.text = "--Selecione--";
    comboTec.add(opt0, comboTec.options[0]);

    var opt1 = document.createElement("option");
    opt1.value = "Laura";
    opt1.text = "Laura";
    comboTec.add(opt1, comboTec.options[1]);
}
</script>
</body></head>