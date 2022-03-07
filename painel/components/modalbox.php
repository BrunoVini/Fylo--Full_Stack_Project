<?php
  try {
    include('../../config.php');
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $local = isset($_POST['local']) ? $_POST['local'] : '';
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $table = isset($_POST['table']) ? $_POST['table'] : '';
    
  } catch (Exception $e) {
      echo $e->getMessage();
  }
?>

<style>
  #question {
	border-radius: 5px;
	border: 1px solid #ccc;
	background: #fff;
	display: inline-block;
	padding: 10px 15px;
	position: absolute;
	z-index: 100;
	left: 50%;
	top: 50%;
	transform: translate(-50%, -50%);
	-webkit-box-shadow: 2px 7px 44px 17px rgba(0,0,0,0.27);
	-moz-box-shadow: 2px 7px 44px 17px rgba(0,0,0,0.27);
	box-shadow: 2px 7px 44px 17px rgba(0,0,0,0.27);
}

#question h3 {
	margin-bottom: 20px;
	font-size: 25px;
}

#question .btns {
	display: flex;
	justify-content: flex-end;
}

#question .btns button {
	border: none;
	outline: none;
	padding: 5px 10px;
	border-radius: 5px;
	cursor: pointer;
}

#question #true {
	background: red;
	color: #fff;
	margin-left: 15px;
  transition: 400ms;
}

#question #true:hover {
  background: #a30303;
}

</style>

<div id="question">
  <h3>Gostaria de excluir esse <?php echo $title?>?</h3>
  <div class="btns">
    <button id="false">Cancelar</button>
    <button id="true">Excluir</button>
  </div>
</div>

<script>
  $('#false, body').click(() => {
    $('#modal').html('');
  })

  $('#question').click(function(e) {
      e.stopPropagation();
  })

  $('#true').click(function() {
    $.post("ajax/deleteElSite.php", {id: <?php echo $id?>, table: '<?php echo $table?>'}, function(data) {
      document.location='<?php echo INCLUDE_PATH_PAINEL.$local ?>';
    })
  })

</script>