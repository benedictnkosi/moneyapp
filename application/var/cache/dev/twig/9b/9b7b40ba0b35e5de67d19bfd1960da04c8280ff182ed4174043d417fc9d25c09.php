<?php

/* @Framework/Form/collection_widget.html.php */
class __TwigTemplate_a965d0a2391e09c67e1d795ab435fd3a4de398b14540aafa0ac5e30f50ff72d1 extends Twig_Template
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
        $__internal_f7e9155bcf319ada24e8969ce0f869ad4bd59ac35fa3a71739ea8d1b9e3bf4d8 = $this->env->getExtension("native_profiler");
        $__internal_f7e9155bcf319ada24e8969ce0f869ad4bd59ac35fa3a71739ea8d1b9e3bf4d8->enter($__internal_f7e9155bcf319ada24e8969ce0f869ad4bd59ac35fa3a71739ea8d1b9e3bf4d8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/collection_widget.html.php"));

        // line 1
        echo "<?php if (isset(\$prototype)): ?>
    <?php \$attr['data-prototype'] = \$view->escape(\$view['form']->row(\$prototype)) ?>
<?php endif ?>
<?php echo \$view['form']->widget(\$form, array('attr' => \$attr)) ?>
";
        
        $__internal_f7e9155bcf319ada24e8969ce0f869ad4bd59ac35fa3a71739ea8d1b9e3bf4d8->leave($__internal_f7e9155bcf319ada24e8969ce0f869ad4bd59ac35fa3a71739ea8d1b9e3bf4d8_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/collection_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if (isset($prototype)): ?>*/
/*     <?php $attr['data-prototype'] = $view->escape($view['form']->row($prototype)) ?>*/
/* <?php endif ?>*/
/* <?php echo $view['form']->widget($form, array('attr' => $attr)) ?>*/
/* */
