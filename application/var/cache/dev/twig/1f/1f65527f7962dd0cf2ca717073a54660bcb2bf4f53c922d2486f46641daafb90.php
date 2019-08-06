<?php

/* @Framework/Form/form_rows.html.php */
class __TwigTemplate_008bf50fbdca9baec63d8982c5421afa2688b9d6bdd69db3ce296cb0291964b6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_3c5b15dfbc96121f1bc29d334acdaa58260a20db7f7665737de2999ff6051000 = $this->env->getExtension("native_profiler");
        $__internal_3c5b15dfbc96121f1bc29d334acdaa58260a20db7f7665737de2999ff6051000->enter($__internal_3c5b15dfbc96121f1bc29d334acdaa58260a20db7f7665737de2999ff6051000_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_rows.html.php"));

        // line 1
        echo "<?php foreach (\$form as \$child) : ?>
    <?php echo \$view['form']->row(\$child) ?>
<?php endforeach; ?>
";
        
        $__internal_3c5b15dfbc96121f1bc29d334acdaa58260a20db7f7665737de2999ff6051000->leave($__internal_3c5b15dfbc96121f1bc29d334acdaa58260a20db7f7665737de2999ff6051000_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_rows.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php foreach ($form as $child) : ?>*/
/*     <?php echo $view['form']->row($child) ?>*/
/* <?php endforeach; ?>*/
/* */
