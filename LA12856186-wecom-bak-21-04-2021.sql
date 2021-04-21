-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: mysql150.phy.lolipop.lan
-- Generation Time: Apr 21, 2021 at 04:59 PM
-- Server version: 5.6.23-log
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `LA12856186-wecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `branchs`
--

CREATE TABLE IF NOT EXISTS `branchs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `excerpt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `catalogue` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `branchs`
--

INSERT INTO `branchs` (`id`, `title`, `excerpt`, `content`, `catalogue`, `image`, `banner`, `description`, `created_at`, `updated_at`) VALUES
(1, 'we homes', NULL, NULL, NULL, '/images/banner_02.jpg', '/images/homes_banner.jpg', 'WE HOMES', NULL, '2021-04-20 15:16:31'),
(2, 'we rentacar', NULL, NULL, NULL, '/upload/images/%E5%90%8D%E7%A7%B0%E6%9C%AA%E8%A8%AD%E5%AE%9A-17.jpg', '/upload/images/werentacar.jpg', 'we rentacar', NULL, '2021-04-20 15:16:49'),
(3, 'we job', NULL, NULL, NULL, '/upload/images/%E5%90%8D%E7%A7%B0%E6%9C%AA%E8%A8%AD%E5%AE%9A-18.jpg', '/upload/images/station_oshiage_img.jpg', 'WE JOB', NULL, '2021-04-20 15:16:11'),
(4, 'we music', NULL, NULL, NULL, '/upload/images/%E5%90%8D%E7%A7%B0%E6%9C%AA%E8%A8%AD%E5%AE%9A-16.jpg', '/upload/images/wemusic.jpg', 'WE MUSIC', NULL, '2021-04-20 15:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `read` int(11) NOT NULL DEFAULT '0',
  `job_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `foreign` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=76 ;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `url`, `type`, `foreign`, `created_at`, `updated_at`) VALUES
(23, '/upload/images/home/asian02.jpg', 2, 21, NULL, NULL),
(24, '/upload/images/home/asian03.jpg', 2, 21, NULL, NULL),
(25, '/upload/images/home/asian04.jpeg', 2, 21, NULL, NULL),
(26, '/upload/images/home/asian05.png', 2, 21, NULL, NULL),
(27, '/upload/images/home/challenge49_top01_2.jpeg', 2, 21, NULL, NULL),
(28, '/upload/images/%E7%A4%BE%E5%86%853.jpg', 2, 2, NULL, NULL),
(29, '/upload/images/%E7%A4%BE%E5%86%854.jpg', 2, 2, NULL, NULL),
(35, '/upload/images/%E8%A1%8C%E5%8B%952.jpg', 2, 3, NULL, NULL),
(36, '/upload/images/%E8%A1%8C%E5%8B%951.jpg', 2, 3, NULL, NULL),
(41, '/upload/images/a3%E4%BC%81%E6%A5%AD%E7%90%86%E5%BF%B5.jpg', 2, 4, NULL, NULL),
(42, '/upload/images/a4%E4%BC%81%E6%A5%AD%E7%90%86%E5%BF%B5.jpg', 2, 4, NULL, NULL),
(43, '/upload/images/a3%E3%83%92%E3%82%99%E3%82%B7%E3%82%99%E3%83%A7%E3%83%B3.jpg', 2, 5, NULL, NULL),
(44, '/upload/images/a4%E3%83%92%E3%82%99%E3%82%B7%E3%82%99%E3%83%A7%E3%83%B3.jpg', 2, 5, NULL, NULL),
(45, '/upload/images/a3%E3%82%A4%E3%83%B3%E3%83%88%E3%83%A9%E3%83%B3.jpg', 2, 6, NULL, NULL),
(46, '/upload/images/a4%E3%82%A4%E3%83%B3%E3%83%88%E3%83%A9%E3%83%B3.jpg', 2, 6, NULL, NULL),
(50, '/upload/images/home3a.jpg', 2, 9, NULL, NULL),
(51, '/upload/images/home4a.jpg', 2, 9, NULL, NULL),
(52, '/upload/images/a3.jpg', 2, 10, NULL, NULL),
(53, '/upload/images/a4.jpg', 2, 10, NULL, NULL),
(54, '/upload/images/a3.jpg', 2, 11, NULL, NULL),
(58, '/upload/images/a2(3).jpg', 2, 13, NULL, NULL),
(59, '/upload/images/a3(1).jpg', 2, 13, NULL, NULL),
(60, '/upload/images/a4(1).jpg', 2, 13, NULL, NULL),
(61, '/upload/images/a2(4).jpg', 2, 14, NULL, NULL),
(62, '/upload/images/a3(2).jpg', 2, 14, NULL, NULL),
(63, '/upload/images/a4(2).jpg', 2, 14, NULL, NULL),
(64, '/upload/images/a2(5).jpg', 2, 15, NULL, NULL),
(65, '/upload/images/a3(4).jpg', 2, 15, NULL, NULL),
(66, '/upload/images/a4(3).jpg', 2, 15, NULL, NULL),
(67, '/upload/images/a2(6).jpg', 2, 16, NULL, NULL),
(68, '/upload/images/a3(5).jpg', 2, 16, NULL, NULL),
(69, '/upload/images/a4(4).jpg', 2, 16, NULL, NULL),
(73, '/upload/images/a2(7).jpg', 2, 17, NULL, NULL),
(74, '/upload/images/a3(6).jpg', 2, 17, NULL, NULL),
(75, '/upload/images/a4(5).jpg', 2, 17, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_contacts_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_08_19_000001_create_branchs', 1),
(5, '2020_09_14_010535_create_posts', 1),
(6, '2020_09_14_010607_create_tags', 1),
(7, '2020_09_14_010638_create_post_tag_actives', 1),
(8, '2020_09_14_010745_create_options', 1);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `value_text` text COLLATE utf8_unicode_ci,
  `value_html` text COLLATE utf8_unicode_ci,
  `language` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `key`, `type`, `value_text`, `value_html`, `language`, `created_at`, `updated_at`) VALUES
