-- =====================================================
-- Yoast SEOデータ 本番→dev 移行SQL
-- dev DB: wp_efp6h / prefix: 68dXpO8Q_
-- =====================================================

-- Step1: 既存Yoastデータをクリア（重複防止）
DELETE FROM `68dXpO8Q_postmeta`
WHERE meta_key IN ('_yoast_wpseo_title', '_yoast_wpseo_metadesc', '_yoast_wpseo_focuskw');

-- Step2: 本番データをスラッグマッチングで一括INSERT
--        スラッグが一致しないページは自動スキップ
INSERT INTO `68dXpO8Q_postmeta` (post_id, meta_key, meta_value)
SELECT p.ID, d.mk, d.mv
FROM (
    -- トップページ
    SELECT '%e3%83%88%e3%83%83%e3%83%97%e3%83%9a%e3%83%bc%e3%82%b8' AS sl, 'page' AS pt, '_yoast_wpseo_metadesc' AS mk, '長野・長野市の花屋 ヌボー生花店です。長野市内の５店舗以外にも、オンラインや電話でもご購入いただけます。花束や観葉植物のフラワーギフトの他、カフェレストラン、室内緑化、ウエディング（婚礼）装飾、葬儀・祭壇花まで、お花のことならお気軽にご相談ください。' AS mv
    UNION ALL SELECT '%e3%83%88%e3%83%83%e3%83%97%e3%83%9a%e3%83%bc%e3%82%b8', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%page%% %%title%%'
    -- aboutus
    UNION ALL SELECT 'aboutus', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の紹介ページです。ヌボー生花店だからこそできること、日常の中に１輪のお花があるだけでHappyになれると信じています。このページでは社長からのメッセージ、こだわり、スタッフ紹介、会社概要をご紹介いたします。'
    UNION ALL SELECT 'aboutus', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%page%% %%title%%'
    -- arrangement
    UNION ALL SELECT 'arrangement', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「アレンジメント」のページです。ご用途やご予算に応じて、旬のお花を使いながらお客様の想いを形にするフラワーギフトをお作り致します。一人ひとりのお客様に合わせたデザインを心がけています。'
    UNION ALL SELECT 'arrangement', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%parent_title%% > %%page%% %%title%%'
    -- bouquet
    UNION ALL SELECT 'bouquet', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「花束」のページです。贈られる相手、贈られる方、双方の好みやシュチュエーションなどを考慮し、お客様の想いをカタチにするフラワーギフトをご提供いたします。更にヌボー生花店は徹底的にお花の鮮度にこだわります。'
    UNION ALL SELECT 'bouquet', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%parent_title%% > %%page%% %%title%%'
    -- company
    UNION ALL SELECT 'company', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「会社概要」のページです。会社概要や沿革をご紹介いたします。'
    UNION ALL SELECT 'company', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%page%% %%title%%'
    -- complete
    UNION ALL SELECT 'complete', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「お問い合わせ完了」ページです。'
    UNION ALL SELECT 'complete', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%page%% %%title%%'
    -- confirm
    UNION ALL SELECT 'confirm', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「お問い合わせ確認」ページです。'
    UNION ALL SELECT 'confirm', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%page%% %%title%%'
    -- contact
    UNION ALL SELECT 'contact', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「お問い合わせ」ページです。できるだけ早いご回答を心がけています。どうぞお気軽にお問い合わせください。'
    UNION ALL SELECT 'contact', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%page%% %%title%%'
    -- funeral（重複あり→後者を採用）
    UNION ALL SELECT 'funeral', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「葬儀・祭壇花」のページです。残されたご家族の思い、故人が愛した風景など、参列された皆様の心に故人との思い出がいつまでも残るようお花に想いを託して、数多くの実績で経験豊富なスタッフがコーディネートいたします。'
    UNION ALL SELECT 'funeral', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%page%% %%title%%'
    -- gift
    UNION ALL SELECT 'gift', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「生花ギフト」のページです。お花を主役とするのではなく、お客様の「想い」を大切に、様々な贈答・プレゼントのシーンに合わせたフラワーギフトをご提供いたします。'
    UNION ALL SELECT 'gift', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%page%% %%title%%'
    -- nubow-aile（本番の honten → devの nubow-aile にリマップ）
    UNION ALL SELECT 'nubow-aile', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「店舗詳細・本店のページです。営業時間や電話番号・交通アクセスをご覧いただけます。'
    UNION ALL SELECT 'nubow-aile', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%page%% %%title%%'
    -- indoor-greening
    UNION ALL SELECT 'indoor-greening', 'page', '_yoast_wpseo_focuskw', '%%sitename%% %%sep%% %%page%% %%title%%'
    UNION ALL SELECT 'indoor-greening', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「室内緑化」のページです。ストレス社会である現代だからこそ、植物が持つ力を最大限活用していただけるよう、空間を企画・提案・コーディネートさせていただきます。'
    UNION ALL SELECT 'indoor-greening', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%page%% %%title%%'
    -- message
    UNION ALL SELECT 'message', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「社長メッセージ」のページです。代表取締役 山崎年起のヌボー生花店への思いや、セミナー・講演実績をご紹介いたします。'
    UNION ALL SELECT 'message', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%page%% %%title%%'
    -- nubow-adorer（本番の nagano-minami → devの nubow-adorer にリマップ）
    UNION ALL SELECT 'nubow-adorer', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「店舗詳細・長野南バイパス店のページです。営業時間や電話番号・交通アクセスをご覧いただけます。'
    UNION ALL SELECT 'nubow-adorer', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%page%% %%title%%'
    -- news
    UNION ALL SELECT 'news', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「お知らせ」ページです。営業日やメディア掲載・出演などの最新情報をご覧いただけます。'
    UNION ALL SELECT 'news', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%page%% %%title%%'
    -- nubow-larbre
    UNION ALL SELECT 'nubow-larbre', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「店舗詳細・Nubow × L\'arbre（ヌボー×ラルブル）」のページです。営業時間や電話番号・交通アクセスをご覧いただけます。'
    UNION ALL SELECT 'nubow-larbre', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%page%% %%title%%'
    -- phalaenopsis
    UNION ALL SELECT 'phalaenopsis', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「胡蝶蘭」のページです。開店・就任等お祝い事には欠かせず、急に必要になることも多いことでしょう。ヌボー生花店はいつでもスピーディーに対応出来るよう、長野市内でトップクラスの在庫数を誇ります。'
    UNION ALL SELECT 'phalaenopsis', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%parent_title%% > %%page%% %%title%%'
    -- plant
    UNION ALL SELECT 'plant', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「観葉植物」のページです。観葉植物の産地をくまなく周り、寒い長野のまちでも通年気軽に楽しめる観葉植物を調査し、調達しています。そのお店や環境にあわせて、何十種類もの在庫から最も合う観葉植物をコーディネートさせていただきます。'
    UNION ALL SELECT 'plant', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%parent_title%% > %%page%% %%title%%'
    -- privacy-policy
    UNION ALL SELECT 'privacy-policy', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「プライバシーポリシー」のページです。'
    UNION ALL SELECT 'privacy-policy', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%page%% %%title%%'
    -- service
    UNION ALL SELECT 'service', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「サービス紹介」のページです。誕生日・記念日・冠婚葬祭。様々な節目の場面で登場するお花。そのシーンをより感動的な場面にするお手伝いをするのが私たちの役目です。'
    UNION ALL SELECT 'service', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%page%% %%title%%'
    -- shop
    UNION ALL SELECT 'shop', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「店舗一覧」のページです。各店舗の営業時間や電話番号・所在地をご覧いただけます。'
    UNION ALL SELECT 'shop', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%page%% %%title%%'
    -- sitemap
    UNION ALL SELECT 'sitemap', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「サイトマップ」のページです。'
    UNION ALL SELECT 'sitemap', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%page%% %%title%%'
    -- staff
    UNION ALL SELECT 'staff', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「スタッフ紹介」のページです。顔の見える、温かみのあるお店づくり、接客を心がけています。'
    UNION ALL SELECT 'staff', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%page%% %%title%%'
    -- stand-celebration
    UNION ALL SELECT 'stand-celebration', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「お祝いスタンド花」のページです。長野市内を常に配送車が走る回るヌボー生花店だからこそ、お店や会場の雰囲気や条件を把握し、ボリューム重視からデザイン性重視まで、その空間に合わせたの祝スタンド花のデザインをご提案いたします。'
    UNION ALL SELECT 'stand-celebration', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%parent_title%% > %%page%% %%title%%'
    -- stand-funeral
    UNION ALL SELECT 'stand-funeral', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「ご葬儀スタンド花」のページです。葬儀場との面倒なやりとりは、わたしたちにお任せください。葬儀場への連絡からお花の製作・配達手配まですべて、責任を持って行わせていただきます。電話一本で安心な花贈りを目指しています。'
    UNION ALL SELECT 'stand-funeral', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%parent_title%% > %%page%% %%title%%'
    -- wedding
    UNION ALL SELECT 'wedding', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「ウェディング」のページです。私達はお二人の好みに合わせ、納得いくまで一緒に考え、ご提案いたします。記憶に残る結婚式をしたい！ゲストにとっても楽しい時間を作りあげたい！そんな新郎新婦の想いを込めて、コーディネートいたします。'
    UNION ALL SELECT 'wedding', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%page%% %%title%%'
    -- wedding-bouquet
    UNION ALL SELECT 'wedding-bouquet', 'page', '_yoast_wpseo_metadesc', '長野の花屋 ヌボー生花店の「ウェディングブーケ」のページです。新婦様の好みにあわせ、最新のデザインで一生の思い出に残るブーケを、１つ１つ想いを込めてお作りいたします。'
    UNION ALL SELECT 'wedding-bouquet', 'page', '_yoast_wpseo_title', '%%sitename%% %%sep%% %%parent_title%% > %%page%% %%title%%'
) AS d
INNER JOIN `68dXpO8Q_posts` p
    ON p.post_name = d.sl
    AND p.post_type = d.pt
    AND p.post_status = 'publish';

-- =====================================================
-- 確認用：インポートされた件数を確認
-- =====================================================
SELECT COUNT(*) AS inserted_count
FROM `68dXpO8Q_postmeta`
WHERE meta_key IN ('_yoast_wpseo_title', '_yoast_wpseo_metadesc', '_yoast_wpseo_focuskw');
