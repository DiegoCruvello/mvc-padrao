<div class="row container">
    <div class="col s12">
        <h3 class="ligth">Editar</h3>
    </div>


    <div class="col s12">
    <form action="?router=Site/alterar/" method="post">
        <?php foreach($editarForm as $registro): ?>

            <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
            <div class="input-field col s12 m6">
                <input type="text" name="nome" id="nome" value="<?php echo $registro['nome']; ?>" required>
                <label for="nome">Digite seu Nome</label>
            </div>

            <div class="input-field col s12 m6">
                <input type="email" name="email" id="email" value="<?php echo $registro['email']; ?>" required>
                <label for="email">Digite seu E-mail</label>
            </div>

            <div class="input-field col s12">
                <input type="submit" value="Salvar Alterações" class="btn-small">
                <input type="reset" value="limpar" class="btn-small red">
            </div>
        <?php endforeach; ?>
    </form>
    </div>

</div>