<?php

/* @Framework/Form/radio_widget.html.php */
class __TwigTemplate_b5153a8d5a46453a5d25ea0b07aab86417ff635c69d449cf6f9ab6cb1b32db88 extends Twig_Template
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
        $__internal_1e7fe63037d65f21ffb5b565a57321309bbb6a54d5d4e3e72d1eda2ca6ac0b71 = $this->env->getExtension("native_profiler");
        $__internal_1e7fe63037d65f21ffb5b565a57321309bbb6a54d5d4e3e72d1eda2ca6ac0b71->enter($__internal_1e7fe63037d65f21ffb5b565a57321309bbb6a54d5d4e3e72d1eda2ca6ac0b71_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/radio_widget.html.php"));

        // line 1
        echo "<input type=\"radio\"
    <?php echo \$view['form']->block(\$form, 'widget_attributes') ?>
    value=\"<?php echo \$view->escape(\$value) ?>\"
    <?php if (\$checked): ?> checked=\"checked\"<?php endif ?>
/>
";
        
        $__internal_1e7fe63037d65f21ffb5b565a57321309bbb6a54d5d4e3e72d1eda2ca6ac0b71->leave($__internal_1e7fe63037d65f21ffb5b565a57321309bbb6a54d5d4e3e72d1eda2ca6ac0b71_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/radio_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <input type="radio"*/
/*     <?php echo $view['form']->block($form, 'widget_attributes') ?>*/
/*     value="<?php echo $view->escape($value) ?>"*/
/*     <?php if ($checked): ?> checked="checked"<?php endif ?>*/
/* />*/
/* */
