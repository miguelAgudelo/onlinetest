
<div class="resultados form large-9 medium-8 columns content">
    <?= $this->Form->create($resultado) ?>
    <fieldset>
        <legend><?= __('Edit Resultado') ?></legend>
        <?php
            echo $this->Form->input('evaluacionpregunta_id', ['options' => $evaluacionpreguntas]);
            echo $this->Form->input('respuesta_id', ['options' => $respuestas]);
            echo $this->Form->input('correcta');
            echo $this->Form->input('puntos');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
