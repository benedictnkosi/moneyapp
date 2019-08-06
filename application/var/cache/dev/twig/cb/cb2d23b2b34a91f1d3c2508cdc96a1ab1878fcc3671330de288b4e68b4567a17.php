<?php

/* @Framework/Form/form_enctype.html.php */
class __TwigTemplate_1fa4e086008780ab2e7112a31f0d74c92959f8a4ac941bc7251c2e379631f43b extends Twig_Template
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
        $__internal_8836db123373be0f1f9909d3d5045e740397c72d47cef56557310fdbca8068b8 = $this->env->getExtension("native_profiler");
        $__internal_8836db123373be0f1f9909d3d5045e740397c72d47cef56557310fdbca8068b8->enter($__internal_8836db123373be0f1f9909d3d5045e740397c72d47cef56557310fdbca8068b8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_enctype.html.php"));

        // line 1
        echo "<?php if (\$form->vars['multipart']): ?>enctype=\"multipart/form-data\"<?php endif ?>
";
        
        $__internal_8836db123373be0f1f9909d3d5045e740397c72d47cef56557310fdbca8068b8->leave($__internal_8836db123373be0f1f9909d3d5045e740397c72d47cef56557310fdbca8068b8_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_enctype.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if ($form->vars['multipart']): ?>enctype="multipart/form-data"<?php endif ?>*/
/* */
