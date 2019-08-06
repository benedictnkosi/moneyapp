<?php

/* @Framework/Form/money_widget.html.php */
class __TwigTemplate_d64b8ae7434df35bea59407052208b51c0b72aab94da532e694463db00af9728 extends Twig_Template
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
        $__internal_750c4e69cda41034dcb32a76cb3f02bf1c17cb09e4c3f28f2b183551859a679e = $this->env->getExtension("native_profiler");
        $__internal_750c4e69cda41034dcb32a76cb3f02bf1c17cb09e4c3f28f2b183551859a679e->enter($__internal_750c4e69cda41034dcb32a76cb3f02bf1c17cb09e4c3f28f2b183551859a679e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/money_widget.html.php"));

        // line 1
        echo "<?php echo str_replace('";
        echo twig_escape_filter($this->env, (isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")), "html", null, true);
        echo "', \$view['form']->block(\$form, 'form_widget_simple'), \$money_pattern) ?>
";
        
        $__internal_750c4e69cda41034dcb32a76cb3f02bf1c17cb09e4c3f28f2b183551859a679e->leave($__internal_750c4e69cda41034dcb32a76cb3f02bf1c17cb09e4c3f28f2b183551859a679e_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/money_widget.html.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php echo str_replace('{{ widget }}', $view['form']->block($form, 'form_widget_simple'), $money_pattern) ?>*/
/* */
