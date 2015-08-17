<main>
    <?php echo form_open('home/post', ['class' => 'form','id' => 'form', 'enctype' => 'multipar/form-data']); ?>
        <h2>pagina en <br>construcción</h2>

        <p>Pero ya que estás aquí, déjanos tus <br> datos que nosotros contestamos rapidito.</p>

        <input type="text" placeholder="Tu nombre">
        <input type="text" placeholder="Tu correo electrónico">
        <textarea name="" placeholder="Tu mensaje"></textarea>
        <button> Enviar </button>
    </form>
    <figure class="logo">
        <?php echo img(['src' => 'assets/images/la-mala-compania.png']) ?>
    </figure>
    <h1>LA MALA COMPAÑIA</h1>
    <h3>Audiovisual -  Digital - Eventos</h3>
</main>