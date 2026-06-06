<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/carlhinton/templates/page--front.html.twig */
class __TwigTemplate_54d169b8c165939d9f8f7545b7e2a8e8 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 9
        echo "
<div class=\"ch-page ch-home-page page-wrapper\">

  <header class=\"ch-header site-header\" role=\"banner\">
    <div class=\"ch-header__inner\">

      <a class=\"ch-brand\" href=\"";
        // line 15
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("<front>"));
        echo "\" rel=\"home\">
        Carl Hinton
      </a>

      <nav class=\"ch-nav\" aria-label=\"Main navigation\">
        ";
        // line 20
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 20)) {
            // line 21
            echo "          ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
            echo "
        ";
        } else {
            // line 23
            echo "          <ul class=\"ch-nav__fallback\">
            <li><a href=\"";
            // line 24
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("<front>"));
            echo "\">Home</a></li>
            <li><a href=\"/articles\">Articles</a></li>
          </ul>
        ";
        }
        // line 28
        echo "      </nav>

    </div>
  </header>

  <div class=\"layout-main-wrapper ch-home-wrapper\">
    <div class=\"layout-main ch-home-layout-main\">

      ";
        // line 36
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 36)) {
            // line 37
            echo "        <div class=\"region region--highlighted ch-home-highlighted\">
          ";
            // line 38
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 38), 38, $this->source), "html", null, true);
            echo "
        </div>
      ";
        }
        // line 41
        echo "
      <main id=\"main-content\" class=\"main-content ch-home-main-content\" role=\"main\">

        <div class=\"ch-home-container\">

          ";
        // line 46
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_above", [], "any", false, false, true, 46)) {
            // line 47
            echo "            <div class=\"region region--content-above ch-home-content-above\">
              ";
            // line 48
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_above", [], "any", false, false, true, 48), 48, $this->source), "html", null, true);
            echo "
            </div>
          ";
        }
        // line 51
        echo "
          <div class=\"ch-home-grid\">

            <section class=\"ch-home-primary\">
              ";
        // line 55
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 55), 55, $this->source), "html", null, true);
        echo "
            </section>

            ";
        // line 58
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar", [], "any", false, false, true, 58)) {
            // line 59
            echo "              <aside class=\"ch-home-secondary\" role=\"complementary\">
                ";
            // line 60
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar", [], "any", false, false, true, 60), 60, $this->source), "html", null, true);
            echo "
              </aside>
            ";
        }
        // line 63
        echo "
          </div>

        </div>

      </main>

    </div>
  </div>

  ";
        // line 73
        if ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_top", [], "any", false, false, true, 73) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_bottom", [], "any", false, false, true, 73))) {
            // line 74
            echo "    <footer class=\"site-footer ch-footer\" role=\"contentinfo\">
      <div class=\"site-footer__inner\">
        ";
            // line 76
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_top", [], "any", false, false, true, 76), 76, $this->source), "html", null, true);
            echo "
        ";
            // line 77
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_bottom", [], "any", false, false, true, 77), 77, $this->source), "html", null, true);
            echo "
      </div>
    </footer>
  ";
        }
        // line 81
        echo "
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page"]);    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/custom/carlhinton/templates/page--front.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  164 => 81,  157 => 77,  153 => 76,  149 => 74,  147 => 73,  135 => 63,  129 => 60,  126 => 59,  124 => 58,  118 => 55,  112 => 51,  106 => 48,  103 => 47,  101 => 46,  94 => 41,  88 => 38,  85 => 37,  83 => 36,  73 => 28,  66 => 24,  63 => 23,  57 => 21,  55 => 20,  47 => 15,  39 => 9,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/carlhinton/templates/page--front.html.twig", "/var/www/carlhinton.com/themes/custom/carlhinton/templates/page--front.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 20);
        static $filters = array("escape" => 21);
        static $functions = array("path" => 15);

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                ['path']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
