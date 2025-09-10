<?php
$pageTitle = "Conditions Générales de Vente - GPX PC";
$pageDescription = "Conditions Générales de Vente des services de montage et réparation d'ordinateurs proposés par GPX PC.";
include 'header.php';
?>

<main class="container mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold mb-8">Conditions Générales de Vente</h1>

    <div class="prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300">

        <?php
        // Tableau des sections CGV pour éviter les répétitions
        $sections = [
            "1. Généralités" => [
                "Les présentes Conditions Générales de Vente (CGV) s'appliquent à toutes les ventes de produits et services (montage, réparation, optimisation de PC) réalisées par la micro-entreprise GPX PC, représentée par M. Baptiste Soupy, 27 rue du berceau, 13005 Marseille.",
                "Toute commande passée sur le site ou par e-mail implique l'adhésion pleine et entière du client aux présentes CGV. GPX PC se réserve le droit de modifier ces CGV à tout moment."
            ],
            "2. Devis et Commandes" => [
                "Les services et produits proposés par GPX PC font l'objet d'un devis personnalisé et gratuit. Ce devis est valable pendant 30 jours à compter de sa date d'émission. L'acceptation du devis par le client, formalisée par une réponse par e-mail, constitue une commande ferme et définitive.",
                "La commande ne sera considérée comme validée qu'après réception de l'intégralité du paiement, comme spécifié dans le devis."
            ],
            "3. Paiement" => [
                "Le paiement s'effectue par virement bancaire sur le compte de l'entreprise GPX PC. Les informations bancaires (IBAN) seront transmises au client par e-mail après acceptation du devis. L'achat des composants pour le montage du PC ne sera effectué qu'après la réception des fonds."
            ],
            "4. Livraison et Réception" => [
                "Les délais de livraison ou de mise à disposition sont indiqués dans le devis et sont donnés à titre indicatif. GPX PC s'engage à faire ses meilleurs efforts pour respecter les délais convenus. En cas de retard imprévu (rupture de stock de composants, problèmes de transport, etc.), le client sera immédiatement informé.",
                "Le mode de livraison s'effectue au choix du client :",
                "<ul>
                    <li>Retrait sur place : Le client peut venir récupérer son PC directement à l'adresse de l'entreprise à Marseille. Une date et une heure de rendez-vous seront convenues par e-mail.</li>
                    <li>Livraison par transporteur : La livraison se fera par un transporteur externe. Les frais de livraison sont à la charge du client et seront inclus dans le devis. Les transporteurs possibles sont Chronopost, UPC, Mondial Relay.</li>
                </ul>",
                "À la réception du colis, le client est tenu de vérifier l'état du produit en présence du livreur. En cas de dommage, il doit refuser le colis et émettre des réserves claires et précises sur le bon de livraison."
            ],
            "5. Droit de Rétractation" => [
                "Conformément à l'article L.221-28 du Code de la consommation, le droit de rétractation ne peut être exercé pour les biens confectionnés selon les spécifications du consommateur ou nettement personnalisés. Dans le cas d'un PC sur-mesure, il n'existe donc pas de droit de rétractation.",
                "Pour les services de réparation ou d'optimisation, un droit de rétractation de 14 jours s'applique à compter de la conclusion du contrat, à condition que l'exécution du service n'ait pas commencé."
            ],
            "6. Garantie" => [
                "Tous les PC assemblés par GPX PC bénéficient d'une garantie de 2 ans sur les composants matériels, conformément aux garanties constructeur (Amazon, LDLC, Grosbill, etc.). La garantie couvre les défauts de fabrication et les pannes matérielles. Elle ne s'applique pas aux dommages causés par une mauvaise utilisation, un accident, une modification non autorisée ou l'usure normale.",
                "En cas de problème, le client doit contacter GPX PC par e-mail. Le retour du produit pour réparation sous garantie sera à la charge du client."
            ],
            "7. Responsabilité" => [
                "GPX PC ne saurait être tenu pour responsable des dommages indirects, y compris les pertes de données, subis par le client lors de la réparation, de la maintenance ou du montage d'un PC. Il est de la responsabilité du client de sauvegarder ses données avant de confier son appareil."
            ],
            "8. Règlement des litiges" => [
                "En cas de litige, une solution amiable sera recherchée. À défaut, les tribunaux compétents de Marseille seront saisis."
            ]
        ];

        // Boucle pour afficher les sections
        foreach ($sections as $title => $paragraphs) {
            echo "<h2 class='text-2xl font-semibold mt-6 mb-2'>{$title}</h2>";
            foreach ($paragraphs as $p) {
                // Afficher le contenu des paragraphes.
                // Le contenu est déjà du HTML pour la liste, donc on vérifie si c'est une liste.
                if (strpos(trim($p), '<ul>') === 0) {
                    echo $p;
                } else {
                    echo "<p>{$p}</p>";
                }
            }
        }
        ?>

    </div>
</main>

<?php include 'footer.php'; ?>