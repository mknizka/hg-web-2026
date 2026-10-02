# Ellipse premium web — art direction & UI fragment contract

This document is the shared contract for parallel design/code agents working on the 2026 Ellipse homepage.

## Non-negotiable visual rules

- Use real Ellipse product material as the source of truth. Do not invent fake PMS, booking, revPRO, POS or Team screens.
- Desktop/admin screenshots should normally be shown as focused fragments, crops or reconstructed micro-components, not as whole admin windows.
- Ellipse Team mobile screenshots are an exception: whole phone screens may stay visible because the native mobile UI itself is a product object.
- Reconstructed HTML/CSS components may use values and labels visible in real screenshots. Keep them faithful to the source.
- Magenta is an accent, not a page fill. Main palette is white / Ellipse navy / cool neutral blue-gray.
- Glass is a luxury accent only. Avoid glass on every card.
- No generic SaaS card wall. Every major section should have its own composition.
- Motion must explain relationships or hierarchy. Avoid decorative bouncing, excessive 3D and aggressive scroll effects.
- Respect prefers-reduced-motion and simplify motion on mobile.

## Source material

Google Drive source folder:
https://drive.google.com/drive/folders/1N04U3SoZnz8Lbwa40EeZ3IbMO15asa4i

Relevant source folders:
- PMS
- Web booking
- revPRO a revenue manazer
- Ellipse Team
- Ellipse POS
- Loga klientov - referencie
- Fotky klientov

## Real PMS facts currently used

Source: PMS daily overview screenshot from 22 Sep 2026.

Daily KPI strip:
- Úlohy / to-do: 9 (secondary value 23)
- Check-out: 5 (secondary value 5)
- Check-in: 3 (secondary value 3)
- Hostia: 0 (secondary value 6)
- Neuprataných: 34 (secondary value 1)

These values are examples from a real demo property screenshot, not marketing claims.

The tape-chart screenshot is also suitable for:
- date/occupancy strip
- room rows
- reservation blocks
- selected-reservation popover
- availability / direct booking relationship

Prefer a focused crop of one or two of these details instead of showing the full administration chrome.

## Real revPRO facts currently used

Source: Revenue analysis screenshot dated 21 Sep 2026.

Visible analysis facts:
- +202 room nights week-over-week
- +18 234 EUR revenue over an 18-month horizon
- 17 reservations created in the last 7 days
- average length 3.2 nights
- total value 5 579 EUR
- September 2026 occupancy 24.8%
- October 2026 occupancy 5.6%
- highest rate in new reservations: 640 EUR for a Premium double room

Visible example recommendation:
“Zaviesť cielený upsell wellness balíkov pri check-ine a cez SMS.”

Other visible recommendations include a street-food-week concept and dynamic late-checkout pricing.

Treat these as examples from one real analysis, not promises of typical commercial results.

## Ellipse Team

Keep real phone screenshots intact where possible.

It is acceptable to reconstruct small widgets around them when based on real product data or real lock-screen/app widgets. Examples:
- room-night mini chart
- team-on-duty count
- today tasks
- housekeeping status
- arrivals / departures summaries

These micro-widgets should be native HTML/CSS so they remain sharp and can move independently during scroll.

## Motion system

Motion should have three levels only:

1. Reveal — subtle opacity / 10–22 px vertical travel.
2. Depth — independent fragments may move approximately 5–20 px at different scroll rates.
3. Story focus — the relevant step/card can become slightly sharper / brighter while adjacent steps recede.

No continuous decorative motion is required for understanding the page.

Desktop pointer parallax is allowed only on large hero/product layers and should be extremely subtle.

## Responsive rules

Desktop:
- editorial asymmetry is preferred
- overlap is allowed
- focused crops can float as independent objects

Tablet:
- preserve composition but reduce overlap
- horizontal KPI strips may scroll

Mobile:
- do not shrink the desktop composition
- stack fragments intentionally
- disable parallax/rotation
- keep primary CTAs full width when needed
- preserve at least 18–20 px horizontal page padding
- no element may create horizontal page overflow

## Current branch/workstream hierarchy

- design/premium-homepage-v1 — base art direction, shell, hero, OS and premium section rhythm
- design/ui-fragments-v1 — focused real-UI fragments and Team micro-widgets
- motion/scroll-storytelling-v1 — restrained scroll storytelling/focus states
- qa/mobile-performance-v1 — mobile, performance, real-data component and final QA pass

Agents should build on the newest relevant branch, not rewrite the same concern independently.

## Quality bar

The intended feeling is a premium hospitality operating system, not a software feature catalogue.

A visitor should understand:
1. Ellipse is one connected operating system.
2. The product is real and already running in operations.
3. The interface and data feel calm, modern and understandable despite the product depth.
4. Every section has a reason to exist and a distinct visual moment.
