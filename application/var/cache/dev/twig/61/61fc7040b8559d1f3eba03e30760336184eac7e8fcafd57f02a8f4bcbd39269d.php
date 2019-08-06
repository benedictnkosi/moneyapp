<?php

/* WebProfilerBundle:Collector:router.html.twig */
class __TwigTemplate_894f697b056c052d25eb16d8f6c149786c3171b9164c4b89838d1780e78e25f7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "WebProfilerBundle:Collector:router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_4749139121ba9ad4c70e2bd4ca0f7dc40393c4ea68e38e52bb9027381e91e549 = $this->env->getExtension("native_profiler");
        $__internal_4749139121ba9ad4c70e2bd4ca0f7dc40393c4ea68e38e52bb9027381e91e549->enter($__internal_4749139121ba9ad4c70e2bd4ca0f7dc40393c4ea68e38e52bb9027381e91e549_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Collector:router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_4749139121ba9ad4c70e2bd4ca0f7dc40393c4ea68e38e52bb9027381e91e549->leave($__internal_4749139121ba9ad4c70e2bd4ca0f7dc40393c4ea68e38e52bb9027381e91e549_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_49fbf21a5c31d81f792f6221a1d35bded10cd52fcf005f8aae2f7a0966fb5a18 = $this->env->getExtension("native_profiler");
        $__internal_49fbf21a5c31d81f792f6221a1d35bded10cd52fcf005f8aae2f7a0966fb5a18->enter($__internal_49fbf21a5c31d81f792f6221a1d35bded10cd52fcf005f8aae2f7a0966fb5a18_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_49fbf21a5c31d81f792f6221a1d35bded10cd52fcf005f8aae2f7a0966fb5a18->leave($__internal_49fbf21a5c31d81f792f6221a1d35bded10cd52fcf005f8aae2f7a0966fb5a18_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_99ef353f163ee5d506a737f3852f339ef9e7aa8c247fc6a1cf29f30ef0598982 = $this->env->getExtension("native_profiler");
        $__internal_99ef353f163ee5d506a737f3852f339ef9e7aa8c247fc6a1cf29f30ef0598982->enter($__internal_99ef353f163ee5d506a737f3852f339ef9e7aa8c247fc6a1cf29f30ef0598982_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_99ef353f163ee5d506a737f3852f339ef9e7aa8c247fc6a1cf29f30ef0598982->leave($__internal_99ef353f163ee5d506a737f3852f339ef9e7aa8c247fc6a1cf29f30ef0598982_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_e8a653f8b5c45a2659ab6ad1c6293e01a0097e75c16a05955cbfce2cce33cf3d = $this->env->getExtension("native_profiler");
        $__internal_e8a653f8b5c45a2659ab6ad1c6293e01a0097e75c16a05955cbfce2cce33cf3d->enter($__internal_e8a653f8b5c45a2659ab6ad1c6293e01a0097e75c16a05955cbfce2cce33cf3d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_e8a653f8b5c45a2659ab6ad1c6293e01a0097e75c16a05955cbfce2cce33cf3d->leave($__internal_e8a653f8b5c45a2659ab6ad1c6293e01a0097e75c16a05955cbfce2cce33cf3d_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
