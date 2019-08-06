<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_bd8bb493bdddd9fc00b537b1f6261e6164b5111ac439519ad9037b379fb29f91 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
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
        $__internal_84827afdfc399ce788723d6e82264b35d421b870b66ed24a22cd99eae8ad94a8 = $this->env->getExtension("native_profiler");
        $__internal_84827afdfc399ce788723d6e82264b35d421b870b66ed24a22cd99eae8ad94a8->enter($__internal_84827afdfc399ce788723d6e82264b35d421b870b66ed24a22cd99eae8ad94a8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_84827afdfc399ce788723d6e82264b35d421b870b66ed24a22cd99eae8ad94a8->leave($__internal_84827afdfc399ce788723d6e82264b35d421b870b66ed24a22cd99eae8ad94a8_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_710e45287ace22bcae6cf2d6698c6f0cc62e0f4112528735dff9203507f2e9cc = $this->env->getExtension("native_profiler");
        $__internal_710e45287ace22bcae6cf2d6698c6f0cc62e0f4112528735dff9203507f2e9cc->enter($__internal_710e45287ace22bcae6cf2d6698c6f0cc62e0f4112528735dff9203507f2e9cc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_710e45287ace22bcae6cf2d6698c6f0cc62e0f4112528735dff9203507f2e9cc->leave($__internal_710e45287ace22bcae6cf2d6698c6f0cc62e0f4112528735dff9203507f2e9cc_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_cc7474140a6274b305c7c1592ea57776f6036db830a068fb81e06fce2317314a = $this->env->getExtension("native_profiler");
        $__internal_cc7474140a6274b305c7c1592ea57776f6036db830a068fb81e06fce2317314a->enter($__internal_cc7474140a6274b305c7c1592ea57776f6036db830a068fb81e06fce2317314a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_cc7474140a6274b305c7c1592ea57776f6036db830a068fb81e06fce2317314a->leave($__internal_cc7474140a6274b305c7c1592ea57776f6036db830a068fb81e06fce2317314a_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_dd00b0922c6053941aad5d05f4ff4129b7987e4852e33cf619dd188c3b8bf5f8 = $this->env->getExtension("native_profiler");
        $__internal_dd00b0922c6053941aad5d05f4ff4129b7987e4852e33cf619dd188c3b8bf5f8->enter($__internal_dd00b0922c6053941aad5d05f4ff4129b7987e4852e33cf619dd188c3b8bf5f8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_dd00b0922c6053941aad5d05f4ff4129b7987e4852e33cf619dd188c3b8bf5f8->leave($__internal_dd00b0922c6053941aad5d05f4ff4129b7987e4852e33cf619dd188c3b8bf5f8_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
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
