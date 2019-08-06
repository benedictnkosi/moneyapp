<?php

/* @Framework/Form/button_widget.html.php */
class __TwigTemplate_deb61920885899ed954f8662a4cdb7dfe95e915733ff273e801b2e44e7049ed2 extends Twig_Template
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
        $__internal_9f666d336650124f3c5f7e506aebec3e34aec2b6467dfdaff9246d45c6158ce5 = $this->env->getExtension("native_profiler");
        $__internal_9f666d336650124f3c5f7e506aebec3e34aec2b6467dfdaff9246d45c6158ce5->enter($__internal_9f666d336650124f3c5f7e506aebec3e34aec2b6467dfdaff9246d45c6158ce5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/button_widget.html.php"));

        // line 1
        echo "<?php if (!\$label) { \$label = isset(\$label_format)
    ? strtr(\$label_format, array('%name%' => \$name, '%id%' => \$id))
    : \$view['form']->humanize(\$name); } ?>
<button type=\"<?php echo isset(\$type) ? \$view->escape(\$type) : 'button' ?>\" <?php echo \$view['form']->block(\$form, 'button_attributes') ?>><?php echo \$view->escape(false !== \$translation_domain ? \$view['translator']->trans(\$label, array(), \$translation_domain) : \$label) ?></button>
";
        
        $__internal_9f666d336650124f3c5f7e506aebec3e34aec2b6467dfdaff9246d45c6158ce5->leave($__internal_9f666d336650124f3c5f7e506aebec3e34aec2b6467dfdaff9246d45c6158ce5_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/button_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if (!$label) { $label = isset($label_format)*/
/*     ? strtr($label_format, array('%name%' => $name, '%id%' => $id))*/
/*     : $view['form']->humanize($name); } ?>*/
/* <button type="<?php echo isset($type) ? $view->escape($type) : 'button' ?>" <?php echo $view['form']->block($form, 'button_attributes') ?>><?php echo $view->escape(false !== $translation_domain ? $view['translator']->trans($label, array(), $translation_domain) : $label) ?></button>*/
/* */
