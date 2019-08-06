<?php

/* WebProfilerBundle:Profiler:toolbar_redirect.html.twig */
class __TwigTemplate_715244ab03350804f4320a85ca589d3cc1c903b34135be22d645b25ba30ecc17 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "WebProfilerBundle:Profiler:toolbar_redirect.html.twig", 1);
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
        $__internal_794274b2a5aab08411e27c30ec573b56fa7698939cfd258d0e207ddf2810ee6d = $this->env->getExtension("native_profiler");
        $__internal_794274b2a5aab08411e27c30ec573b56fa7698939cfd258d0e207ddf2810ee6d->enter($__internal_794274b2a5aab08411e27c30ec573b56fa7698939cfd258d0e207ddf2810ee6d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Profiler:toolbar_redirect.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_794274b2a5aab08411e27c30ec573b56fa7698939cfd258d0e207ddf2810ee6d->leave($__internal_794274b2a5aab08411e27c30ec573b56fa7698939cfd258d0e207ddf2810ee6d_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_aee5d3d468b7f419f87bc1d7d60cab8a4e9bd1609cda44f4e5ec193af670f313 = $this->env->getExtension("native_profiler");
        $__internal_aee5d3d468b7f419f87bc1d7d60cab8a4e9bd1609cda44f4e5ec193af670f313->enter($__internal_aee5d3d468b7f419f87bc1d7d60cab8a4e9bd1609cda44f4e5ec193af670f313_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Redirection Intercepted";
        
        $__internal_aee5d3d468b7f419f87bc1d7d60cab8a4e9bd1609cda44f4e5ec193af670f313->leave($__internal_aee5d3d468b7f419f87bc1d7d60cab8a4e9bd1609cda44f4e5ec193af670f313_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_0814dd9777bad1d15bce6354d2f01b0bae11ff4c01ba15c1a944fa6781d5d47a = $this->env->getExtension("native_profiler");
        $__internal_0814dd9777bad1d15bce6354d2f01b0bae11ff4c01ba15c1a944fa6781d5d47a->enter($__internal_0814dd9777bad1d15bce6354d2f01b0bae11ff4c01ba15c1a944fa6781d5d47a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

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
        
        $__internal_0814dd9777bad1d15bce6354d2f01b0bae11ff4c01ba15c1a944fa6781d5d47a->leave($__internal_0814dd9777bad1d15bce6354d2f01b0bae11ff4c01ba15c1a944fa6781d5d47a_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_redirect.html.twig";
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