(1, 'footer-title', 1, '', NULL, 'jp', NULL, NULL),
(2, 'description-footer', 1, '', NULL, 'jp', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `excerpt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catalogue` text COLLATE utf8_unicode_ci,
  `text_catalogue` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `text_content` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_long` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `public` int(11) NOT NULL DEFAULT '1',
  `description` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `branch_id`, `user_id`, `title`, `excerpt`, `catalogue`, `text_catalogue`, `content`, `text_content`, `image`, `image_long`, `type`, `public`, `description`, `created_at`, `updated_at`, `image_content`) VALUES
(1, 1, 1, '代表メッセージ', 'excerpt 日本茶の基礎を学んでみよう！', NULL, NULL, '<p>個人の成長＝会社の成長と実感できることが何よりも大切</p>\r\n\r\n<p>当社は、2018年3月に設立いたしました。</p>\r\n\r\n<p>創業より行っているコンサル事業を始め、ソフトウェア検証事業、システム開発支援事業を展開し基盤となる人材、組織を築き上げ、今日まで着実に成長を遂げてまいりました。この成長の大きな要因は創業時より大切にしてきた3つのキーワードにあると思っております。</p>\r\n\r\n<p>そのキーワードは「チーム」、「会社組織」、「スキルアップ」。</p>\r\n\r\n<p>会社の成長を支えているのは、『Crew』です。多くの会社は事業の成長を主眼としますが、WE・COMPANYでは『人の成長』に重点を置いた経営をしています。社員ひとり一人のキャリア形成によって成長していく会社なのです。企業理念にも、この想いを込めています。個人がスキルアップし、能力を最大限に発揮できる環境であれば、お互いに高め合い、より強いチーム、会社組織となれるでしょう。会社のビジョンや経営理念をはじめ、同じ方向性の人が集まってきているので、仕事をしやすいと思います。</p>\r\n\r\n<p>そんなWE・COMPANYで働く仲間の「目標や夢の実現」を目指し、WE・COMPANYに関わる全ての人を笑顔にできる会社でありたい、そしてWE・COMPANYメンバーにもいつも笑顔でいてほしいと願っております。</p>\r\n\r\n<p>「みんなの目標や夢が実現する組織を構築する。」 「人の可能性と成長を最大化し、世界へ新たな価値を提供する。」</p>\r\n\r\n<p>この経営理念・企業理念とともに、【Crew】一人ひとりの力と企業としての力とを併せ、日本そして世界で大きく飛躍し、世界中の人々を笑顔にできる企業へと、今後も進化を続けてまいります。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align: right;"><strong>株式会社WE・COMPANY</strong></p>\r\n\r\n<p style="text-align: right;"><strong>代表取締役　　長谷川　美佳</strong></p>', NULL, '/upload/images/a1%20copy.jpg', '/upload/images/a1%20copy.jpg', 1, 1, 'description 日本茶の基礎を学んでみよう！', '2021-04-18 17:57:44', '2021-04-19 22:51:56', NULL),
(2, 1, 1, '社内環境', 'excerpt 日本茶の基礎を学んでみよう！', NULL, NULL, '<p>ワークフロアは、明るく風通しのよい環境を意識して設計しました。実際に働くスタッフの様子やフロアの雰囲気を見てみたいという声に、対応できるよう、全面グリーン張りのクリアな仕様になっています。中はフリーアドレスとなっており、スタッフ同士の活発なコミュニケーションや整理整頓を後押ししています。</p>\r\n\r\n<p>また、福利厚生の一環として、スタッフからの要望をもとに高水準の音響設備を完備しました。フロア内には、業務効率が高まるように軽快な音楽を流しています。<br />\r\nそれ以外にも自然の中で仕事をしているイメージを取り入れております。</p>', NULL, '/upload/images/%E7%A4%BE%E5%86%851.jpg', '/upload/images/%E7%A4%BE%E5%86%851.jpg', 1, 1, 'description 日本茶の基礎を学んでみよう！', '2021-04-18 17:57:44', '2021-04-19 22:56:11', '/upload/images/%E7%A4%BE%E5%86%852.jpg'),
(3, 1, 1, '行動指針  WE COMPANY宣言', 'excerpt 日本茶の基礎を学んでみよう！', NULL, NULL, '<p>WE COMPANYの一員としての約束</p>\r\n\r\n<p>クレドは、目標や夢を実現するメンバーであるための具体的な行動指針として、社員が集まって生みだしたものです。</p>\r\n\r\n<p>2018年に【Crew】が集まり、WE COMPANYの一員として忘れてはならないことは何か、事業部を越えて意見を出し合い作成されました。現在では2020年に改訂された最新版が運用されています。</p>\r\n\r\n<p>またクレドは、日頃からいつでも見返して思い出せるように、１枚のカードにまとめられ、PC/スマートフォン/壁紙/ポスターでも見られるようになっています。</p>\r\n\r\n<p>【Crew】による【Crew】のための行動指針として、今も大切に運用され続け、毎週1回はみんなで声に出して読むことで、自身の行動や姿勢を見直す取組みを続けています。</p>\r\n\r\n<p>WE COMPANYが大切にしている想い</p>\r\n\r\n<p>WE COMPANYは【Crew】の可能性と成長を最大化することで、「アジアから世界」へ新たな価値を提供できると考えています。まず、義理堅さとボランティア精神を持ってやり切るためには、素直な気持ちで多様な考えを受け入れる必要があります。やり切るとたくさんのことが見えてきます。</p>\r\n\r\n<p>次に、より多くの価値を提供するためには、一人では限界があるので、仲間と力を合わせる必要があります。また、常に笑顔でいるために、主体的に全ての事を楽しみ、周りに感謝の気持ちを伝えることも重要です。最後に成長です。成長するには、素直な気持ちで新たなことに挑戦し、やり切る。この一連の行動をWE COMPANYは大切にしています。</p>', NULL, '/upload/images/%E8%A1%8C%E5%8B%951.jpg', '/upload/images/%E8%A1%8C%E5%8B%95.jpg', 1, 1, 'description 日本茶の基礎を学んでみよう！', '2021-04-18 17:57:44', '2021-04-19 23:02:02', NULL),
(4, 2, 1, '経営理念', 'excerpt 日本茶の基礎を学んでみよう！', NULL, NULL, '<p>「目標や夢の実現」を目指すこと。私たちは、それが人と企業を成長させる大きな原動力だと考えています。ASIAN COMPANYは、その原動力を最大限に高められる組織の構築を目指しています。</p>\r\n\r\n<p>そのために、私たちはトレンドや短期的な市場動向だけにとらわれることなく、実体経済を中長期の視点で見据えながら、確実な成長が期待できる産業を、世界規模・地域単位で創出できる経営体制を求めております。</p>\r\n\r\n<p>そして「目標や夢の実現」に向けて果敢に挑戦する仲間をサポートします。その挑戦の結果を正当に評価することで事業の成長を図り、「目標や夢の実現」を目指す新しいCrew（仲間）をさらに増やしていきたいと考えています。</p>\r\n\r\n<p>一人ひとりの「目標や夢の実現」を会社のエネルギーに変え、日本のみならず、アジア・世界規模、地域単位で新しい雇用を生み続け、実体経済と社会への貢献を目指していきます。</p>', NULL, '/upload/images/a1(1).jpg', '/images/home/asian18.jpg', 1, 1, 'description 日本茶の基礎を学んでみよう！', '2021-04-18 17:57:44', '2021-04-19 23:09:03', '/upload/images/a2%E4%BC%81%E6%A5%AD%E7%90%86%E5%BF%B5.jpg'),
(5, 1, 1, '企業ビジョン', 'excerpt 日本茶の基礎を学んでみよう！', NULL, NULL, '<p>私たちは、一人ひとり持つ能力を最大限に高め、組織一丸となってやりたいことに全力に向き合っている仲間です。</p>\r\n\r\n<p><strong>【We】</strong>と言う合言葉で私たちは夢を実現しようとしております。</p>\r\n\r\n<p>一人では実現できないことも</p>\r\n\r\n<p><strong>【We】</strong>一人ひとりの力を合わせれば私たちで成し遂げることができると思っております。</p>\r\n\r\n<p><strong>【We】</strong>と言う合言葉から趣味を仕事に、そして仕事を趣味にすることで楽しい人生を共に歩んでいけると思ったからです。</p>\r\n\r\n<p>私たちは、境界線（壁）を無くして関わる人々の出会いを大事にしております。はたらく仲間には、現在、取り組んでいる大きなテーマに向き合い。社会的な意味があることにも積極的に取り組んで、達成していく喜びを共感して参りたいと思います。</p>', NULL, '/upload/images/a1%E3%83%92%E3%82%99%E3%82%B7%E3%82%99%E3%83%A7%E3%83%B3.jpg', '/images/home/asian17.jpeg', 1, 1, 'description 日本茶の基礎を学んでみよう！', '2021-04-18 17:57:44', '2021-04-19 23:12:43', '/upload/images/a2%E3%83%92%E3%82%99%E3%82%B7%E3%82%99%E3%83%A7%E3%83%B3.jpg'),
(6, 1, 1, 'エントランスホール', 'excerpt 日本茶の基礎を学んでみよう！', NULL, NULL, '<p>東京本社の活動拠点となる茅場町長岡ビルは、</p>\r\n\r\n<p>日比谷線と東西線の重なる【茅場町】駅より、</p>\r\n\r\n<p>最寄となる【3番出口】から徒歩3分の場所にあります。</p>\r\n\r\n<p>ロビーにはソファやカフェスペースなども設けてありますので、</p>\r\n\r\n<p>待ち合わせや時間調整などにこちらを利用できます。　</p>\r\n\r\n<p>ご来社の際は、セキュリティゲート前の受付電話より、</p>\r\n\r\n<p>当社総合受付までご連絡ください。</p>', NULL, '/upload/images/a1%E3%82%A4%E3%83%B3%E3%83%88%E3%83%A9%E3%83%B3.jpg', '/images/home/asian16.jpg', 1, 1, 'description 日本茶の基礎を学んでみよう！', '2021-04-18 17:57:44', '2021-04-19 23:15:49', '/upload/images/a2%E3%82%A4%E3%83%B3%E3%83%88%E3%83%A9%E3%83%B3.jpg'),
(7, 3, 1, 'ASIAN CONSULTING ページ開始', 'excerpt 日本茶の基礎を学んでみよう！', NULL, NULL, '<p><em>2020.08.18</em></p>\r\n\r\n<p>令和２年８月２６ASIAN CONSULTING ページ開始しました。</p>', NULL, '/upload/images/a2asian.jpg', '/images/home/asian14.jpg', 1, 1, 'description 日本茶の基礎を学んでみよう！', '2021-04-18 17:57:44', '2021-04-19 23:20:13', NULL),
(8, 1, 1, '新型コロナウイルス（COVID-19）の対応について', 'excerpt f日本茶の基礎を学んでみよう！', NULL, NULL, '<p><em>2020.08.25</em></p>\r\n\r\n<p>新型コロナウイルスの感染拡大に伴い、お客様、当社従業員、関係者の皆さまの感染リスクの軽減及び安全・健康確保を目的として、２０２０年３月より&ldquo;厚生労働省のガイドライン&ldquo;に沿い、下記対応を実施しております。<br />\r\n引き続き従業員に対し感染予防を徹底するとともに、以下の対策を実施していることをお知らせいたします。</p>\r\n\r\n<p><strong>１</strong>．通勤、勤務中のマスクの着用の義務。不足分は会社が支給。<br />\r\n（会議・面接／面談の際も含む）<br />\r\n<strong>２</strong>．不要不急の飲み会および会食等は、禁止。<br />\r\n<strong>３</strong>．手洗い／うがい／アルコール消毒の徹底。<br />\r\n<strong>４</strong>．体調不良／37.5度以上の発熱の際は出社、禁止。<br />\r\n<strong>５</strong>．社内事情による国内出張および一部地域への海外出張を原則禁止。<br />\r\n<strong>６</strong>．会議は、原則テレビ会議など非対面での実施。<br />\r\n<strong>７</strong>．テレワークの実施。</p>\r\n\r\n<p>また、ご来社いただくお客さまにも、受付にございます消毒用アルコールで手指を消毒の上で入室いただけますよう、ご協力をお願い申し上げます。</p>', NULL, '/upload/images/a1corona.jpg', '/upload/images/a2corona.jpg', 2, 1, 'description f日本茶の基礎を学んでみよう！', '2021-04-18 17:57:44', '2021-04-19 23:27:14', NULL),
(9, 1, 1, 'WE・HOMES事業部', 'excerpt 日本茶の基礎を学んでみよう！', NULL, NULL, '<p>自信を持ってサイトユーザーに紹介できるクライアントとの直接取引プロジェクトや厳選した優良プロジェクトの紹介に徹底的にこだわりクライアントとエンジニアからのニーズに応えるために作り上げたIT業界特化型の無料求人プロジェクト情報サイトです。</p>', NULL, '/upload/images/home1a.jpg', '/images/home/asian13.jpg', 1, 1, 'description 日本茶の基礎を学んでみよう！', '2021-04-18 17:57:44', '2021-04-19 23:43:52', '/upload/images/home2a.jpg'),
(10, 3, 1, '人材支援サービス', 'excerpt 日本茶の基礎を学んでみよう！', NULL, NULL, '<p>人材派遣事業の商品はコンサル及び開発のエキスパートスタッフの提供です。<br />\r\nコンサル・システム開発に関してはお客様の立場に立ってニーズに合った、そのお客様に一番使いやすい人材を提供しています。<br />\r\n質の良い、使いやすい人材の提供と共に重視しているのがサービスです。従来の人材派遣において<br />\r\n人材教育の不足が多く見受けられる為、充実した社内教育を目指しておりその中でも一番大事なのは<br />\r\n専門知識を持った人材を育成することが大事だと感じています。<br />\r\n徹底的に基礎、応用知識の社内教育を行い、お客様からの質問や要望に柔軟に対応できる人材教育をしています。<br />\r\nそれにチーム連携とシステム情報提供によりスパイラル現象を起こしております。<br />\r\nお客様の不安要因を払拭し、最適な形でコンサル・開発を行うことに成功しています。</p>\r\n\r\n<p>弊社の商品のもう一つの柱であるオフショア・海外人材については、開発オフショアとシステム開発<br />\r\nのエキスパートにより、確実にお客様の声とニーズと動向を見極めることができています。<br />\r\nコンサル・設計から保守までの工程全体を通して請負固有のシステムに合った業務知識を理解し確実なラインを守り、より良い商品を提供しています。</p>', NULL, '/upload/images/a1(2).jpg', '/images/home/asian12.jpg', 1, 1, 'description 日本茶の基礎を学んでみよう！', '2021-04-18 17:57:44', '2021-04-19 23:48:53', '/upload/images/a2(1).jpg'),
(12, 1, 1, 'WE・JOB事業部', 'excerpt 日本茶の基礎を学んでみよう！', NULL, NULL, '<p>We 事業部&hellip;私たち社員、一人ひとりの理想のLifestyleをプロデュースする事業部です.</p>\r\n\r\n<p>趣味や娯楽、旅行等、人生をより楽しみ、魅力的にするための事業に取り組んでいます。</p>\r\n\r\n<p>一人ひとりの、「好き」を大事に、自分たちの「楽しい」をビジネスにして、</p>\r\n\r\n<p>最終的にお客さまに満足してもらえるサービスや、モノの提供を目指しております。</p>', NULL, '/upload/images/a2(1).jpg', '/images/home/asian10.jpg', 1, 1, 'description 日本茶の基礎を学んでみよう！', '2021-04-18 17:57:44', '2021-04-19 23:54:26', '/upload/images/a1(2).jpg'),
(13, 3, 1, '制作・開発・運用', 'excerpt 神社にあるを見つけよう！', NULL, NULL, '<p><strong>分析指標を更に細かなタスクへとつなげるWeb制作</strong></p>\r\n\r\n<p>豊富なWeb制作・アプリ開発実績と、売上向上・コンバージョンアップ・離脱率の低減などに繋がった多数のWebコンサルティング実績があります。</p>\r\n\r\n<p>現状サイトや競合の分析を行い、企画・構成、デザイン、コーディングまでサービスをご提供しております。</p>\r\n\r\n<p>当社の強みは問題の洗い出しから、成功するための戦略、技術面まで、トータルにお客様をサポートできることです。</p>\r\n\r\n<p><strong>ユーザビリティを考慮した運用～改善提案</strong></p>\r\n\r\n<p>豊富なサービスメニューとフレキシブルな運営体制で、Webサイトの運用、管理をトータルでサポートします。</p>\r\n\r\n<p>作業内容、作業量、ご予算、サイトに合わせて専任チームを編成し、Webサイトを丸ごとお預かりした上で、日々の定期更新から効果を生み出す施策の提案や、ユーザビリティを考慮した改善提案などを行います。</p>', NULL, '/upload/images/a1(3).jpg', '/images/home/asian09.jpg', 1, 1, 'description 神社にある10vvvvvvvを見つけよう！', '2021-04-18 17:57:44', '2021-04-19 23:59:10', NULL),
(14, 3, 1, '検証・サポート', 'excerpt 江戸時代の教科書を見てみよう！', NULL, NULL, '<p><em><strong>信頼性の高いソフトウェア・システムの品質向上に貢献</strong></em></p>\r\n\r\n<p>検証工程をアウトソースすることで、開発現場の貴重なエンジニアリソースをコア業務に集中させ、コスト最適化させるサービスです。</p>\r\n\r\n<p>開発者が見落としがちな不具合も、高度なテストノウハウを有する検証専門のテストエンジニアが担当することで、第三者視点の信頼性の高い検証を可能にします。</p>\r\n\r\n<p>また、多様化するPCやモバイル端末の登場に対応するため、新機種テスト、1端末のみの小規模～100機種を超える大規模な実機検証にも対応します。</p>\r\n\r\n<p>テスト設計からアウトソース可能で、これまで培ったナレッジを基に端末の選定、観点を基にしたテスト範囲の設計もお任せ頂けます。</p>\r\n\r\n<p>推進中のプロジェクトの予算、開発スケジュールに合わせ、テスト計画を策定し、テストケースをもとにテスト実施と結果および不具合を分析しご報告いたします。</p>\r\n\r\n<p>また検証に関わらず、お客様の課題に合わせて様々なサポート体制のご提案を致します。</p>', NULL, '/upload/images/a1(4).jpg', '/images/home/asian01.jpg', 1, 1, 'description 江戸時代の教科書を見てみよう！', '2021-04-18 17:57:44', '2021-04-20 00:04:08', NULL),
(15, 3, 1, '中途新卒人材の採用', 'excerpt 600種類の江戸時代の教科書を見てみよう！', NULL, NULL, '<p>常にお客様のニーズを考えたサービスの提供<br />\r\n私達、株式会社WE COMPANYは、アジア周辺国に支店を持ち、様々なサービスを提供しております。<br />\r\n常にお客様のニーズを考えた、サービスの提供、これが私たちのコンセプトです。</p>\r\n\r\n<p>お客様に最適なニーズにあったプロデュースをする事を常に第一に考え、<br />\r\nとにかく「安心」をテーマに、従来のビジネスに更に新しい事を取り組んで参りました。<br />\r\nそして、お客様の声を身近に感じることができるようになっています。<br />\r\n弊社は、日本国内で多数企業の業務システム開発に携わっております。<br />\r\n人材派遣業務で海外進出もしており、様々な業務システム開発に従事しております。</p>\r\n\r\n<p>この大きな変化の時に柔軟な「発想力」を活かし、私達と共に成長できる方を募集しています。<br />\r\n是非、あなたの能力を活かしてみませんか？</p>', NULL, '/upload/images/a1(5).jpg', '/upload/images/sptop02_2004_02.jpeg', 1, 1, 'description 600種類の江戸時代の教科書を見てみよう！', '2021-04-18 17:57:44', '2021-04-20 00:06:07', NULL),
(16, 3, 1, '年末年始についてのお知らせ', 'excerpt 600種類の凧からお気に入りを見つけよう！', NULL, NULL, '<p><em>2020.12.11</em></p>\r\n\r\n<p>年末年始のご挨拶および営業日について</p>\r\n\r\n<p>弊社では、新型コロナウイルスへの感染が再度拡大している状況を考慮し、<br />\r\nお客様ならびに関係者の皆様との対面での年末年始のご挨拶を控えさせていただきます。<br />\r\n年末年始のご挨拶を目的としたご来社はご遠慮いただきますようお願い申し上げます。</p>\r\n\r\n<p>お客様ならびに関係者の皆様、地域の皆様および社員の安全確保を最優先に、<br />\r\n引き続き感染拡大防止の取り組みを徹底してまいります。<br />\r\nご理解とご協力の程、何卒お願い申し上げます。</p>\r\n\r\n<p>【 年末年始の営業日について 】<br />\r\n2020年12月26日(土)～2021年1月3日(日)まで年末年始のお休みをいただきます。<br />\r\nご迷惑をおかけいたしますが、何卒ご理解を賜りますようお願い申し上げます。</p>\r\n\r\n<p>年末最終営業日時：12月25日(金)　15時00分まで<br />\r\n年始営業開始日時：1月4日(月)　9時30分より</p>', NULL, '/upload/images/a1(6).jpg', '/images/home/asian04.jpeg', 1, 1, 'description 600種類の凧からお気に入りを見つけよう！', '2021-04-18 17:57:44', '2021-04-20 00:07:58', NULL),
(17, 3, 1, '新年の挨拶について', 'excerpt 日本茶の基礎を学んでみよう！', NULL, NULL, '<p><em>2021.01.08</em></p>\r\n\r\n<p>新年の挨拶について</p>\r\n\r\n<p>当社ステークホルダーの皆さま、明けましておめでとうございます。<br />\r\n皆さまにおかれましては、本年が素晴らしい一年となりますことを心よりお祈り申し上げます。<br />\r\nさて、当社社長 長谷川美佳によるWEグループ役職員向け「2021年 年頭挨拶（要旨）」を下記の通りご報告します。<br />\r\n新型コロナウィルス感染症拡大防止の観点より、WEグループ役職員には動画で配信しております。</p>\r\n\r\n<p>記</p>\r\n\r\n<p>新年明けましておめでとうございます。</p>\r\n\r\n<p>年末年始は、ゆっくり心と体を休め、リフレッシュすることができましたでしょうか。<br />\r\n私自身は、この新しい生活様式の中、家族と共に新年を過ごし、改めてつながりの大切さを再認識することが出来ました。</p>\r\n\r\n<p>さて、本日から2021年のスタートです。<br />\r\n今年は法人一元化の初年度を迎える年です。</p>\r\n\r\n<p>法人一元化に向けて、昨年11月末に、例年より少し早めではありましたが、4月以降の新組織とそれを担当する役員人事を発表しました。<br />\r\nこれは、4月以降に組織を預かる方が、責任持って、4月よりスタートする経営計画の数字、戦略作りを行ってもらいたいという経営の意思によるものです。</p>\r\n\r\n<p>新組織は、今後会社として注力していきたい分野を反映しています。<br />\r\n部レベルまで見ていただければ、更にその意図が見えてくるとは思いますが、過去から引き継いだ商売を一生懸命繋いできたものの、その商売をすることだけに腐心し、新しいビジネスを生み出すことが出来ず、機能、収益が劣化した組織については、新組織の中で名前が無くなる、或いは統合されています。</p>\r\n\r\n<p>皆さんが実感している通り、世界的な新型コロナウイルスの感染拡大を受け、世の中の常識やニーズは大きく変わり、当社を取り巻くビジネス環境の変化のスピードは加速しています。また、これまで通りの仕事をただ継続し、積み上げるだけでは、目標として掲げる当期純利益1,000億円の達成は難しく、その意味でも変革し続けることが求められています。<br />\r\n本部長、部長の役割は、目の前の課題を解決することだけではなく、今日と違う明日をつくり出すために組織をリードすることです。社員一人ひとりにおいても、日々同じことを繰り返し行っているだけで、自分のやっている仕事がその給与に見合ったものかを考えない社員に存在意義はありません。変化しないことに危機感を感じ、果敢にチャレンジしてください。</p>\r\n\r\n<p>また、今後は、収益性のみならず、規模感あるビジネスの創出を追求していきます。収益性の低い案件はもちろんのこと、収益規模が小さく非効率なビジネスにおいても、抜本的な見直しを行い、成長が期待される分野にリソースを集中していく予定です。それは同時に、成功確率を高めることが求められることになります。<br />\r\nその為には、個人の能力向上に加え、スピードが大切だと考えています。ビジネスにおける鮮度をこれまで以上に意識の上、仕事の仕方を見直し、組織としてのスピードを上げてください。</p>\r\n\r\n<p>先ほど変革することの必要性をお伝えしました。一方で、市場環境が刻々と変化する中、変わらないこともあります。それは「必要な場所に必要なものを」届けるという我々に課された使命です。</p>\r\n\r\n<p>世の中のニーズに応えること、或いは当然と思っていたことの前提を問い返し、世の中に気づきを与えること、それらを通して社会的な課題を解決し、価値を創造していくことが我々には求められています。ビジネスの源泉は世の中のニーズ・課題にあり、その活動が、世の中の方に価値として認められ、結果として、会社の利益と持続的な成長につながるものと考えています。</p>\r\n\r\n<p>全社員が、改めてこの原点に立ち返り、担当する業務・事業がどのような社会的価値に繋がっているのかを見つめ直して頂きたいと思います。海外駐在員においては、これまでの様に日本や、取り扱う商品を起点とした考えではなく、現地のニーズ・課題を徹底的に把握し、強く発信してもらいたいと思います。</p>\r\n\r\n<p>法人一元化2020あと3か月を残すところとなりました。新型コロナウイルス感染症の収束時期が未だ見通せない中、決して簡単な目標ではありませんが、まずは社内外にお約束した法人一元化の達成に向け全社一丸となってまい進して参りましょう。</p>\r\n\r\n<p>最後になりますが、新型コロナウイルス感染症が未だに猛威を振るっている中、在宅勤務やフレックス制度を活用した時差通勤の徹底などにより感染リスクを可能な限り回避するなど、日頃の健康管理により一層留意の上で業務に臨んでください。また、有給休暇12日間や夏季休暇5日間の取得を通してリフレッシュ・体調管理をするなど、感染予防をしっかりと心掛けてください。</p>\r\n\r\n<p>日本と世界のWEグループ役職員の皆さん、そしてその皆さんを支えるご家族の皆さんの健康を祈念して年頭の挨拶とさせて頂きます。</p>\r\n\r\n<p>ありがとうございました。</p>\r\n\r\n<p>以上</p>\r\n\r\n<p>※法人一元化2020：各法人を全て法人をグループ化することで、会社一元化を目指して更なる成長を図る。</p>', NULL, '/upload/images/a1(7).jpg', '/images/home/asian03.jpg', 1, 1, 'description 日本茶の基礎を学んでみよう！', '2021-04-18 17:57:44', '2021-04-20 15:07:58', NULL),
(18, 3, 1, 'ASIAN CONSULTING ページ開始', 'excerpt 神社にある10個のハートを見つけよう！', NULL, NULL, '<p><em>2021.04.10</em></p>\r\n\r\n<p>令和3年4月10日　WE・COMPANY ページ開始しました。</p>', NULL, '/upload/images/n2.jpg', '/images/home/asian05.png', 1, 1, 'description 神社にある10個のハートを見つけよう！', '2021-04-18 17:57:44', '2021-04-20 00:11:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_tag_actives`
--

CREATE TABLE IF NOT EXISTS `post_tag_actives` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) DEFAULT NULL,
  `tag_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `post_tag_actives`
--

INSERT INTO `post_tag_actives` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 0, 3, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `excerpt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `catalogue` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `excerpt`, `content`, `catalogue`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Tag test', 'excerpt Tag test', 'content Tag test', NULL, '/logo.png', 'description Tag test', '2021-04-18 17:57:44', '2021-04-18 17:57:44'),
(2, 'Tag seed', 'excerpt Tag seed', 'content Tag seed', NULL, '/logo.png', 'description Tag seed', '2021-04-18 17:57:44', '2021-04-18 17:57:44'),
(3, 'Random tag', 'excerpt Random tag', 'content Random tag', NULL, '/logo.png', 'description Random tag', '2021-04-18 17:57:44', '2021-04-18 17:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'thanhthien3046@gmail.com', NULL, '$2y$10$p8VbCMWDcp7DZdky59Rf6uJp3aQ/bPMqLyBygDtBnfxa0OAmczHpq', '/images/avatar.jpg', 1, NULL, '2021-04-18 17:57:44', '2021-04-18 17:57:44');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
