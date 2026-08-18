# WordPress E-commerce

Projet de site e-commerce basé sur **WordPress** + **WooCommerce**, avec un thème custom (`boutique-theme`) intégrant le support WooCommerce (catalogue, panier, fiche produit).

## Stack

- WordPress (core géré via Composer)
- WooCommerce (plugin e-commerce)
- Thème custom `boutique-theme`
- Gestion des dépendances via [WPackagist](https://wpackagist.org/) + Composer

## Structure

```
wordpress/
├── composer.json              # WordPress core + plugins (WooCommerce, Yoast SEO, WP Mail SMTP)
├── wp-config-sample.php        # Modèle de config à copier en wp-config.php
└── wp-content/
    ├── plugins/                 # Plugins installés via composer (WooCommerce, etc.)
    └── themes/
        └── boutique-theme/
            ├── style.css        # En-tête du thème + styles WooCommerce
            ├── functions.php    # Setup thème + intégration WooCommerce
            ├── header.php
            ├── footer.php
            ├── index.php
            ├── front-page.php   # Page d'accueil avec produits mis en avant
            ├── woocommerce.php  # Template racine requis par WooCommerce
            ├── woocommerce/     # Overrides de templates WooCommerce (surcharge de plugins/woocommerce/templates)
            └── assets/
```

## Installation

1. Cloner le dépôt
   ```bash
   git clone https://github.com/BAMBA-FALL/wordpress.git
   cd wordpress
   ```

2. Installer WordPress + les plugins via Composer (WordPress core, WooCommerce, etc. ne sont pas versionnés dans le dépôt, ils sont téléchargés ici)
   ```bash
   composer install
   ```

3. Créer une base de données MySQL/MariaDB, puis copier la config
   ```bash
   cp wp-config-sample.php wp-config.php
   ```
   Renseigner `DB_NAME`, `DB_USER`, `DB_PASSWORD` et générer les clés de sécurité sur https://api.wordpress.org/secret-key/1.1/salt/

4. Terminer l'installation via l'assistant WordPress (`/wp-admin/install.php`), puis activer :
   - le thème **Boutique Theme**
   - le plugin **WooCommerce** (assistant de configuration boutique : devise, paiement, expédition)

## Fonctionnalités du thème

- Support WooCommerce complet (galerie produit, zoom, slider)
- Catalogue en 3 colonnes / 12 produits par page (personnalisable dans `functions.php`)
- Icône panier avec compteur dans le header
- Page d'accueil avec mise en avant des produits (`[products]`)
- Zone de widgets en pied de page

## Licence

MIT
