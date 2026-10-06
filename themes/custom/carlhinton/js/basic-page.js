(function (Drupal, once) {
  'use strict';

  Drupal.behaviors.carlhintonBasicPage = {
    attach(context) {
      once('carlhinton-basic-page', 'body.page-node-type-page', context).forEach((body) => {
        const page = body.querySelector('.ch-basic-page');
        const hero = body.querySelector('.ch-basic-page-hero');
        const heroContent = body.querySelector('.ch-basic-page-hero__content');
        const article = body.querySelector('article.node--type-page');
        const bodyField = article ? article.querySelector('.field--name-body') : null;

        if (!page || !hero || !heroContent || !bodyField) {
          return;
        }

        /* --------------------------------------------------
           Identify top-level body elements only
        -------------------------------------------------- */
        const topLevel = Array.from(bodyField.children);

        /* --------------------------------------------------
           Helper functions
        -------------------------------------------------- */
        const isElement = (node, tag) =>
          node &&
          node.tagName &&
          node.tagName.toLowerCase() === tag.toLowerCase();

        const hasLink = (el) => !!el.querySelector('a');

        const textLength = (el) => (el.textContent || '').trim().length;

        const makeWrapper = (className, tag = 'div') => {
          const el = document.createElement(tag);
          el.className = className;
          return el;
        };

        const moveNodesInto = (nodes, wrapper, beforeNode = null) => {
          if (!nodes.length) {
            return wrapper;
          }
          bodyField.insertBefore(wrapper, beforeNode);
          nodes.forEach((node) => wrapper.appendChild(node));
          return wrapper;
        };

        /* --------------------------------------------------
           Hero intro extraction
           Rules:
           - first top-level H2 becomes the strapline
           - following intro paragraphs move into hero intro
           - stop on next H2/H3/UL/OL
        -------------------------------------------------- */
        const firstH2 = topLevel.find((el) => isElement(el, 'h2'));

        if (firstH2 && !heroContent.querySelector('.ch-basic-page-hero__strapline')) {
          firstH2.classList.add('ch-basic-page-hero__strapline');
          heroContent.appendChild(firstH2);

          const introNodes = [];
          let next = firstH2.nextElementSibling;

          while (next) {
            if (
              isElement(next, 'h2') ||
              isElement(next, 'h3') ||
              isElement(next, 'ul') ||
              isElement(next, 'ol')
            ) {
              break;
            }

            const current = next;
            next = next.nextElementSibling;

            if (isElement(current, 'p')) {
              introNodes.push(current);
            } else {
              break;
            }
          }

          if (introNodes.length) {
            const introWrap = makeWrapper('ch-basic-page-hero__intro');
            heroContent.appendChild(introWrap);
            introNodes.forEach((node) => introWrap.appendChild(node));
          }
        }

        /* --------------------------------------------------
           Detect a CTA paragraph near the top of the page
           If a paragraph contains a link and mentions "book",
           "contact", "schedule", or "audit", treat as hero CTA
        -------------------------------------------------- */
        const heroCandidateParagraphs = Array.from(
          heroContent.querySelectorAll('p')
        );

        heroCandidateParagraphs.forEach((p) => {
          const txt = (p.textContent || '').toLowerCase();
          if (
            hasLink(p) &&
            (
              txt.includes('book') ||
              txt.includes('contact') ||
              txt.includes('schedule') ||
              txt.includes('audit') ||
              txt.includes('health check')
            ) &&
            !heroContent.querySelector('.ch-basic-page-hero__cta')
          ) {
            const ctaWrap = makeWrapper('ch-basic-page-hero__cta');
            heroContent.appendChild(ctaWrap);
            ctaWrap.appendChild(p);
          }
        });

        /* --------------------------------------------------
           Group H3 sections into cards
           Each H3 plus following paragraphs/lists until next H3/H2
        -------------------------------------------------- */
        const remainingChildren = Array.from(bodyField.children);

        const h3s = remainingChildren.filter((el) => isElement(el, 'h3'));

        if (h3s.length >= 2 && !bodyField.querySelector('.ch-basic-page-section-grid')) {
          const sectionGrid = makeWrapper('ch-basic-page-section-grid');

          // insert the grid before the first H3 still in the body
          bodyField.insertBefore(sectionGrid, h3s[0]);

          h3s.forEach((heading) => {
            // heading may already have moved
            if (!heading.parentElement || heading.parentElement !== bodyField) {
              return;
            }

            const card = makeWrapper('ch-basic-page-section-card');
            sectionGrid.appendChild(card);
            card.appendChild(heading);

            let next = heading.nextElementSibling;
            while (next) {
              if (isElement(next, 'h3') || isElement(next, 'h2')) {
                break;
              }

              const current = next;
              next = next.nextElementSibling;
              card.appendChild(current);
            }
          });
        }

        /* --------------------------------------------------
           Turn grouped cards after “What I Do”, “Why Work With Me”,
           “My Approach”, etc. into stronger layout hooks
        -------------------------------------------------- */
        const sectionCards = bodyField.querySelectorAll('.ch-basic-page-section-card');

        sectionCards.forEach((card) => {
          const heading = card.querySelector('h3');
          if (!heading) {
            return;
          }

          const txt = heading.textContent.trim().toLowerCase();

          if (
            txt.includes('hosting architecture') ||
            txt.includes('security, monitoring') ||
            txt.includes('scalability') ||
            txt.includes('team enablement')
          ) {
            card.classList.add('ch-basic-page-section-card--service');
          }

          if (
            txt.includes('discover') ||
            txt.includes('plan') ||
            txt.includes('build') ||
            txt.includes('guide') ||
            txt.includes('sustain')
          ) {
            card.classList.add('ch-basic-page-section-card--step');
          }

          if (
            txt.includes('technical excellence') ||
            txt.includes('strategist') ||
            txt.includes('experience leading') ||
            txt.includes('partner who cares')
          ) {
            card.classList.add('ch-basic-page-section-card--value');
          }
        });

        /* --------------------------------------------------
           Build a CTA panel from the final 1–3 paragraphs if they
           contain strong text and/or links
        -------------------------------------------------- */
        const currentChildren = Array.from(bodyField.children);
        const tail = currentChildren.slice(-4);

        const ctaCandidates = tail.filter((el) => {
          if (!isElement(el, 'p')) {
            return false;
          }
          const txt = (el.textContent || '').toLowerCase();
          return (
            hasLink(el) ||
            txt.includes('ready to') ||
            txt.includes('contact') ||
            txt.includes('schedule') ||
            txt.includes('audit')
          );
        });

        if (ctaCandidates.length >= 1 && !bodyField.querySelector('.ch-basic-page-cta-panel')) {
          const ctaPanel = makeWrapper('ch-basic-page-cta-panel');

          const firstCandidate = ctaCandidates[0];
          bodyField.insertBefore(ctaPanel, firstCandidate);

          ctaCandidates.forEach((node) => ctaPanel.appendChild(node));
        }

        /* --------------------------------------------------
           Add page-level modifier classes based on body content
        -------------------------------------------------- */
        const bodyText = (bodyField.textContent || '').toLowerCase();

        if (
          bodyText.includes('hosting') ||
          bodyText.includes('infrastructure') ||
          bodyText.includes('aws') ||
          bodyText.includes('server')
        ) {
          page.classList.add('ch-basic-page--tech');
        }

        if (
          bodyText.includes('education') ||
          bodyText.includes('course') ||
          bodyText.includes('training')
        ) {
          page.classList.add('ch-basic-page--education');
        }

        if (
          bodyText.includes('recruiter') ||
          bodyText.includes('employment') ||
          bodyText.includes('career')
        ) {
          page.classList.add('ch-basic-page--career');
        }

        /* --------------------------------------------------
           Clean up empty paragraphs
        -------------------------------------------------- */
        Array.from(bodyField.querySelectorAll('p')).forEach((p) => {
          if ((p.textContent || '').trim() === '' && !p.querySelector('img, iframe, video')) {
            p.remove();
          }
        });
      });
    }
  };
})(Drupal, once);
