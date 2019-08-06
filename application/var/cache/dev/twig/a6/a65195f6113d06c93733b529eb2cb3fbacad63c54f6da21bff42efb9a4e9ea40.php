<?php

/* @Framework/Form/form_widget.html.php */
class __TwigTemplate_b6e7e1a8a6cbc1ebb58bc5f9393c020cbb24ad9082b94d7e524588f3c58412af extends Twig_Template
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
        $__internal_c44afa969690a5be3c61f92e98dff8ec7f588adc4bf9515cb40bacfee1b7f36b = $this->env->getExtension("native_profiler");
        $__internal_c44afa969690a5be3c61f92e98dff8ec7f588adc4bf9515cb40bacfee1b7f36b->enter($__internal_c44afa969690a5be3c61f92e98dff8ec7f588adc4bf9515cb40bacfee1b7f36b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_widget.html.php"));

        // line 1
        echo "<?php if (\$compound): ?>
<?php echo \$view['form']->block(\$form, 'form_widget_compound')?>
<?php else: ?>
<?php echo \$view['form']->block(\$form, 'form_widget_simple')?>
<?php endif ?>
";
        
        $__internal_c44afa969690a5be3c61f92e98dff8ec7f588adc4bf9515cb40bacfee1b7f36b->leave($__internal_c44afa969690a5be3c61f92e98dff8ec7f588adc4bf9515cb40bacfee1b7f36b_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if ($compound): ?>*/
/* <?php echo $view['form']->block($form, 'form_widget_compound')?>*/
/* <?php else: ?>*/
/* <?php echo $view['form']->block($form, 'form_widget_simple')?>*/
/* <?php endif ?>*/
/* */
