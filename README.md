# hg-web-2026

Verejny repozitar obsahuje **iba webove sablony** Ellipse / Horeca Group.

**GitHub:** https://github.com/mknizka/hg-web-2026

## Obsah

```
template/
  ellipse/           — hlavna marketingova sablona (n.horecagroup.sk)
  hg-base-theme/
  hg-onepage-theme/
  css/, js/, ...
```

Zvysok aplikacie (PHP backend, manager, moduly, config) nie je sucastou tohto repozitara.

## Poznamka k videu

Subor `template/ellipse/video/manager-dashboard.mp4` (~163 MB) nie je v gite kvoli limitu GitHubu (100 MB).
Na produkcii zostava na serveri v `n.horecagroup.sk/template/`.

## Aktualizacia z produkcie

```bash
rsync -a /var/www/vhosts/horecagroup.sk/n.horecagroup.sk/template/ \
         /var/www/vhosts/horecagroup.sk/ellipse-web/template/
cd /var/www/vhosts/horecagroup.sk/ellipse-web
git -c safe.directory=$(pwd) add -A
git -c safe.directory=$(pwd) commit -m "Update templates"
git -c safe.directory=$(pwd) push
```
