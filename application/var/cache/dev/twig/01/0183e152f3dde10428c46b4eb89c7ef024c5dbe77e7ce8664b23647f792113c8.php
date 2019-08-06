<?php

/* @WebProfiler/Profiler/toolbar_redirect.html.twig */
class __TwigTemplate_4a1a43e3a7c17f21531f2fa91a442cd1dd7905bb2b8865cf568025faf723f028 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@WebProfiler/Profiler/toolbar_redirect.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_8047a2cf479c45d4df96ae20405798280bed405e8d1413fe89a5358d6896d3cb = $this->env->getExtension("native_profiler");
        $__internal_8047a2cf479c45d4df96ae20405798280bed405e8d1413fe89a5358d6896d3cb->enter($__internal_8047a2cf479c45d4df96ae20405798280bed405e8d1413fe89a5358d6896d3cb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Profiler/toolbar_redirect.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_8047a2cf479c45d4df96ae20405798280bed405e8d1413fe89a5358d6896d3cb->leave($__internal_8047a2cf479c45d4df96ae20405798280bed405e8d1413fe89a5358d6896d3cb_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_f866e7552a7971afdfa6081f2eb85a867d30f33e2937cb6f49b8990d0b183287 = $this->env->getExtension("native_profiler");
        $__internal_f866e7552a7971afdfa6081f2eb85a867d30f33e2937cb6f49b8990d0b183287->enter($__internal_f866e7552a7971afdfa6081f2eb85a867d30f33e2937cb6f49b8990d0b183287_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Redirection Intercepted";
        
        $__internal_f866e7552a7971afdfa6081f2eb85a867d30f33e2937cb6f49b8990d0b183287->leave($__internal_f866e7552a7971afdfa6081f2eb85a867d30f33e2937cb6f49b8990d0b183287_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_886c4be1bb4e9a4c27f27aad1b6946757b702ece38bb8e8d99647c87fc17ce62 = $this->env->getExtension("native_profiler");
        $__internal_886c4be1bb4e9a4c27f27aad1b6946757b702ece38bb8e8d99647c87fc17ce62->enter($__internal_886c4be1bb4e9a4c27f27aad1b6946757b702ece38bb8e8d99647c87fc17ce62_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <div class=\"sf-reset\">
        <div class=\"block-exception\">
            <h1>This request redirects to <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["location"]) ? $context["location"] : $this->getContext($context, "location")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["location"]) ? $context["location"] : $this->getContext($context, "location")), "html", null, true);
        echo "</a>.</h1>

            <p>
                <small>
                    The redirect was intercepted by the web debug toolbar to help debugging.
                    For more information, see the \"intercept-redirects\" option of the Profiler.
                </small>
            </p>
        </div>
    </div>
";
        
        $__internal_886c4be1bb4e9a4c27f27aad1b6946757b702ece38bb8e8d99647c87fc17ce62->leave($__internal_886c4be1bb4e9a4c27f27aad1b6946757b702ece38bb8e8d99647c87fc17ce62_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/toolbar_redirect.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 8,  53 => 6,  47 => 5,  35 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block title 'Redirection Intercepted' %}*/
/* */
/* {% block body %}*/
/*     <div class="sf-reset">*/
/*         <div class="block-exception">*/
/*             <h1>This request redirects to <a href="{{ location }}">{{ location }}</a>.</h1>*/
/* */
/*             <p>*/
/*                 <small>*/
/*                     The redirect was intercepted by the web debug toolbar to help debugging.*/
/*                     For more information, see the "intercept-redirects" option of the Profiler.*/
/*                 </small>*/
/*             </p>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
