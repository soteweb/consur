--
-- PostgreSQL database dump
--


-- Dumped from database version 18.6
-- Dumped by pg_dump version 18.6

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: activity_logs; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.activity_logs (
    id bigint NOT NULL,
    user_id bigint,
    action character varying(255) NOT NULL,
    entity_type character varying(255),
    entity_id bigint,
    description character varying(255) NOT NULL,
    changes jsonb,
    ip_address character varying(255),
    user_agent text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: activity_logs_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.activity_logs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: activity_logs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.activity_logs_id_seq OWNED BY public.activity_logs.id;


--
-- Name: branches; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.branches (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    city character varying(255) NOT NULL,
    address character varying(255) NOT NULL,
    phone character varying(255),
    whatsapp character varying(255),
    email character varying(255),
    schedule_weekdays character varying(255),
    schedule_saturday character varying(255),
    google_maps_url text,
    image_url character varying(255),
    has_workshop boolean DEFAULT true NOT NULL,
    has_mobile_workshop boolean DEFAULT false NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    sort_order integer DEFAULT 0 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: branches_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.branches_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: branches_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.branches_id_seq OWNED BY public.branches.id;


--
-- Name: brands; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.brands (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    logo_url character varying(255),
    is_active boolean DEFAULT true NOT NULL,
    sort_order integer DEFAULT 0 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    tagline character varying(255),
    custom_url character varying(255),
    description text,
    banner_image character varying(255),
    is_featured_menu boolean DEFAULT true NOT NULL
);


--
-- Name: brands_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.brands_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: brands_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.brands_id_seq OWNED BY public.brands.id;


--
-- Name: cache; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration bigint NOT NULL
);


--
-- Name: cache_locks; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration bigint NOT NULL
);


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection character varying(255) NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: form_configs; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.form_configs (
    id bigint NOT NULL,
    form_key character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    title character varying(255),
    subtitle text,
    button_text character varying(255) DEFAULT 'Enviar Solicitud'::character varying NOT NULL,
    success_message text,
    notification_emails character varying(255),
    whatsapp_template text,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: form_configs_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.form_configs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: form_configs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.form_configs_id_seq OWNED BY public.form_configs.id;


--
-- Name: job_batches; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.job_batches (
    id character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    total_jobs integer NOT NULL,
    pending_jobs integer NOT NULL,
    failed_jobs integer NOT NULL,
    failed_job_ids text NOT NULL,
    options text,
    cancelled_at integer,
    created_at integer NOT NULL,
    finished_at integer
);


--
-- Name: jobs; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.jobs (
    id bigint NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);


--
-- Name: jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;


--
-- Name: leads; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.leads (
    id bigint NOT NULL,
    type character varying(255) DEFAULT 'cotizacion'::character varying NOT NULL,
    vehicle_id bigint,
    branch_id bigint,
    assigned_to_user_id bigint,
    full_name character varying(255) NOT NULL,
    email character varying(255),
    phone character varying(255) NOT NULL,
    city character varying(255),
    message text,
    financing_plan character varying(255),
    trade_in_vehicle character varying(255),
    preferred_date date,
    preferred_time character varying(255),
    status character varying(255) DEFAULT 'nuevo'::character varying NOT NULL,
    internal_notes text,
    last_contacted_at timestamp(0) without time zone,
    ip_address character varying(255),
    user_agent character varying(255),
    utm_source character varying(255),
    utm_campaign character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: leads_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.leads_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: leads_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.leads_id_seq OWNED BY public.leads.id;


--
-- Name: menu_items; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.menu_items (
    id bigint NOT NULL,
    location character varying(255) DEFAULT 'header'::character varying NOT NULL,
    parent_id bigint,
    title character varying(255) NOT NULL,
    url character varying(255) NOT NULL,
    target character varying(255) DEFAULT '_self'::character varying NOT NULL,
    icon character varying(255),
    badge_text character varying(255),
    badge_color character varying(255) DEFAULT 'red'::character varying,
    sort_order integer DEFAULT 0 NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: menu_items_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.menu_items_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: menu_items_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.menu_items_id_seq OWNED BY public.menu_items.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: pages; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.pages (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    subtitle text,
    banner_image character varying(255),
    content text NOT NULL,
    meta_title character varying(255),
    meta_description text,
    is_published boolean DEFAULT true NOT NULL,
    sort_order integer DEFAULT 0 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: pages_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.pages_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: pages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.pages_id_seq OWNED BY public.pages.id;


--
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


--
-- Name: podcasts; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.podcasts (
    id bigint NOT NULL,
    episode_number character varying(255),
    title character varying(255) NOT NULL,
    description text,
    guest_name character varying(255),
    spotify_url character varying(255),
    youtube_url character varying(255),
    cover_image character varying(255),
    duration character varying(255),
    published_date date,
    is_active boolean DEFAULT true NOT NULL,
    sort_order integer DEFAULT 0 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: podcasts_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.podcasts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: podcasts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.podcasts_id_seq OWNED BY public.podcasts.id;


--
-- Name: posts; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.posts (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    category character varying(255) DEFAULT 'Novedades'::character varying NOT NULL,
    excerpt text,
    content text NOT NULL,
    featured_image character varying(255),
    published_at timestamp(0) without time zone,
    is_published boolean DEFAULT true NOT NULL,
    meta_title character varying(255),
    meta_description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    gallery json
);


--
-- Name: posts_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.posts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: posts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.posts_id_seq OWNED BY public.posts.id;


--
-- Name: sessions; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


--
-- Name: settings; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.settings (
    id bigint NOT NULL,
    key character varying(255) NOT NULL,
    value text,
    type character varying(255) DEFAULT 'text'::character varying NOT NULL,
    "group" character varying(255) DEFAULT 'general'::character varying NOT NULL,
    label character varying(255),
    description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: settings_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.settings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: settings_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.settings_id_seq OWNED BY public.settings.id;


--
-- Name: site_sections; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.site_sections (
    id bigint NOT NULL,
    key character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    is_visible boolean DEFAULT true NOT NULL,
    sort_order integer DEFAULT 0 NOT NULL,
    content jsonb NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: site_sections_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.site_sections_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: site_sections_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.site_sections_id_seq OWNED BY public.site_sections.id;


--
-- Name: sliders; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.sliders (
    id bigint NOT NULL,
    tag character varying(255),
    title character varying(255),
    description text,
    button_text character varying(255),
    button_url character varying(255),
    button_secondary_text character varying(255),
    button_secondary_url character varying(255),
    image_desktop character varying(255) NOT NULL,
    image_mobile character varying(255),
    content_position character varying(255) DEFAULT 'left'::character varying NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    sort_order integer DEFAULT 0 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    video_url character varying(255),
    "group" character varying(50) DEFAULT 'home'::character varying NOT NULL
);


--
-- Name: sliders_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.sliders_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: sliders_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.sliders_id_seq OWNED BY public.sliders.id;


--
-- Name: testimonials; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.testimonials (
    id bigint NOT NULL,
    client_name character varying(255) NOT NULL,
    vehicle_model character varying(255),
    city character varying(255),
    comment text NOT NULL,
    rating integer DEFAULT 5 NOT NULL,
    avatar_url character varying(255),
    is_active boolean DEFAULT true NOT NULL,
    sort_order integer DEFAULT 0 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: testimonials_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.testimonials_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: testimonials_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.testimonials_id_seq OWNED BY public.testimonials.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    phone character varying(255),
    role character varying(255) DEFAULT 'super_admin'::character varying NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    avatar character varying(255),
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: vehicle_categories; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.vehicle_categories (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    icon character varying(255),
    description text,
    is_active boolean DEFAULT true NOT NULL,
    sort_order integer DEFAULT 0 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: vehicle_categories_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.vehicle_categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: vehicle_categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.vehicle_categories_id_seq OWNED BY public.vehicle_categories.id;


--
-- Name: vehicle_images; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.vehicle_images (
    id bigint NOT NULL,
    vehicle_id bigint NOT NULL,
    image_path character varying(255) NOT NULL,
    caption character varying(255),
    is_main boolean DEFAULT false NOT NULL,
    sort_order integer DEFAULT 0 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: vehicle_images_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.vehicle_images_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: vehicle_images_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.vehicle_images_id_seq OWNED BY public.vehicle_images.id;


--
-- Name: vehicles; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.vehicles (
    id bigint NOT NULL,
    uuid uuid NOT NULL,
    condition character varying(255) DEFAULT '0km'::character varying NOT NULL,
    brand_id bigint NOT NULL,
    vehicle_category_id bigint,
    branch_id bigint,
    model character varying(255) NOT NULL,
    version character varying(255),
    slug character varying(255) NOT NULL,
    year integer NOT NULL,
    price_usd numeric(12,2),
    price_gs numeric(15,0),
    show_price boolean DEFAULT true NOT NULL,
    price_note text,
    mileage_km integer DEFAULT 0 NOT NULL,
    fuel_type character varying(255) DEFAULT 'Nafta'::character varying NOT NULL,
    transmission character varying(255) DEFAULT 'AutomÃ¡tica'::character varying NOT NULL,
    traction character varying(255),
    engine character varying(255),
    doors integer DEFAULT 4 NOT NULL,
    color_exterior character varying(255),
    color_interior character varying(255),
    chassis_vin character varying(255),
    tagline character varying(255),
    description text,
    specs jsonb,
    features jsonb,
    is_certified boolean DEFAULT false NOT NULL,
    is_featured boolean DEFAULT false NOT NULL,
    is_hybrid boolean DEFAULT false NOT NULL,
    status character varying(255) DEFAULT 'disponible'::character varying NOT NULL,
    sort_order integer DEFAULT 0 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone,
    monthly_fee_usd numeric(10,2),
    brochure_url character varying(255),
    video_url character varying(255),
    airbags smallint,
    colors jsonb,
    versions jsonb,
    safety jsonb,
    highlights jsonb,
    hero_banners jsonb,
    custom_html text,
    html_media jsonb
);


--
-- Name: vehicles_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.vehicles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: vehicles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.vehicles_id_seq OWNED BY public.vehicles.id;


--
-- Name: activity_logs id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.activity_logs ALTER COLUMN id SET DEFAULT nextval('public.activity_logs_id_seq'::regclass);


--
-- Name: branches id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.branches ALTER COLUMN id SET DEFAULT nextval('public.branches_id_seq'::regclass);


--
-- Name: brands id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.brands ALTER COLUMN id SET DEFAULT nextval('public.brands_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: form_configs id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.form_configs ALTER COLUMN id SET DEFAULT nextval('public.form_configs_id_seq'::regclass);


--
-- Name: jobs id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);


--
-- Name: leads id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.leads ALTER COLUMN id SET DEFAULT nextval('public.leads_id_seq'::regclass);


--
-- Name: menu_items id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.menu_items ALTER COLUMN id SET DEFAULT nextval('public.menu_items_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: pages id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pages ALTER COLUMN id SET DEFAULT nextval('public.pages_id_seq'::regclass);


--
-- Name: podcasts id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.podcasts ALTER COLUMN id SET DEFAULT nextval('public.podcasts_id_seq'::regclass);


--
-- Name: posts id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.posts ALTER COLUMN id SET DEFAULT nextval('public.posts_id_seq'::regclass);


--
-- Name: settings id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.settings ALTER COLUMN id SET DEFAULT nextval('public.settings_id_seq'::regclass);


--
-- Name: site_sections id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.site_sections ALTER COLUMN id SET DEFAULT nextval('public.site_sections_id_seq'::regclass);


--
-- Name: sliders id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sliders ALTER COLUMN id SET DEFAULT nextval('public.sliders_id_seq'::regclass);


--
-- Name: testimonials id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.testimonials ALTER COLUMN id SET DEFAULT nextval('public.testimonials_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Name: vehicle_categories id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.vehicle_categories ALTER COLUMN id SET DEFAULT nextval('public.vehicle_categories_id_seq'::regclass);


--
-- Name: vehicle_images id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.vehicle_images ALTER COLUMN id SET DEFAULT nextval('public.vehicle_images_id_seq'::regclass);


--
-- Name: vehicles id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.vehicles ALTER COLUMN id SET DEFAULT nextval('public.vehicles_id_seq'::regclass);


--
-- Data for Name: activity_logs; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.activity_logs VALUES (1, 1, 'system_init', NULL, NULL, 'InicializaciÃ³n de datos del sistema, vehÃ­culos mock y configuraciones maestras.', NULL, '127.0.0.1', NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.activity_logs VALUES (2, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-05 02:44:30', '2026-10-05 02:44:30');
INSERT INTO public.activity_logs VALUES (3, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', '2026-10-05 13:26:08', '2026-10-05 13:26:08');
INSERT INTO public.activity_logs VALUES (4, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-05 17:07:00', '2026-10-05 17:07:00');
INSERT INTO public.activity_logs VALUES (5, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', '2026-10-05 20:11:59', '2026-10-05 20:11:59');
INSERT INTO public.activity_logs VALUES (6, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-05 22:54:03', '2026-10-05 22:54:03');
INSERT INTO public.activity_logs VALUES (7, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', '2026-10-05 23:11:56', '2026-10-05 23:11:56');
INSERT INTO public.activity_logs VALUES (8, 1, 'banner_manage', 'App\Models\Slider', 1, 'GestiÃ³n de slider: TU AUTO, TU ESTILO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', '2026-10-05 23:18:44', '2026-10-05 23:18:44');
INSERT INTO public.activity_logs VALUES (9, 1, 'update_form_config', 'App\Models\FormConfig', 1, 'ActualizÃ³ la configuraciÃ³n del formulario: CotizaciÃ³n de Portada (Home)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', '2026-10-05 23:19:34', '2026-10-05 23:19:34');
INSERT INTO public.activity_logs VALUES (10, 1, 'update_settings', NULL, NULL, 'ActualizÃ³ la tasa de cambio USD a PYG: 7850', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', '2026-10-05 23:23:56', '2026-10-05 23:23:56');
INSERT INTO public.activity_logs VALUES (11, 1, 'logout', NULL, NULL, 'Cierre de sesiÃ³n de usuario.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-05 23:40:52', '2026-10-05 23:40:52');
INSERT INTO public.activity_logs VALUES (12, 4, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-05 23:41:12', '2026-10-05 23:41:12');
INSERT INTO public.activity_logs VALUES (13, 4, 'logout', NULL, NULL, 'Cierre de sesiÃ³n de usuario.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-05 23:41:49', '2026-10-05 23:41:49');
INSERT INTO public.activity_logs VALUES (14, 3, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-05 23:42:08', '2026-10-05 23:42:08');
INSERT INTO public.activity_logs VALUES (15, 3, 'logout', NULL, NULL, 'Cierre de sesiÃ³n de usuario.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-05 23:42:57', '2026-10-05 23:42:57');
INSERT INTO public.activity_logs VALUES (16, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-05 23:43:24', '2026-10-05 23:43:24');
INSERT INTO public.activity_logs VALUES (17, 1, 'create_user', 'App\Models\User', 5, 'CreÃ³ nuevo usuario: Lautaro Gimenez (vendedor)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-05 23:58:35', '2026-10-05 23:58:35');
INSERT INTO public.activity_logs VALUES (18, 1, 'crm_update', 'App\Models\Lead', 3, 'ActualizÃ³ lead #3 (Carlos BenÃ­tez) de ''nuevo'' a ''en_gestion''', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-06 00:05:13', '2026-10-06 00:05:13');
INSERT INTO public.activity_logs VALUES (19, 1, 'logout', NULL, NULL, 'Cierre de sesiÃ³n de usuario.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-06 00:06:03', '2026-10-06 00:06:03');
INSERT INTO public.activity_logs VALUES (20, 4, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-06 00:06:51', '2026-10-06 00:06:51');
INSERT INTO public.activity_logs VALUES (21, 4, 'crm_claim', 'App\Models\Lead', 6, 'Rodrigo Alcaraz (Asesor Comercial) tomÃ³ el lead #6 (Fernando GimÃ©nez)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-06 00:07:31', '2026-10-06 00:07:31');
INSERT INTO public.activity_logs VALUES (22, 4, 'logout', NULL, NULL, 'Cierre de sesiÃ³n de usuario.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-06 00:21:17', '2026-10-06 00:21:17');
INSERT INTO public.activity_logs VALUES (23, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-06 00:21:28', '2026-10-06 00:21:28');
INSERT INTO public.activity_logs VALUES (24, 1, 'logout', NULL, NULL, 'Cierre de sesiÃ³n de usuario.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-06 00:23:54', '2026-10-06 00:23:54');
INSERT INTO public.activity_logs VALUES (25, 4, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-06 00:24:49', '2026-10-06 00:24:49');
INSERT INTO public.activity_logs VALUES (26, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', '2026-10-08 12:45:46', '2026-10-08 12:45:46');
INSERT INTO public.activity_logs VALUES (27, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0', '2026-10-27 21:23:28', '2026-10-27 21:23:28');
INSERT INTO public.activity_logs VALUES (28, 1, 'deleted_menu_item', NULL, NULL, 'EliminÃ³ el Ã­tem de menÃº Podcast (#10)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0', '2026-10-28 00:00:01', '2026-10-28 00:00:01');
INSERT INTO public.activity_logs VALUES (29, 1, 'deleted_menu_item', NULL, NULL, 'EliminÃ³ el Ã­tem de menÃº Sucursales (#11)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0', '2026-10-28 00:00:03', '2026-10-28 00:00:03');
INSERT INTO public.activity_logs VALUES (30, 1, 'deleted_menu_item', NULL, NULL, 'EliminÃ³ el Ã­tem de menÃº Consur Bike (#8)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0', '2026-10-28 00:00:08', '2026-10-28 00:00:08');
INSERT INTO public.activity_logs VALUES (31, 1, 'deleted_menu_item', NULL, NULL, 'EliminÃ³ el Ã­tem de menÃº Consur Shop (#9)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0', '2026-10-28 00:00:11', '2026-10-28 00:00:11');
INSERT INTO public.activity_logs VALUES (32, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0', '2026-10-28 12:37:23', '2026-10-28 12:37:23');
INSERT INTO public.activity_logs VALUES (33, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-10-28 18:21:42', '2026-10-28 18:21:42');
INSERT INTO public.activity_logs VALUES (34, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-10-29 12:55:19', '2026-10-29 12:55:19');
INSERT INTO public.activity_logs VALUES (35, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-10-31 18:44:59', '2026-10-31 18:44:59');
INSERT INTO public.activity_logs VALUES (36, 1, 'deleted_vehicle', NULL, NULL, 'EliminÃ³ 0km Toyota Agya 1.0 MT / AT 2025 (#11)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-10-31 18:56:13', '2026-10-31 18:56:13');
INSERT INTO public.activity_logs VALUES (37, 1, 'bulk_deleted_vehicles', NULL, NULL, 'EliminÃ³ en lote 19 vehÃ­culo(s) (0km)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-10-31 18:58:34', '2026-10-31 18:58:34');
INSERT INTO public.activity_logs VALUES (38, 1, 'deleted_menu_item', NULL, NULL, 'EliminÃ³ el Ã­tem de menÃº VehÃ­culos 0 Km (#2)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-10-31 21:13:10', '2026-10-31 21:13:10');
INSERT INTO public.activity_logs VALUES (39, 1, 'deleted_menu_item', NULL, NULL, 'EliminÃ³ el Ã­tem de menÃº VehÃ­culos Usados (#3)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-10-31 21:13:12', '2026-10-31 21:13:12');
INSERT INTO public.activity_logs VALUES (40, 1, 'menu_manage', 'App\Models\MenuItem', 4, 'GestiÃ³n de menÃº: CatÃ¡logo Digital (https://consur.com.py/catalogo-consur-s-a/)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-10-31 21:13:22', '2026-10-31 21:13:22');
INSERT INTO public.activity_logs VALUES (41, 1, 'deleted_menu_item', NULL, NULL, 'EliminÃ³ el Ã­tem de menÃº VehÃ­culos (#1)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-10-31 21:13:28', '2026-10-31 21:13:28');
INSERT INTO public.activity_logs VALUES (42, 1, 'menu_manage', 'App\Models\MenuItem', 7, 'GestiÃ³n de menÃº: Seguros (/seguros)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-10-31 21:13:35', '2026-10-31 21:13:35');
INSERT INTO public.activity_logs VALUES (43, 1, 'menu_manage', 'App\Models\MenuItem', 4, 'GestiÃ³n de menÃº: CatÃ¡logo (https://consur.com.py/catalogo-consur-s-a/)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-10-31 21:14:17', '2026-10-31 21:14:17');
INSERT INTO public.activity_logs VALUES (44, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-11-01 01:56:22', '2026-11-01 01:56:22');
INSERT INTO public.activity_logs VALUES (45, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-11-02 13:34:06', '2026-11-02 13:34:06');
INSERT INTO public.activity_logs VALUES (46, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-11-05 02:40:43', '2026-11-05 02:40:43');
INSERT INTO public.activity_logs VALUES (47, 1, 'banner_manage', 'App\Models\Slider', 3, 'GestiÃ³n de slider: CALIDAD CON GARANTÃA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-11-05 02:42:02', '2026-11-05 02:42:02');
INSERT INTO public.activity_logs VALUES (48, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-11-05 12:38:56', '2026-11-05 12:38:56');
INSERT INTO public.activity_logs VALUES (49, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-11-11 15:18:16', '2026-11-11 15:18:16');
INSERT INTO public.activity_logs VALUES (50, 1, 'banner_manage', 'App\Models\Slider', 8, 'GestiÃ³n de slider: Banner #8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-11-11 15:18:55', '2026-11-11 15:18:55');
INSERT INTO public.activity_logs VALUES (51, 1, 'banner_manage', 'App\Models\Slider', 8, 'GestiÃ³n de slider: Algo Nuevo llega a EncarnaciÃ³n', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-11-11 15:20:29', '2026-11-11 15:20:29');
INSERT INTO public.activity_logs VALUES (52, 1, 'banner_manage', 'App\Models\Slider', 8, 'GestiÃ³n de slider: Algo Nuevo llega a EncarnaciÃ³n', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-11-11 15:26:29', '2026-11-11 15:26:29');
INSERT INTO public.activity_logs VALUES (53, 1, 'banner_manage', 'App\Models\Slider', 8, 'GestiÃ³n de slider: TecnologÃ­a que inspira en cada vuelta', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-11-11 15:29:48', '2026-11-11 15:29:48');
INSERT INTO public.activity_logs VALUES (54, 1, 'banner_manage', 'App\Models\Slider', 8, 'GestiÃ³n de slider: TecnologÃ­a que inspira en cada vuelta', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-11-11 15:30:12', '2026-11-11 15:30:12');
INSERT INTO public.activity_logs VALUES (55, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-11-11 18:56:46', '2026-11-11 18:56:46');
INSERT INTO public.activity_logs VALUES (56, 1, 'banner_manage', 'App\Models\Slider', 4, 'GestiÃ³n de slider: Banner #4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-11-11 18:56:59', '2026-11-11 18:56:59');
INSERT INTO public.activity_logs VALUES (57, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', '2026-11-12 12:55:03', '2026-11-12 12:55:03');
INSERT INTO public.activity_logs VALUES (58, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36 Edg/157.0.0.0', '2026-11-18 17:44:41', '2026-11-18 17:44:41');
INSERT INTO public.activity_logs VALUES (59, 1, 'update_footer', NULL, NULL, 'ActualizÃ³ las opciones y textos del Footer corporativo.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36 Edg/157.0.0.0', '2026-11-18 18:17:55', '2026-11-18 18:17:55');
INSERT INTO public.activity_logs VALUES (60, 1, 'update_footer', NULL, NULL, 'ActualizÃ³ las opciones y textos del Footer corporativo.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36 Edg/157.0.0.0', '2026-11-18 18:18:27', '2026-11-18 18:18:27');
INSERT INTO public.activity_logs VALUES (61, 1, 'login', NULL, NULL, 'Inicio de sesiÃ³n exitoso en el panel de administraciÃ³n.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36 Edg/157.0.0.0', '2026-11-19 11:32:49', '2026-11-19 11:32:49');
INSERT INTO public.activity_logs VALUES (62, 1, 'banner_manage', 'App\Models\Slider', 9, 'GestiÃ³n de slider: Banner #9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36 Edg/157.0.0.0', '2026-11-19 11:38:12', '2026-11-19 11:38:12');
INSERT INTO public.activity_logs VALUES (63, 1, 'banner_manage', 'App\Models\Slider', 9, 'GestiÃ³n de slider: Banner #9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36 Edg/157.0.0.0', '2026-11-19 11:39:25', '2026-11-19 11:39:25');
INSERT INTO public.activity_logs VALUES (64, 1, 'banner_manage', 'App\Models\Slider', 10, 'GestiÃ³n de slider: Banner #10', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36 Edg/157.0.0.0', '2026-11-19 11:41:47', '2026-11-19 11:41:47');
INSERT INTO public.activity_logs VALUES (65, 1, 'banner_manage', 'App\Models\Slider', 11, 'GestiÃ³n de slider: Banner #11', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36 Edg/157.0.0.0', '2026-11-19 11:42:46', '2026-11-19 11:42:46');
INSERT INTO public.activity_logs VALUES (66, 1, 'manage_page', 'App\Models\Page', 5, 'GestiÃ³n de pÃ¡gina CMS: CONSUR Broker de Seguros (/seguros)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36 Edg/157.0.0.0', '2026-11-19 12:07:43', '2026-11-19 12:07:43');
INSERT INTO public.activity_logs VALUES (67, 1, 'manage_page', 'App\Models\Page', 5, 'GestiÃ³n de pÃ¡gina CMS: CONSUR Broker de Seguros (/seguros)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36 Edg/157.0.0.0', '2026-11-19 12:27:55', '2026-11-19 12:27:55');
INSERT INTO public.activity_logs VALUES (68, 1, 'manage_page', 'App\Models\Page', 5, 'GestiÃ³n de pÃ¡gina CMS: CONSUR Broker de Seguros (/seguros)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36 Edg/157.0.0.0', '2026-11-19 12:28:15', '2026-11-19 12:28:15');


--
-- Data for Name: branches; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.branches VALUES (1, 'Casa Matriz', 'EncarnaciÃ³n', 'Avda. Caballero 749, EncarnaciÃ³n â€“ Paraguay', '(+595-71) 204 106', '+595 985 204 106', 'aclientes@consur.com.py', 'De Lunes a Viernes de 07:00 a 12:00 y de 14:00 a 17:30 Hs.', 'SÃ¡bados: de 07:30 a 12:00 Hs.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3544.60144586251!2d-55.86389328552524!3d-27.3256592829515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9457954427515e4f%3A0xdcdddd690e89c40c!2sConsur+S.R.L.!5e0!3m2!1ses-419!2spy!4v1563568088916!5m2!1ses-419!2spy', NULL, true, true, true, 1, '2026-10-05 02:20:24', '2026-10-31 21:18:27');
INSERT INTO public.branches VALUES (2, 'Sucursal Obligado', 'Obligado', 'Avda. Mcal. LÃ³pez y Gaspar R. de Francia, Obligado â€“ Paraguay', '(+595-717) 20 296', '+595 985 204 106', 'suc-obligado@consur.com.py', 'De Lunes a Viernes de 07:00 a 12:00 y de 14:00 a 17:30 Hs.', 'SÃ¡bados: de 07:30 a 12:00 Hs.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1776.5882666049376!2d-55.629103464940314!3d-27.056175149655797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9457fa4c4356312b%3A0x878c26576e7138fb!2sConsur+S.r.l!5e0!3m2!1ses-419!2spy!4v1563568692323!5m2!1ses-419!2spy', NULL, true, true, true, 2, '2026-10-05 02:20:24', '2026-10-31 21:18:27');
INSERT INTO public.branches VALUES (3, 'Sucursal MarÃ­a Auxiliadora', 'MarÃ­a Auxiliadora', 'Ruta 6ta. Km. 119, MarÃ­a Auxiliadora â€“ Paraguay', '(+595-76) 420 163', '+595 985 204 106', 'suc-mauxiliadora@consur.com.py', 'De Lunes a Viernes de 07:00 a 12:00 y de 14:00 a 17:30 Hs.', 'SÃ¡bados: de 07:30 a 12:00 Hs.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3569.4222641556507!2d-55.25898248554615!3d-26.538699283290164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f7e9b984da62f5%3A0xc4e3d6055bb6474d!2sConsur+Maria+Auxiliadora!5e0!3m2!1ses-419!2spy!4v1563568716349!5m2!1ses-419!2spy', NULL, true, false, true, 3, '2026-10-31 21:18:27', '2026-10-31 21:18:27');
INSERT INTO public.branches VALUES (4, 'Sucursal San Ignacio', 'San Ignacio', 'Ruta I, Km 224, San Ignacio â€“ Paraguay', '(+595-782) 233 473', '+595 985 204 106', 'suc-sanignacio@consur.com.py', 'De Lunes a Viernes de 07:00 a 12:00 y de 14:00 a 17:30 Hs.', 'SÃ¡bados: de 07:30 a 12:00 Hs.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14234.786781730912!2d-57.041984049132544!3d-26.88137589550232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x945a258c118f2429%3A0x98e5afaeb42ca48b!2sCONSUR+SRL+-+SUC!5e0!3m2!1ses-419!2spy!4v1563568769251!5m2!1ses-419!2spy', NULL, true, false, true, 4, '2026-10-31 21:18:27', '2026-10-31 21:18:27');
INSERT INTO public.branches VALUES (5, 'Sucursal San Pedro', 'San Pedro del ParanÃ¡', 'Gregorio Cabrera GonzÃ¡lez entre CapitÃ¡n LeguizamÃ³n y Tebicuary, San Pedro del ParanÃ¡ â€“ Paraguay', '(+595-71) 204 106', '+595 985 204 106', 'aclientes@consur.com.py', 'De Lunes a Viernes de 07:00 a 12:00 y de 14:00 a 17:30 Hs.', 'SÃ¡bados: de 07:30 a 12:00 Hs.', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3560.251945181414!2d-56.207996324563176!3d-26.83193777669548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjbCsDQ5JzU1LjAiUyA1NsKwMTInMTkuNSJX!5e0!3m2!1ses!2spy!4v1752024645609!5m2!1ses!2spy', NULL, false, true, true, 5, '2026-10-31 21:18:27', '2026-10-31 21:18:27');


--
-- Data for Name: brands; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.brands VALUES (7, 'Omoda | Jaecoo', 'omoda-jaecoo', '/images/marcas/omoda-jaecoo.svg', true, 2, '2026-10-29 12:34:13', '2026-11-12 19:25:39', 'De lo ClÃ¡sico MÃ¡s AllÃ¡ de lo ClÃ¡sico', '/omoda-jaecoo', 'SUVs hÃ­bridos de lujo y aventura JAECOO J5 y JAECOO J7. InnovaciÃ³n, tecnologÃ­a inteligente y respaldo oficial CONSUR S.A.', '/images/omoda-jaecoo/banner-hero.jpg', true);
INSERT INTO public.brands VALUES (11, 'CONSUR Broker de Seguros', 'seguros', '/images/marcas/consur-seguros.png', true, 6, '2026-10-29 12:34:13', '2026-11-12 19:25:39', 'PÃ³lizas & Cobertura Integral', '/seguros', 'Asesoramiento especializado en seguros patrimoniales, coberturas todo riesgo para flotas y automÃ³viles particulares con las mejores aseguradoras del paÃ­s.', 'sliders/toyota_seguros_desktop.jpg', true);
INSERT INTO public.brands VALUES (10, 'Can-Am', 'can-am', '/images/marcas/can-am.png', true, 5, '2026-10-29 12:34:13', '2026-11-11 01:45:37', 'ATVs, UTVs & Aventura Off-Road', '/canam', 'Poder, aventura y rendimiento extremo en vehÃ­culos todoterreno de recreaciÃ³n, competiciÃ³n y trabajo pesado fabricados por BRP.', 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&q=80&w=1920', true);
INSERT INTO public.brands VALUES (9, 'Sea-Doo', 'sea-doo', '/images/marcas/sea-doo.svg', true, 4, '2026-10-29 12:34:13', '2026-11-11 01:45:37', 'Motos de Agua & NÃ¡utica BRP', '/seadoo', 'La marca lÃ­der mundial en motos acuÃ¡ticas personales y diversiÃ³n nÃ¡utica con tecnologÃ­a de avanzada Rotax y BRP.', 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?auto=format&fit=crop&q=80&w=1920', true);
INSERT INTO public.brands VALUES (12, 'CONSUR Bike', 'consur-bike', '/images/marcas/consur-bike.png', true, 7, '2026-10-29 12:34:13', '2026-11-12 19:25:39', 'Ciclismo, E-Bikes & Movilidad', '/consur-bike', 'Bicicletas de alta gama, mountain bikes, e-bikes de Ãºltima generaciÃ³n, repuestos, indumentaria y servicio tÃ©cnico especializado.', 'https://images.unsplash.com/photo-1485965120184-e220f721d03e?auto=format&fit=crop&q=80&w=1920', true);
INSERT INTO public.brands VALUES (2, 'Lexus', 'lexus', '/images/marcas/lexus.svg', true, 2, '2026-10-05 02:20:24', '2026-11-02 13:35:40', NULL, NULL, NULL, NULL, false);
INSERT INTO public.brands VALUES (3, 'Jeep', 'jeep', '/images/marcas/jeep.svg', true, 3, '2026-10-05 02:20:24', '2026-11-02 13:35:40', NULL, NULL, NULL, NULL, false);
INSERT INTO public.brands VALUES (4, 'Kia', 'kia', '/images/marcas/kia.svg', true, 4, '2026-10-05 02:20:24', '2026-11-02 13:35:40', NULL, NULL, NULL, NULL, false);
INSERT INTO public.brands VALUES (5, 'Hyundai', 'hyundai', '/images/marcas/hyundai.svg', true, 5, '2026-10-05 02:20:24', '2026-11-02 13:35:40', NULL, NULL, NULL, NULL, false);
INSERT INTO public.brands VALUES (6, 'Volkswagen', 'volkswagen', '/images/marcas/volkswagen.svg', true, 6, '2026-10-28 16:32:40', '2026-11-02 13:35:40', NULL, NULL, NULL, NULL, false);
INSERT INTO public.brands VALUES (1, 'Toyota', 'toyota', '/images/marcas/toyota.svg', true, 1, '2026-10-05 02:20:24', '2026-11-05 10:59:10', 'LÃ­nea Oficial 0 Km', '/toyota', 'Concesionaria Oficial Toyota Paraguay. VehÃ­culos 0 Km, hÃ­bridos, sedanes y pick-ups con respaldo y garantÃ­a oficial.', 'sliders/toyota_bz4x_desktop.jpg', true);
INSERT INTO public.brands VALUES (8, 'Hino', 'hino', '/images/hino/logo.png', true, 3, '2026-10-29 12:34:13', '2026-11-11 12:01:56', 'Camiones Comerciales Grupo Toyota', '/hino', 'Camiones ligeros y pesados de la divisiÃ³n comercial de Toyota Group. MÃ¡xima durabilidad, eficiencia operativa y soporte postventa integral para tu negocio.', '/images/hino/banner-hero.jpg', true);


--
-- Data for Name: cache; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.cache VALUES ('consur-sa-cache-all_settings_map', 'a:77:{s:13:"contact_phone";s:16:"+595 985 804 106";s:16:"contact_whatsapp";s:12:"595985204106";s:13:"contact_email";s:22:"contacto@consur.com.py";s:13:"schedule_info";s:62:"Lun a Vie: 7:00 a 12:00 â€¢ 14:00 a 17:30 | SÃ¡b: 7:30 a 12:00";s:10:"turnos_url";s:44:"http://www.turnos365.com/turnos.aspx?con=131";s:9:"logo_type";s:10:"typography";s:17:"logo_primary_text";s:6:"CONSUR";s:14:"logo_dot_color";s:7:"#DC2626";s:16:"logo_brand_badge";s:6:"TOYOTA";s:14:"logo_image_url";s:66:"https://consur.com.py/wp-content/uploads/2019/07/logoconsurweb.png";s:11:"favicon_url";s:0:"";s:16:"home_value_cards";s:441:"[{"icon":"fas fa-certificate","title":"Concesionaria Oficial","subtitle":"Garant\u00eda y respaldo Toyota"},{"icon":"fas fa-truck-pickup","title":"Taller M\u00f3vil","subtitle":"Asistencia t\u00e9cnica en tu campo"},{"icon":"fas fa-shield-alt","title":"Usados Certificados","subtitle":"150 puntos de inspecci\u00f3n"},{"icon":"fas fa-hand-holding-usd","title":"Financiaci\u00f3n Propia","subtitle":"Planes en Guaran\u00edes o D\u00f3lares"}]";s:11:"sec_0km_tag";s:22:"LÃ­nea de Modelos 0 Km";s:13:"sec_0km_title";s:24:"DescubrÃ­ la Gama Toyota";s:16:"sec_usados_title";s:45:"VehÃ­culos con Experiencia y Respaldo Oficial";s:19:"sec_usados_btn_text";s:27:"Ver Todo el Stock de Usados";s:18:"sec_usados_btn_url";s:7:"/usados";s:19:"sec_usados_bg_image";s:93:"https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=1920";s:16:"sec_posventa_tag";s:30:"Servicio de Posventa Exclusivo";s:17:"sec_posventa_desc";s:197:"Entendemos que tu tiempo y tu trabajo no se detienen. Por eso, nuestro equipo de tÃ©cnicos certificados se traslada con vehÃ­culos equipados con herramientas de diagnÃ³stico de Ãºltima generaciÃ³n.";s:18:"sec_posventa_image";s:93:"https://images.unsplash.com/photo-1486006920555-c77dce18193b?auto=format&fit=crop&q=80&w=1200";s:24:"sec_posventa_badge_title";s:12:"100% OFICIAL";s:23:"sec_posventa_badge_desc";s:91:"Mantenimiento con repuestos legÃ­timos en la comodidad de tu hogar o establecimiento rural.";s:23:"sec_posventa_card1_icon";s:12:"fas fa-tools";s:24:"sec_posventa_card1_title";s:18:"Service Programado";s:23:"sec_posventa_card1_desc";s:73:"Mantenimiento de 5.000 a 100.000 km manteniendo la garantÃ­a de fÃ¡brica.";s:23:"sec_posventa_card2_icon";s:14:"fas fa-oil-can";s:24:"sec_posventa_card2_title";s:18:"Repuestos Genuinos";s:23:"sec_posventa_card2_desc";s:65:"Filtros, lubricantes originales Toyota TGMO y pastillas de freno.";s:15:"sec_podcast_tag";s:16:"Espacio de Audio";s:16:"sec_podcast_desc";s:88:"Novedades automotrices, tecnologÃ­a hÃ­brida y consejos para el cuidado de tu vehÃ­culo.";s:20:"sec_testimonials_tag";s:19:"Experiencias Reales";s:22:"sec_testimonials_title";s:30:"Lo que dicen nuestros clientes";s:16:"sec_branches_tag";s:16:"Red de AtenciÃ³n";s:18:"sec_branches_title";s:19:"Nuestras Sucursales";s:17:"sec_branches_desc";s:86:"Visitanos en nuestras salas de exhibiciÃ³n y talleres autorizados en el sur del paÃ­s.";s:14:"form_quote_tag";s:27:"Asesoramiento Personalizado";s:16:"form_quote_title";s:26:"CotizÃ¡ tu PrÃ³ximo Toyota";s:12:"company_name";s:44:"CONSUR S.A. â€“ Concesionaria Oficial Toyota";s:14:"sec_usados_tag";s:26:"CONSUR Usados Certificados";s:18:"sec_posventa_title";s:27:"Taller MÃ³vil CONSUR Toyota";s:17:"sec_podcast_title";s:21:"Podcast "Ruta CONSUR"";s:12:"facebook_url";s:38:"https://www.facebook.com/ConsurToyota/";s:13:"instagram_url";s:40:"https://www.instagram.com/consur_toyota/";s:10:"tiktok_url";s:36:"https://www.tiktok.com/@consurtoyota";s:11:"spotify_url";s:52:"https://open.spotify.com/show/2c7HzcDvLF5XXMPbOckJn2";s:19:"form_quote_btn_text";s:31:"Enviar Solicitud de CotizaciÃ³n";s:24:"form_quote_success_title";s:27:"Â¡Gracias por contactarnos!";s:23:"form_quote_success_desc";s:77:"Hemos recibido tu consulta y nos pondremos en contacto contigo a la brevedad.";s:23:"form_notification_email";s:20:"ventas@consur.com.py";s:16:"footer_col1_text";s:137:"Concesionaria Oficial de Toyota en Paraguay. Excelencia, garantÃ­a y servicio de posventa especializado para tu tranquilidad y confianza.";s:21:"site_logo_text_prefix";s:6:"CONSUR";s:21:"site_logo_text_suffix";s:1:".";s:20:"footer_show_facebook";s:1:"1";s:21:"footer_show_instagram";s:1:"1";s:18:"footer_show_tiktok";s:1:"1";s:19:"footer_show_spotify";s:1:"1";s:12:"linkedin_url";s:46:"https://www.linkedin.com/company/consur-toyota";s:14:"site_logo_type";s:5:"image";s:13:"site_logo_url";s:25:"/images/logoconsurweb.png";s:15:"site_logo_badge";s:0:"";s:16:"footer_logo_type";s:5:"image";s:15:"footer_logo_url";s:25:"/images/logoconsurweb.png";s:17:"footer_logo_badge";s:0:"";s:15:"catalog_pdf_url";s:44:"/catalogos/CATALOGO_CONSUR_TOYOTA_WEB_02.pdf";s:15:"catalog_edition";s:24:"EdiciÃ³n Oficial Vigente";s:16:"site_favicon_url";s:33:"/images/favicon/favicon-32x32.png";s:18:"site_logo_dark_url";s:31:"/images/logoconsurweb-white.png";s:15:"sec_usados_desc";s:150:"AccedÃ© a autos y camionetas seleccionadas con historial verificado, revisiÃ³n tÃ©cnica integral en talleres CONSUR y planes de financiaciÃ³n directa.";s:15:"form_quote_desc";s:117:"CompletÃ¡ el formulario y un asesor comercial de CONSUR S.A. se comunicarÃ¡ contigo con las mejores opciones de pago.";s:16:"footer_copyright";s:91:"Â© {year} CONSUR S.A. Todos los derechos reservados. Concesionaria Oficial Toyota Paraguay.";s:13:"catalog_title";s:29:"CatÃ¡logo Digital CONSUR S.A.";s:19:"footer_show_youtube";s:1:"1";s:11:"youtube_url";s:37:"https://www.youtube.com/@Consurtoyota";s:20:"footer_show_linkedin";s:1:"0";s:17:"footer_col2_title";s:16:"Marcas Oficiales";s:17:"footer_col3_title";s:8:"NOSOTROS";}', 2110447412);
INSERT INTO public.cache VALUES ('consur-sa-cache-consur_instagram_feed_v1', 'a:12:{i:0;a:11:{s:2:"id";s:21:"sbi_18355211443271288";s:8:"username";s:13:"consur_toyota";s:6:"avatar";s:28:"/images/instagram/avatar.jpg";s:10:"date_label";s:6:"Nov 18";s:9:"timestamp";i:1795002222;s:4:"type";s:5:"image";s:3:"url";s:40:"https://www.instagram.com/p/Df4bQ2WRYTq/";s:5:"image";s:43:"/images/instagram/sbi_18355211443271288.jpg";s:7:"caption";s:373:"El mantenimiento oficial de tu TOYOTA ahora significa mucho mÃ¡sUna vez finalizada la garantÃ­a inicial, Toyota 10 permite renovar la cobertura por 1 aÃ±o o 5.000 km hasta alcanzar un mÃ¡ximo de 10 aÃ±os o 200.000 km (lo que ocurra primero). Siempre que el vehÃ­culo cumpla con las condiciones del programa.ðŸ“² AgendÃ¡ el mantenimiento de tu Toyota en Consur  0985 204 106";s:5:"likes";i:5;s:8:"comments";i:0;}i:1;a:11:{s:2:"id";s:21:"sbi_17913042768592934";s:8:"username";s:13:"consur_toyota";s:6:"avatar";s:28:"/images/instagram/avatar.jpg";s:10:"date_label";s:6:"Nov 16";s:9:"timestamp";i:1794854318;s:4:"type";s:5:"image";s:3:"url";s:40:"https://www.instagram.com/p/Df0BDWcvXu4/";s:5:"image";s:43:"/images/instagram/sbi_17913042768592934.jpg";s:7:"caption";s:395:"ðŸš˜ Â¡El prÃ³ximo encuentro con tu Toyota puede estar mÃ¡s cerca de lo que imaginÃ¡s!Este 20 y 21 de noviembre, llevamos nuestra lÃ­nea de vehÃ­culos a un nuevo punto de encuentro en EncarnaciÃ³n, para que puedas conocerlos de cerca, descubrir sus detalles y encontrar el que mejor acompaÃ±a tus prÃ³ximos kilÃ³metros.ðŸ“ Comecipar EncarnaciÃ³n ðŸ“… 20 y 21 de noviembreðŸ•˜ De 09:00 a 15:00 h";s:5:"likes";i:8;s:8:"comments";i:0;}i:2;a:11:{s:2:"id";s:21:"sbi_18114709420890063";s:8:"username";s:13:"consur_toyota";s:6:"avatar";s:28:"/images/instagram/avatar.jpg";s:10:"date_label";s:6:"Nov 14";s:9:"timestamp";i:1794658102;s:4:"type";s:5:"image";s:3:"url";s:40:"https://www.instagram.com/p/DfuK5gcx500/";s:5:"image";s:43:"/images/instagram/sbi_18114709420890063.jpg";s:7:"caption";s:281:"Â¿Ya tenÃ©s un Toyota en mente? VenÃ­ a conocerlo de cerca. ðŸ”‘Consur Toyota llega a Ayolas con un espacio para conocer los modelos, comparar detalles y conversar sobre tu prÃ³ximo 0 km.ðŸ“ Red Padel Â· Av. Mcal. LÃ³pez, AyolasðŸ“… 18, 19 y 20 de noviembreðŸ•— De 08:00 a 17:00 h";s:5:"likes";i:7;s:8:"comments";i:0;}i:3;a:11:{s:2:"id";s:21:"sbi_18043339397837652";s:8:"username";s:13:"consur_toyota";s:6:"avatar";s:28:"/images/instagram/avatar.jpg";s:10:"date_label";s:6:"Nov 13";s:9:"timestamp";i:1794597047;s:4:"type";s:5:"reels";s:3:"url";s:43:"https://www.instagram.com/reel/DfsWQERx-9e/";s:5:"image";s:43:"/images/instagram/sbi_18043339397837652.jpg";s:7:"caption";s:185:"Compartimos la entrega de su nueva Toyota Fortuner y ese momento en que conocer cada detalle se convierte en empezar a disfrutarlo.Â¡Muchas gracias, Andrea y familia, por elegir Consur!";s:5:"likes";i:478;s:8:"comments";i:17;}i:4;a:11:{s:2:"id";s:21:"sbi_18104765495051217";s:8:"username";s:13:"consur_toyota";s:6:"avatar";s:28:"/images/instagram/avatar.jpg";s:10:"date_label";s:5:"Nov 9";s:9:"timestamp";i:1794236154;s:4:"type";s:5:"image";s:3:"url";s:40:"https://www.instagram.com/p/DfhmHPkFn7v/";s:5:"image";s:43:"/images/instagram/sbi_18104765495051217.jpg";s:7:"caption";s:486:"LLEGÃ“ TOYOTA 10  para que sigas contando con el respaldo de Toyota por mÃ¡s tiempoðŸ™ŒðŸ»Â¿CÃ³mo funciona Toyota 10?Cada vez que realizÃ¡s un servicio de mantenimiento oficial en cualquiera de nuestros talleres oficiales renovÃ¡s la garantÃ­a de tu Toyota por un 1 aÃ±o o 5.000 km hasta alcanzar un mÃ¡ximo de 10 aÃ±os o 200.000 km (lo que ocurra primero). ðŸ“² AgendÃ¡ el servicio de tu Toyota en CONSUR +595 985 204 106  Aplica a unidades adquiridas desde noviembre 2023 en adelante";s:5:"likes";i:11;s:8:"comments";i:0;}i:5;a:11:{s:2:"id";s:21:"sbi_18108923846280213";s:8:"username";s:13:"consur_toyota";s:6:"avatar";s:28:"/images/instagram/avatar.jpg";s:10:"date_label";s:5:"Nov 6";s:9:"timestamp";i:1793995986;s:4:"type";s:5:"reels";s:3:"url";s:43:"https://www.instagram.com/reel/Dfab9tACp07/";s:5:"image";s:43:"/images/instagram/sbi_18108923846280213.jpg";s:7:"caption";s:273:"ðŸ“±ðŸš˜ Â¿TodavÃ­a no conectaste tu iPhone a tu Toyota?En este reel te mostramos cÃ³mo conectar Apple CarPlay, paso a paso, para que disfrutes aÃºn mÃ¡s cada viaje. ðŸ™Œâ–¶ï¸ MirÃ¡ el tutorial y guardalo para tenerlo a mano cuando lo necesites.CONSUR. Siempre cerca tuyo.";s:5:"likes";i:26;s:8:"comments";i:0;}i:6;a:11:{s:2:"id";s:21:"sbi_18102139598560550";s:8:"username";s:13:"consur_toyota";s:6:"avatar";s:28:"/images/instagram/avatar.jpg";s:10:"date_label";s:5:"Nov 5";s:9:"timestamp";i:1793886784;s:4:"type";s:8:"carousel";s:3:"url";s:40:"https://www.instagram.com/p/DfXLvkMlhxo/";s:5:"image";s:43:"/images/instagram/sbi_18102139598560550.jpg";s:7:"caption";s:501:"ðŸŽ Â¡CuidÃ¡ tu Toyota y llevate un regalo!Con la promo de fin de aÃ±o CONSUR & LUBRAX, agendÃ¡ tu mantenimiento y recibÃ­ un obsequio especial al realizar tu servicio con lubricantes Lubrax. ðŸš˜âœ¨CerrÃ¡ el aÃ±o con el respaldo de nuestro servicio posventa oficial.ðŸ“² Â¡ReservÃ¡ tu turno y aprovechÃ¡ este beneficio!Contact Center: +595 985 204 106ðŸŒ www.consur.com.py/posventaPromociÃ³n vÃ¡lida durante noviembre y diciembre, exclusiva para clientes que reserven el mantenimiento de su Toyota.";s:5:"likes";i:9;s:8:"comments";i:0;}i:7;a:11:{s:2:"id";s:21:"sbi_17993666672852051";s:8:"username";s:13:"consur_toyota";s:6:"avatar";s:28:"/images/instagram/avatar.jpg";s:10:"date_label";s:6:"Oct 30";s:9:"timestamp";i:1793397723;s:4:"type";s:5:"reels";s:3:"url";s:43:"https://www.instagram.com/reel/DfImzBqFE4C/";s:5:"image";s:43:"/images/instagram/sbi_17993666672852051.jpg";s:7:"caption";s:608:"ðŸðŸ”¥ Â¡La pasiÃ³n por el automovilismo se vive a otro nivel!Velocidad, adrenalina y emociones que hacen del Transchaco Rally una de las competencias mÃ¡s emblemÃ¡ticas de nuestro paÃ­s. ðŸ‡µðŸ‡¾Desde CONSUR estuvimos presentes en la jornada de clasificaciÃ³n en el ex AratirÃ­, compartiendo de cerca con los protagonistas y viviendo una experiencia especial junto a Petrobras.ðŸš—ðŸ’¨ Porque detrÃ¡s de cada motor hay una historia, una pasiÃ³n y un sueÃ±o que nos mueve.Â¡AsÃ­ vivimos la antesala del Transchaco Rally 2026!#CONSUR #SiempreCercaTuyo #TranschacoRally2026 #Petrobras #lubrax #nextar #toyota";s:5:"likes";i:15;s:8:"comments";i:4;}i:8;a:11:{s:2:"id";s:21:"sbi_17971297917191130";s:8:"username";s:13:"consur_toyota";s:6:"avatar";s:28:"/images/instagram/avatar.jpg";s:10:"date_label";s:6:"Oct 30";s:9:"timestamp";i:1793370878;s:4:"type";s:8:"carousel";s:3:"url";s:40:"https://www.instagram.com/p/DfHzu1MnHlW/";s:5:"image";s:43:"/images/instagram/sbi_17971297917191130.jpg";s:7:"caption";s:330:"ðŸŽâœ¨ Â¡Un regalo tan especial como sus 18 aÃ±os!La Srta. Nahiara Veia Semeniuk recibiÃ³ su nuevo Toyota Corolla Cross 0 km, un regalo inolvidable para comenzar una nueva etapa llena de sueÃ±os y aventuras. ðŸš—â¤ï¸ðŸŽ‚ Â¡Feliz cumpleaÃ±os, Nahiara! Gracias a su familia por permitirnos ser parte de este momento tan especial.";s:5:"likes";i:294;s:8:"comments";i:6;}i:9;a:11:{s:2:"id";s:21:"sbi_18653736463015947";s:8:"username";s:13:"consur_toyota";s:6:"avatar";s:28:"/images/instagram/avatar.jpg";s:10:"date_label";s:6:"Oct 29";s:9:"timestamp";i:1793278345;s:4:"type";s:8:"carousel";s:3:"url";s:40:"https://www.instagram.com/p/DfFDPVQnPyD/";s:5:"image";s:43:"/images/instagram/sbi_18653736463015947.jpg";s:7:"caption";s:386:"En la vÃ­a, cada persona ocupa un lugar y cada decisiÃ³n puede hacer la diferencia.Conductores, ciclistas, motociclistas y peatones compartimos el mismo camino, por eso el respeto, la atenciÃ³n y la responsabilidad tambiÃ©n deben ser compartidos.No importa cÃ³mo nos movamos. Todos merecemos llegar seguros.Cuidarnos es parte del camino.#SeguridadVial #CONSUR #CuidarnosEsParteDelCamino";s:5:"likes";i:6;s:8:"comments";i:0;}i:10;a:11:{s:2:"id";s:21:"sbi_17956449423320598";s:8:"username";s:13:"consur_toyota";s:6:"avatar";s:28:"/images/instagram/avatar.jpg";s:10:"date_label";s:6:"Oct 27";s:9:"timestamp";i:1793133183;s:4:"type";s:5:"image";s:3:"url";s:40:"https://www.instagram.com/p/DfAuVfHJJyL/";s:5:"image";s:43:"/images/instagram/sbi_17956449423320598.jpg";s:7:"caption";s:367:"ðŸš—âš¡ Â¡Subite a un Toyota hÃ­brido y vivÃ­ la experiencia al volante!Este sÃ¡bado te esperamos en nuestro Espacio Toyota para realizar un test drive, conocer nuestros modelos y descubrir tu prÃ³ximo 0 km.ðŸ“… SÃ¡bado 31 de octubreðŸ•— De 08:00 a 17:30 hðŸ“ Predio de CONSUR Casa Central Â· Av. Caballero 749Â¡VenÃ­ a probarlo y encontrÃ¡ el Toyota ideal para vos!";s:5:"likes";i:5;s:8:"comments";i:0;}i:11;a:11:{s:2:"id";s:21:"sbi_18119797348982007";s:8:"username";s:13:"consur_toyota";s:6:"avatar";s:28:"/images/instagram/avatar.jpg";s:10:"date_label";s:6:"Oct 15";s:9:"timestamp";i:1792096503;s:4:"type";s:8:"carousel";s:3:"url";s:40:"https://www.instagram.com/p/Deh1DgXmb_C/";s:5:"image";s:43:"/images/instagram/sbi_18119797348982007.jpg";s:7:"caption";s:269:"ðŸŽ Â¡TU PRÃ“XIMO MANTENIMIENTO PUEDE SER GRATIS!SÃ­, Â¡GRATIS! ðŸ™Œ RealizÃ¡ el mantenimiento de tu Toyota en CONSUR y participÃ¡ del sorteo mensual.âœ¨ Â¿QuerÃ©s DOBLE CHANCE de ganar? RespondÃ© nuestra encuesta de satisfacciÃ³n.ðŸ“² AgendÃ¡ hoy al +595 985 204 106.";s:5:"likes";i:7;s:8:"comments";i:2;}}', 1795109013);
INSERT INTO public.cache VALUES ('consur-sa-cache-356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1795091328;', 1795091328);
INSERT INTO public.cache VALUES ('consur-sa-cache-356a192b7913b04c54574d18c28d46e6395428ab', 'i:2;', 1795091328);


--
-- Data for Name: cache_locks; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- Data for Name: form_configs; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.form_configs VALUES (1, 'home_cotizacion', 'CotizaciÃ³n de Portada (Home)', 'CotizÃ¡ tu PrÃ³ximo Toyota', 'Dejanos tus datos y un asesor especializado te contactarÃ¡ en menos de 15 minutos con las mejores condiciones comerciales.', 'Solicitar CotizaciÃ³n Inmediata', 'Â¡Tu solicitud fue enviada con Ã©xito! Un asesor oficial de Consur S.A. te contactarÃ¡ a la brevedad.', 'ventas@consur.com.py, contacto@consur.com.py', 'Hola Consur S.A., quisiera solicitar una cotizaciÃ³n personalizada y conocer los planes de financiaciÃ³n.', true, '2026-10-05 14:49:06', '2026-10-05 14:49:06');
INSERT INTO public.form_configs VALUES (2, 'vehicle_detail', 'Ficha Vehicular & FinanciaciÃ³n (Detalle)', 'Consultar por este VehÃ­culo', 'RecibÃ­ informaciÃ³n sobre financiaciÃ³n propia o bancaria, disponibilidad de stock y agendamiento.', 'Enviar Solicitud Comercial', 'Â¡Solicitud recibida! Un asesor de ventas se comunicarÃ¡ contigo de inmediato.', 'ventas@consur.com.py', 'Hola Consur S.A., estoy viendo la unidad {vehicle_title} (ID #{vehicle_id}) por US$ {price} y me gustarÃ­a recibir asesoramiento.', true, '2026-10-05 14:49:06', '2026-10-05 14:49:06');
INSERT INTO public.form_configs VALUES (3, 'test_drive', 'Solicitud de Test Drive Oficial', 'AgendÃ¡ tu Prueba de Manejo', 'ComprobÃ¡ la potencia, confort y tecnologÃ­a de la lÃ­nea Toyota coordinando un test drive exclusivo.', 'Confirmar Solicitud de Test Drive', 'Â¡Test drive agendado! Un representante se comunicarÃ¡ para coordinar el horario y sucursal.', 'testdrive@consur.com.py, ventas@consur.com.py', 'Hola Consur S.A., quisiera agendar un Test Drive oficial para probar un Toyota.', true, '2026-10-05 14:49:06', '2026-10-05 14:49:06');
INSERT INTO public.form_configs VALUES (4, 'usado_entrega', 'TasaciÃ³n de Usado en Parte de Pago', 'Recibimos tu Usado como Entrega', 'Tasamos tu vehÃ­culo usado de cualquier marca al mejor valor del mercado para que te lleves tu Toyota.', 'Solicitar TasaciÃ³n de mi Usado', 'Â¡Datos de tu usado recibidos! Nuestro equipo de peritaje te enviarÃ¡ la tasaciÃ³n estimada.', 'tasaciones@consur.com.py, usados@consur.com.py', 'Hola Consur S.A., quisiera tasar mi vehÃ­culo usado para entregarlo como parte de pago.', true, '2026-10-05 14:49:06', '2026-10-05 14:49:06');


--
-- Data for Name: job_batches; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- Data for Name: leads; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.leads VALUES (2, 'usado_interes', 5, 1, NULL, 'MarÃ­a Elena Ortiz', 'maria.ortiz@hotmail.com', '+595 975 444 888', 'Posadas / EncarnaciÃ³n', 'Buenas tardes, quiero probar la RAV4 HÃ­brida 2021 este sÃ¡bado por la maÃ±ana.', NULL, NULL, '2026-10-08', '10:00', 'en_gestion', 'Se le agendÃ³ llamada para confirmar disponibilidad de vehÃ­culo.', NULL, '127.0.0.1', NULL, NULL, NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.leads VALUES (5, 'cotizacion', 5, NULL, 4, 'Roberto Santander', 'rsantander@agroparaguay.com.py', '+595 971 889900', 'Colonias Unidas', 'Â¿Aceptan entrega de usado como parte de pago? Tengo una Hilux 2018.', NULL, 'Toyota Hilux SRV 2018 4x4 (110.000 km)', NULL, NULL, 'en_gestion', 'El cliente enviÃ³ fotos de su Hilux 2018 para tasaciÃ³n inicial.', '2026-10-05 22:01:33', NULL, NULL, NULL, NULL, '2026-10-06 00:01:33', '2026-10-06 00:01:33');
INSERT INTO public.leads VALUES (6, 'usado_entrega', 5, NULL, 4, 'Fernando GimÃ©nez', 'fergimenez@gmail.com', '+595 983 445566', 'EncarnaciÃ³n', 'Quiero tasar mi Corolla para retirar este usado certificado.', NULL, 'Toyota Corolla GLi 2016 Aut', NULL, NULL, 'en_gestion', NULL, '2026-10-06 00:07:31', NULL, NULL, NULL, NULL, '2026-10-06 00:01:33', '2026-10-06 00:07:31');
INSERT INTO public.leads VALUES (1, 'cotizacion', NULL, 1, NULL, 'Carlos BenÃ­tez', 'carlos.benitez@gmail.com', '+595 981 555 123', 'EncarnaciÃ³n', 'Hola, me gustarÃ­a saber planes de financiaciÃ³n para el nuevo Agya con entrega inicial de 3.000 USD.', 'Entrega inicial + 36 cuotas', NULL, NULL, NULL, 'nuevo', NULL, NULL, '127.0.0.1', NULL, NULL, NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.leads VALUES (4, 'test_drive', NULL, NULL, 4, 'MarÃ­a JosÃ© Duarte', 'majoduarte@hotmail.com', '+595 985 654321', 'Posadas / EncarnaciÃ³n', 'Quisiera agendar un test drive el fin de semana por la maÃ±ana.', NULL, NULL, '2026-10-08', '10:00 AM', 'contactado', 'Contactada por WhatsApp. Confirmada disponibilidad para el sÃ¡bado.', '2026-10-05 20:01:33', NULL, NULL, NULL, NULL, '2026-10-06 00:01:33', '2026-10-06 00:01:33');
INSERT INTO public.leads VALUES (3, 'cotizacion', NULL, NULL, NULL, 'Carlos BenÃ­tez', 'carlos.benitez@gmail.com', '+595 981 123456', 'EncarnaciÃ³n', 'Me interesa conocer las cuotas en guaranÃ­es para la Agya 0km.', 'Plan Cuotas Corridas 36 Meses', NULL, NULL, NULL, 'en_gestion', 'Prueba de seguimiento comercial y llamada programada.', '2026-10-06 00:05:13', NULL, NULL, NULL, NULL, '2026-10-06 00:01:33', '2026-10-06 00:05:13');


--
-- Data for Name: menu_items; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.menu_items VALUES (26, 'header', NULL, 'Novedades', '/novedades', '_self', NULL, NULL, 'red', 5, true, '2026-10-29 13:42:38', '2026-10-29 13:42:38');
INSERT INTO public.menu_items VALUES (5, 'header', NULL, 'Posventa', '/posventa', '_self', NULL, NULL, 'red', 2, true, '2026-10-05 13:33:22', '2026-11-09 00:42:28');
INSERT INTO public.menu_items VALUES (27, 'header', NULL, 'La Empresa', '/la-empresa', '_self', NULL, NULL, 'red', 6, true, '2026-11-10 13:47:35', '2026-11-10 13:47:35');
INSERT INTO public.menu_items VALUES (4, 'header', NULL, 'CatÃ¡logo', '/catalogo', '_self', '', '', 'red', 1, true, '2026-10-05 13:33:22', '2026-11-10 13:59:05');
INSERT INTO public.menu_items VALUES (28, 'header', NULL, 'Usados', '/usados', '_self', NULL, NULL, 'red', 3, true, '2026-11-10 18:19:11', '2026-11-10 18:19:11');
INSERT INTO public.menu_items VALUES (30, 'footer_col_3', NULL, 'La Empresa', '/la-empresa', '_self', NULL, NULL, 'red', 1, true, '2026-11-18 18:34:27', '2026-11-18 18:34:27');
INSERT INTO public.menu_items VALUES (31, 'footer_col_3', NULL, 'Agendamiento', 'http://www.turnos365.com/turnos.aspx?con=131', '_blank', NULL, NULL, 'red', 2, true, '2026-11-18 18:34:27', '2026-11-18 18:34:27');
INSERT INTO public.menu_items VALUES (32, 'footer_col_3', NULL, 'Trabaja con nosotros', '/trabaja-con-nosotros', '_self', NULL, NULL, 'red', 3, true, '2026-11-18 18:34:27', '2026-11-18 18:34:27');
INSERT INTO public.menu_items VALUES (33, 'footer_col_3', NULL, 'Novedades', '/novedades', '_self', NULL, NULL, 'red', 4, true, '2026-11-18 18:34:27', '2026-11-18 18:34:27');


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.migrations VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO public.migrations VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO public.migrations VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO public.migrations VALUES (4, '2026_10_04_000001_create_brands_and_categories_table', 1);
INSERT INTO public.migrations VALUES (5, '2026_10_04_000002_create_branches_table', 1);
INSERT INTO public.migrations VALUES (6, '2026_10_04_000003_create_vehicles_and_images_table', 1);
INSERT INTO public.migrations VALUES (7, '2026_10_04_000004_create_leads_table', 1);
INSERT INTO public.migrations VALUES (8, '2026_10_04_000005_create_sliders_and_content_tables', 1);
INSERT INTO public.migrations VALUES (9, '2026_10_04_000006_create_activity_logs_and_settings_tables', 1);
INSERT INTO public.migrations VALUES (10, '2026_10_05_000001_create_menu_items_table', 2);
INSERT INTO public.migrations VALUES (11, '2026_10_05_000002_create_site_sections_table', 3);
INSERT INTO public.migrations VALUES (12, '2026_10_05_000003_create_form_configs_table', 4);
INSERT INTO public.migrations VALUES (13, '2026_10_05_000004_create_pages_table', 5);
INSERT INTO public.migrations VALUES (14, '2026_10_28_201218_make_title_nullable_in_sliders_table', 6);
INSERT INTO public.migrations VALUES (15, '2026_10_29_122933_add_details_to_brands_table', 7);
INSERT INTO public.migrations VALUES (16, '2026_10_30_000001_add_showcase_fields_to_vehicles_table', 8);
INSERT INTO public.migrations VALUES (17, '2026_10_31_000001_add_custom_html_and_hero_fields_to_vehicles_table', 9);
INSERT INTO public.migrations VALUES (18, '2026_10_31_000002_create_posts_table', 10);
INSERT INTO public.migrations VALUES (19, '2026_11_02_000001_add_video_url_to_sliders_table', 11);
INSERT INTO public.migrations VALUES (20, '2026_11_04_000001_sync_0km_categories_and_sort_order', 12);
INSERT INTO public.migrations VALUES (21, '2026_11_04_000002_create_or_update_hino_page', 13);
INSERT INTO public.migrations VALUES (22, '2026_11_04_000003_setup_omoda_jaecoo_landing', 14);
INSERT INTO public.migrations VALUES (23, '2026_11_05_000001_setup_toyota_landing', 15);
INSERT INTO public.migrations VALUES (24, '2026_11_09_010002_add_gallery_to_posts_table', 16);
INSERT INTO public.migrations VALUES (25, '2026_11_19_125718_add_group_to_sliders_table', 17);
INSERT INTO public.migrations VALUES (26, '2026_11_19_150000_add_performance_indexes_to_tables', 18);


--
-- Data for Name: pages; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.pages VALUES (6, 'CONSUR Bike', 'consur-bike', 'El Ciclismo estÃ¡ en nuestra sangre â€¢ Corre por nuestras venas â€¢ Vivimos y respiramos ciclismo.', '/images/pages/consurbike-hero.jpg', '<div data-cms-layout="fullwidth" class="w-full bg-white text-slate-900">

    <!-- 1. HERO FULL-WIDTH CON EFECTO PARALLAX -->
    <section class="relative w-full min-h-[440px] md:min-h-[520px] flex items-center bg-fixed bg-cover bg-center overflow-hidden select-none"
             style="background-image: url(''/images/pages/consurbike-hero.jpg'');">
        <div class="absolute inset-0 bg-gradient-to-r from-neutral-950/92 via-neutral-950/75 to-neutral-950/35"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-transparent to-neutral-950/40"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28 w-full">
            <div class="max-w-3xl" data-aos="fade-right">
                <div class="inline-flex items-center gap-3 mb-5 bg-white/10 backdrop-blur-md px-4 py-1.5 border-l-2 border-[#eb0a1e]">
                    <span class="text-[11px] font-bold uppercase tracking-[0.25em] text-white">
                        DivisiÃ³n Oficial Ciclismo &bull; CONSUR S.A.
                    </span>
                </div>

                <h1 class="text-4xl sm:text-5xl md:text-6xl font-light text-white uppercase tracking-normal font-heading leading-[1.06]">
                    CONSUR <span class="font-normal text-[#eb0a1e]">Bike</span>
                </h1>

                <p class="mt-4 text-base sm:text-lg text-slate-300 font-light max-w-2xl leading-relaxed">
                    El Ciclismo estÃ¡ en nuestra sangre &bull; Corre por nuestras venas &bull; Vivimos y respiramos ciclismo.
                </p>

                <div class="mt-8 flex flex-wrap items-center gap-4">
                    <a href="https://www.consurshop.com/deportes/ciclismo"
                       target="_blank" rel="noopener"
                       class="inline-flex items-center gap-3 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-8 py-4 transition-all shadow-lg shadow-red-600/25">
                        <i class="fas fa-bicycle text-sm"></i>
                        <span>Ver Tienda Online</span>
                        <i class="fas fa-external-link-alt text-[10px]"></i>
                    </a>
                    <a href="#escuelas-ciclismo"
                       class="inline-flex items-center gap-2.5 px-7 py-4 bg-white/10 hover:bg-white/20 text-white border border-white/20 text-xs font-bold uppercase tracking-widest backdrop-blur-sm transition-all">
                        <span>Escuelas de Ciclismo</span>
                        <i class="fas fa-arrow-down text-[10px]"></i>
                    </a>
                </div>

                
            </div>
        </div>
    </section>

    <!-- 2. BICICLETAS, ACCESORIOS Y EQUIPAMIENTO SPECIALIZED (FULL-WIDTH BLANCO LIMPIO) -->
    <section class="w-full py-20 md:py-28 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                <div class="lg:col-span-6 space-y-8" data-aos="fade-right">
                    <div>
                        <img src="/images/pages/specialized-logo.png"
                             alt="Specialized - CONSUR Bike"
                             class="h-12 sm:h-14 w-auto object-contain">
                    </div>

                    <div class="space-y-6">
                        <div class="border-l-2 border-[#eb0a1e] pl-6 space-y-2">
                            <h3 class="text-xl font-semibold text-slate-900 font-heading uppercase tracking-wide">
                                Bicicletas y accesorios
                            </h3>
                            <p class="text-sm sm:text-base text-slate-600 leading-relaxed font-light">
                                Tenemos una verdadera pasiÃ³n por traerte los mejores productos y servicios a los mejores precios brindando el mejor asesoramiento acorde a tu necesidad.
                            </p>
                        </div>

                        <div class="border-l-2 border-slate-900 pl-6 space-y-2">
                            <h3 class="text-xl font-semibold text-slate-900 font-heading uppercase tracking-wide">
                                Equipamiento para todos
                            </h3>
                            <p class="text-sm sm:text-base text-slate-600 leading-relaxed font-light">
                                Sin importar tu nivel de novato o profesional, tenemos el equipamiento adecuado para que vivas la experiencia que deseas, de la mano de la mejor marca.
                            </p>
                        </div>
                    </div>

                    <div class="pt-2">
                        <a href="https://www.consurshop.com/deportes/ciclismo"
                           target="_blank" rel="noopener"
                           class="inline-flex items-center gap-3 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-8 py-4 transition shadow-lg shadow-red-600/20">
                            <i class="fas fa-bicycle text-sm"></i>
                            <span>Ver Tienda</span>
                            <i class="fas fa-external-link-alt text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-6 flex items-center justify-center" data-aos="fade-left">
                    <img src="/images/pages/consurbike-bici.png"
                         alt="Bicicletas Specialized en CONSUR Bike"
                         class="w-full max-w-[560px] h-auto object-contain drop-shadow-2xl transform hover:scale-105 transition-transform duration-700">
                </div>
            </div>

            <!-- Descarga de CatÃ¡logos Oficiales (DiseÃ±o ArquitectÃ³nico Minimalista) -->
            <div class="mt-16 pt-12 border-t border-slate-200 grid grid-cols-1 sm:grid-cols-2 gap-6" data-aos="fade-up">
                <a href="/images/pages/catalogo-specialized.pdf"
                   target="_blank" rel="noopener"
                   class="flex items-center justify-between p-7 bg-slate-950 hover:bg-[#eb0a1e] text-white transition-colors duration-300 group">
                    <div class="flex items-center gap-5">
                        <div class="w-12 h-12 bg-white/10 flex items-center justify-center shrink-0">
                            <i class="fas fa-file-pdf text-xl text-[#eb0a1e] group-hover:text-white transition-colors"></i>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400 group-hover:text-red-100 block">CatÃ¡logo Oficial PDF</span>
                            <span class="text-base sm:text-lg font-semibold font-heading uppercase tracking-wide">Descargar CatÃ¡logo Specialized</span>
                        </div>
                    </div>
                    <i class="fas fa-download text-sm opacity-80 group-hover:translate-y-0.5 transition"></i>
                </a>

                <a href="/images/pages/catalogo-ebike.pdf"
                   target="_blank" rel="noopener"
                   class="flex items-center justify-between p-7 bg-slate-950 hover:bg-[#eb0a1e] text-white transition-colors duration-300 group">
                    <div class="flex items-center gap-5">
                        <div class="w-12 h-12 bg-white/10 flex items-center justify-center shrink-0">
                            <i class="fas fa-bolt text-xl text-amber-400 group-hover:text-white transition-colors"></i>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400 group-hover:text-red-100 block">CatÃ¡logo Oficial PDF</span>
                            <span class="text-base sm:text-lg font-semibold font-heading uppercase tracking-wide">Descargar CatÃ¡logo E-Bike</span>
                        </div>
                    </div>
                    <i class="fas fa-download text-sm opacity-80 group-hover:translate-y-0.5 transition"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- 3. CONSUR BIKE KIDS, ESCUELA DE CICLISMO + VIDEO OFICIAL (SECCIÃ“N GRIS CLARO FULL-WIDTH) -->
    <section class="w-full py-20 md:py-28 bg-slate-50 border-b border-slate-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                <div class="lg:col-span-6 space-y-6" data-aos="fade-right">
                    <div class="inline-flex items-center gap-2 text-[#eb0a1e] text-xs font-bold uppercase tracking-[0.2em]">
                        <span class="w-8 h-[2px] bg-[#eb0a1e]"></span>
                        <span>Sembrando Futuros Campeones</span>
                    </div>

                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-slate-900 font-heading uppercase tracking-normal leading-tight">
                        <span class="font-normal text-[#eb0a1e]">CONSUR Bike Kids</span>, escuela de ciclismo
                    </h2>

                    <div class="w-16 h-1 bg-[#eb0a1e]"></div>

                    <div class="space-y-4 text-sm sm:text-base text-slate-600 leading-relaxed font-light">
                        <p>
                            En CONSUR Bike, creemos firmemente en el poder del deporte como semillero de valores y oportunidades para los mÃ¡s jÃ³venes. Nuestra <strong class="text-slate-900 font-medium">Escuela de Ciclismo CONSUR Bike Kids</strong>, dirigida a niÃ±os y niÃ±as de 4 a 14 aÃ±os, es mucho mÃ¡s que clases de ciclismo: es un espacio donde cultivamos la pasiÃ³n por el deporte, el desarrollo integral y los valores fundamentales.
                        </p>
                        <p>
                            Gracias a la valiosa enseÃ±anza de profesores y su equipo, nuestro programa ofrece una variedad de actividades recreativas y deportivas que complementan el aprendizaje del ciclismo. Este proyecto refuerza nuestro compromiso de fomentar la cooperaciÃ³n, el respeto y el esfuerzo desde temprana edad.
                        </p>
                        <div class="p-5 bg-white border-l-4 border-[#eb0a1e] shadow-xs text-slate-800 text-xs sm:text-sm font-medium">
                            <i class="far fa-calendar-check text-[#eb0a1e] mr-1.5"></i>
                            Las clases se desarrollan los dÃ­as <strong>miÃ©rcoles y sÃ¡bados</strong> en el parque de la ciudad de <strong>EncarnaciÃ³n</strong>, y los dÃ­as <strong>jueves y domingos</strong> en la plaza Bernardino Caballero de <strong>Bella Vista</strong>.
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-6" data-aos="fade-left">
                    <div class="aspect-video overflow-hidden shadow-2xl border border-slate-200 bg-slate-950">
                        <iframe class="w-full h-full"
                                src="https://www.youtube.com/embed/7lzYa9eigVo"
                                title="CONSUR Bike Kids - Escuela de Ciclismo"
                                loading="lazy"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. FRANJA FULL-WIDTH ULTRA NÃTIDA: CONSUR BIKE CLUB (2K Ultra-HD + WebP) -->
    <section class="relative w-full py-24 md:py-32 overflow-hidden text-white select-none">
        <!-- Capa de imagen de fondo ultra nÃ­tida de alta resoluciÃ³n -->
        <div class="absolute inset-0 z-0">
            <picture class="w-full h-full block">
                <source srcset="/images/pages/consurbike-club-bg.webp" type="image/webp">
                <img src="/images/pages/consurbike-club-bg.jpg"
                     alt="CONSUR Bike Club"
                     loading="lazy"
                     decoding="async"
                     class="w-full h-full object-cover object-center transform scale-[1.02] transition-transform duration-1000">
            </picture>
            <!-- Degradado cinematogrÃ¡fico de alto contraste -->
            <div class="absolute inset-0 bg-gradient-to-r from-neutral-950/95 via-neutral-950/80 to-neutral-950/50"></div>
            <!-- Brillo ambiental rojo CONSUR -->
            <div class="absolute top-1/2 left-1/3 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[300px] bg-[#eb0a1e]/15 rounded-full blur-3xl pointer-events-none"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-5" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 bg-[#eb0a1e] text-white text-[11px] font-bold uppercase px-3.5 py-1.5 tracking-widest">
                    <i class="fas fa-users"></i>
                    <span>Comunidad Ciclista</span>
                </div>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-light font-heading uppercase tracking-normal">
                    CONSUR Bike <span class="font-normal text-[#eb0a1e]">Club</span>
                </h2>
                <p class="text-base sm:text-lg text-slate-200 font-light leading-relaxed">
                    Buscamos compartir los mejores momentos unidos por nuestro deporte. Hacemos rutas de mountain bike y carretera para todos los niveles y edades. Para nuestros asociados contamos con una amplia gama de beneficios.
                </p>
                <div class="pt-2">
                    <a href="https://www.instagram.com/consurclub/"
                       target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-2.5 px-6 py-3.5 bg-gradient-to-r from-purple-600 via-pink-600 to-rose-500 hover:opacity-95 text-white font-bold text-xs uppercase tracking-wider transition-all duration-300 shadow-lg shadow-pink-500/20">
                        <i class="fab fa-instagram text-base"></i>
                        <span>Seguinos en @consurclub</span>
                        <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. INSCRIPCIONES A LAS ESCUELAS DE CICLISMO (ENCARNACIÃ“N Y BELLA VISTA) -->
    <section id="escuelas-ciclismo" class="w-full py-20 md:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14 space-y-3" data-aos="fade-up">
                <span class="text-xs font-bold uppercase tracking-[0.25em] text-[#eb0a1e] block">Inscripciones Abiertas</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-slate-900 font-heading uppercase tracking-normal">
                    UnÃ­te a Nuestras Escuelas de <span class="font-normal text-[#eb0a1e]">Ciclismo</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Escuela de Ciclismo de EncarnaciÃ³n -->
                <div class="bg-white border border-slate-200 hover:border-[#eb0a1e] shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group" data-aos="fade-up" data-aos-delay="100">
                    <div class="aspect-[16/10] overflow-hidden bg-slate-100">
                        <picture class="w-full h-full block">
                            <source srcset="/images/pages/escuela-encarnacion.webp" type="image/webp">
                            <img src="/images/pages/escuela-encarnacion.jpg"
                                 alt="Escuela de Ciclismo de EncarnaciÃ³n"
                                 loading="lazy"
                                 decoding="async"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                        </picture>
                    </div>
                    <div class="p-7 sm:p-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-t border-slate-100">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e] block">MiÃ©rcoles y SÃ¡bados &bull; Parque de la Ciudad</span>
                            <h3 class="text-lg sm:text-xl font-semibold text-slate-900 font-heading uppercase tracking-wide mt-1">
                                Escuela de Ciclismo de EncarnaciÃ³n
                            </h3>
                        </div>
                        <a href="https://www.race.com.py/register.php?id=13"
                           target="_blank" rel="noopener"
                           class="inline-flex items-center justify-center gap-2 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-6 py-3.5 transition shrink-0 shadow-md shadow-red-600/20">
                            <span>InscribÃ­te AquÃ­</span>
                            <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- Escuela de Ciclismo de Bella Vista (Estructura SimÃ©trica Cuadrada) -->
                <div class="bg-white border border-slate-200 hover:border-[#eb0a1e] shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group" data-aos="fade-up" data-aos-delay="200">
                    <div class="aspect-[16/10] overflow-hidden bg-slate-100">
                        <picture class="w-full h-full block">
                            <source srcset="/images/pages/escuela-bellavista.webp" type="image/webp">
                            <img src="/images/pages/escuela-bellavista.jpg"
                                 alt="Escuela de Ciclismo de Bella Vista"
                                 loading="lazy"
                                 decoding="async"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                        </picture>
                    </div>
                    <div class="p-7 sm:p-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-t border-slate-100">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e] block">Jueves y Domingos &bull; Plaza Bernardino Caballero</span>
                            <h3 class="text-lg sm:text-xl font-semibold text-slate-900 font-heading uppercase tracking-wide mt-1">
                                Escuela de Ciclismo de Bella Vista
                            </h3>
                        </div>
                        <a href="https://www.race.com.py/register.php?id=18"
                           target="_blank" rel="noopener"
                           class="inline-flex items-center justify-center gap-2 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-6 py-3.5 transition shrink-0 shadow-md shadow-red-600/20">
                            <span>InscribÃ­te AquÃ­</span>
                            <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. CANAL OFICIAL YOUTUBE @RACEPARAGUAY (INFORMACIÃ“N Y SUSCRIPCIÃ“N) -->
    <!-- 5. COMUNIDAD Y REDES SOCIALES CONSUR BIKE -->
    <section id="comunidad-consurbike" class="w-full py-16 md:py-24 bg-slate-950 text-white border-t border-slate-900 relative overflow-hidden select-none">
        <!-- Resplandor sutil de fondo -->
        <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-[#eb0a1e]/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -left-20 -top-20 w-80 h-80 bg-purple-600/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Header de la secciÃ³n -->
            <div class="text-center max-w-3xl mx-auto mb-14 space-y-3" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 bg-[#eb0a1e] text-white text-[11px] font-bold uppercase px-3.5 py-1.5 tracking-widest">
                    <i class="fas fa-hashtag"></i>
                    <span>Comunidad Ciclista en Redes</span>
                </div>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-light font-heading uppercase tracking-normal text-white">
                    SeguÃ­ a <span class="font-normal text-[#eb0a1e]">CONSUR Bike</span> en Instagram
                </h2>
                <p class="text-sm sm:text-base text-slate-300 font-light leading-relaxed">
                    FormÃ¡ parte del movimiento ciclista en el sur del paÃ­s. Enterate de las Ãºltimas novedades en bicicletas, indumentaria oficial, eventos del club y salidas grupales.
                </p>
            </div>

            <!-- Grid de 3 Cuentas Oficiales de Instagram -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <!-- Card 1: CONSUR Bike Oficial -->
                <div class="bg-neutral-900/90 border border-slate-800 hover:border-[#eb0a1e]/60 p-7 flex flex-col justify-between transition-all duration-300 group hover:-translate-y-1 shadow-lg" data-aos="fade-up" data-aos-delay="100">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-[#fd5949] via-[#d6249f] to-[#285AEB] flex items-center justify-center shadow-md">
                                <i class="fab fa-instagram text-2xl text-white"></i>
                            </div>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e] bg-[#eb0a1e]/10 px-2.5 py-1 border border-[#eb0a1e]/20">
                                Bicicletas & Tienda
                            </span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white font-heading uppercase tracking-wide">CONSUR Bike Oficial</h3>
                            <span class="text-xs text-slate-400 font-mono">@consurbike</span>
                        </div>
                        <p class="text-xs sm:text-sm text-slate-300 font-light leading-relaxed">
                            Bicicletas de montaÃ±a, ruta y gravel, equipamiento tÃ©cnico, repuestos originales y todas las novedades del salÃ³n de ventas.
                        </p>
                    </div>
                    <div class="pt-6">
                        <a href="https://www.instagram.com/consurbike/"
                           target="_blank" rel="noopener noreferrer"
                           class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-purple-600 via-pink-600 to-rose-500 hover:opacity-95 text-white font-bold text-xs uppercase tracking-wider py-3.5 px-4 transition-all duration-300 shadow-md">
                            <i class="fab fa-instagram text-sm"></i>
                            <span>Seguir @consurbike</span>
                            <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 2: Race Sport Paraguay -->
                <div class="bg-neutral-900/90 border border-slate-800 hover:border-[#eb0a1e]/60 p-7 flex flex-col justify-between transition-all duration-300 group hover:-translate-y-1 shadow-lg" data-aos="fade-up" data-aos-delay="200">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-[#fd5949] via-[#d6249f] to-[#285AEB] flex items-center justify-center shadow-md">
                                <i class="fab fa-instagram text-2xl text-white"></i>
                            </div>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e] bg-[#eb0a1e]/10 px-2.5 py-1 border border-[#eb0a1e]/20">
                                Indumentaria Deportiva
                            </span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white font-heading uppercase tracking-wide">Race Sport Paraguay</h3>
                            <span class="text-xs text-slate-400 font-mono">@racesportpy</span>
                        </div>
                        <p class="text-xs sm:text-sm text-slate-300 font-light leading-relaxed">
                            Ropa deportiva tÃ©cnica, maillots, calzas, guantes, cascos y accesorios de alto rendimiento para el ciclista exigente.
                        </p>
                    </div>
                    <div class="pt-6">
                        <a href="https://www.instagram.com/racesportpy/"
                           target="_blank" rel="noopener noreferrer"
                           class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-purple-600 via-pink-600 to-rose-500 hover:opacity-95 text-white font-bold text-xs uppercase tracking-wider py-3.5 px-4 transition-all duration-300 shadow-md">
                            <i class="fab fa-instagram text-sm"></i>
                            <span>Seguir @racesportpy</span>
                            <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 3: CONSUR Bike Club -->
                <div class="bg-neutral-900/90 border border-slate-800 hover:border-[#eb0a1e]/60 p-7 flex flex-col justify-between transition-all duration-300 group hover:-translate-y-1 shadow-lg" data-aos="fade-up" data-aos-delay="300">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-[#fd5949] via-[#d6249f] to-[#285AEB] flex items-center justify-center shadow-md">
                                <i class="fab fa-instagram text-2xl text-white"></i>
                            </div>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e] bg-[#eb0a1e]/10 px-2.5 py-1 border border-[#eb0a1e]/20">
                                Comunidad & Rutas
                            </span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white font-heading uppercase tracking-wide">CONSUR Bike Club</h3>
                            <span class="text-xs text-slate-400 font-mono">@consurclub</span>
                        </div>
                        <p class="text-xs sm:text-sm text-slate-300 font-light leading-relaxed">
                            Comunidad de ciclistas, salidas grupales por rutas y caminos de ItapÃºa, clÃ­nicas de manejo y eventos recreativos y competitivos.
                        </p>
                    </div>
                    <div class="pt-6">
                        <a href="https://www.instagram.com/consurclub/"
                           target="_blank" rel="noopener noreferrer"
                           class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-purple-600 via-pink-600 to-rose-500 hover:opacity-95 text-white font-bold text-xs uppercase tracking-wider py-3.5 px-4 transition-all duration-300 shadow-md">
                            <i class="fab fa-instagram text-sm"></i>
                            <span>Seguir @consurclub</span>
                            <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- YouTube Channel Banner (RACE PARAGUAY) -->
            <div class="bg-neutral-900/90 border border-slate-800 p-8 sm:p-10 flex flex-col lg:flex-row lg:items-center justify-between gap-8" data-aos="fade-up">
                <div class="max-w-2xl space-y-3">
                    <div class="inline-flex items-center gap-2 bg-red-600 text-white text-[11px] font-bold uppercase px-3 py-1 tracking-widest">
                        <i class="fab fa-youtube text-sm"></i>
                        <span>Canal Oficial de YouTube</span>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-light font-heading uppercase tracking-normal text-white">
                        SeguÃ­ la PasiÃ³n del Ciclismo en <span class="font-normal text-[#eb0a1e]">@RACEPARAGUAY</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-300 font-light leading-relaxed">
                        Coberturas completas de carreras nacionales, el Panamericano de MTB, clÃ­nicas tÃ©cnicas y el dÃ­a a dÃ­a de nuestras escuelas de ciclismo.
                    </p>
                </div>
                <div class="shrink-0 flex items-center">
                    <a href="https://www.youtube.com/@RACEPARAGUAY?sub_confirmation=1"
                       target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center justify-center gap-2.5 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-7 py-4 transition-all duration-300 shadow-lg shadow-red-600/25">
                        <i class="fab fa-youtube text-base"></i>
                        <span>Suscribirse a YouTube</span>
                        <i class="fas fa-external-link-alt text-[10px]"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>', 'Consur Bike â€“ Bicicletas Specialized, Accesorios y Escuela de Ciclismo | Consur S.A.', 'Consur Bike: distribuidor oficial de bicicletas y equipamiento Specialized, E-Bikes, Consur Bike Kids y Consur Bike Club en EncarnaciÃ³n y Bella Vista.', true, 6, '2026-10-29 13:42:38', '2026-11-18 10:40:04');
INSERT INTO public.pages VALUES (9, 'OMODA & JAECOO â€“ Modelos J5 y J7', 'omoda-jaecoo', 'De lo ClÃ¡sico MÃ¡s AllÃ¡ de lo ClÃ¡sico. SUVs hÃ­bridos de vanguardia, lujo inteligente y espÃ­ritu off-road en Consur S.A.', '/images/omoda-jaecoo/banner-hero.jpg', '<!-- Landing exclusiva oscura gestionada via App\Livewire\Frontend\OmodaJaecoo -->', 'OMODA & JAECOO Paraguay | Modelos J5 y J7 en Consur S.A.', 'De lo clÃ¡sico mÃ¡s allÃ¡ de lo clÃ¡sico. DescubrÃ­ los SUVs hÃ­bridos de lujo y aventura JAECOO J5 y JAECOO J7 con el respaldo oficial de Consur S.A.', true, 5, '2026-11-05 02:30:01', '2026-11-05 02:30:01');
INSERT INTO public.pages VALUES (8, 'Camiones HINO â€“ Grupo Toyota', 'hino', 'Mayor fabricante japonÃ©s de camiones para servicio comercial. MÃ¡xima durabilidad, Soporte Total y los tres modelos oficiales disponibles en Paraguay.', '/images/hino/banner-hero.jpg', '<div data-cms-layout="fullwidth" class="w-full bg-white text-slate-900">

    <!-- 1. HERO FULL-WIDTH CON EFECTO PARALLAX -->
    <section class="relative w-full min-h-[440px] md:min-h-[520px] flex items-center bg-fixed bg-cover bg-center overflow-hidden select-none"
             style="background-image: url(''/images/hino/banner-hero.jpg'');">
        <div class="absolute inset-0 bg-gradient-to-r from-neutral-950/92 via-neutral-950/75 to-neutral-950/35"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-transparent to-neutral-950/40"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28 w-full">
            <div class="max-w-3xl" data-aos="fade-right">
                <div class="inline-flex items-center gap-3 mb-5 bg-white/10 backdrop-blur-md px-4 py-1.5 border-l-2 border-[#eb0a1e]">
                    <span class="text-[11px] font-bold uppercase tracking-[0.25em] text-white">
                        Grupo Toyota &bull; Calidad Japonesa
                    </span>
                </div>

                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-white uppercase tracking-tight font-heading leading-[1.06]">
                    Camiones <span class="text-[#eb0a1e]">HINO</span>
                </h1>

                <p class="mt-4 text-base sm:text-lg text-slate-300 font-light max-w-2xl leading-relaxed">
                    Mayor fabricante japonÃ©s de camiones para servicio comercial. MÃ¡xima durabilidad, Soporte Total y los tres modelos oficiales disponibles en Paraguay.
                </p>

                <div class="mt-8 flex flex-wrap items-center gap-4">
                    <a href="#modelos-hino"
                       class="inline-flex items-center gap-2.5 px-7 py-3.5 bg-[#eb0a1e] hover:bg-red-700 text-white text-xs font-bold uppercase tracking-widest transition-all shadow-lg shadow-red-600/25">
                        <span>Ver Modelos Disponibles</span>
                        <i class="fas fa-arrow-down text-[10px]"></i>
                    </a>
                    <a href="https://wa.me/595985804106?text=Hola%20Consur%2C%20quisiera%20asesoramiento%20y%20cotizaci%C3%B3n%20sobre%20camiones%20HINO."
                       target="_blank"
                       class="inline-flex items-center gap-2.5 px-7 py-3.5 bg-white/10 hover:bg-white/20 text-white border border-white/20 text-xs font-bold uppercase tracking-widest backdrop-blur-sm transition-all">
                        <i class="fab fa-whatsapp text-emerald-400 text-sm"></i>
                        <span>Solicitar CotizaciÃ³n</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. BLOQUE INTRODUCTORIO: HINO MOTORS & GRUPO TOYOTA (FULL-WIDTH BLANCO LIMPIO) -->
    <section class="w-full py-20 md:py-28 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                <div class="lg:col-span-7 space-y-6" data-aos="fade-right">
                    <div class="inline-flex items-center gap-4">
                        <img src="/images/hino/logo.png" alt="Hino Logo" class="h-9 sm:h-11 w-auto object-contain">
                        <span class="h-6 w-px bg-slate-200"></span>
                        <span class="text-xs uppercase font-bold tracking-[0.2em] text-[#eb0a1e]">
                            Grupo Toyota &bull; JapÃ³n
                        </span>
                    </div>

                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-slate-900 font-heading uppercase tracking-tight leading-tight">
                        El mayor fabricante de camiones para servicio comercial de JapÃ³n
                    </h2>

                    <div class="w-16 h-1 bg-[#eb0a1e]"></div>

                    <p class="text-base sm:text-lg font-medium text-slate-800">
                        Potencia, durabilidad inquebrantable y el respaldo integral de Soporte Total para tu negocio.
                    </p>

                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                        <strong class="text-slate-900">HINO</strong>, la prestigiosa divisiÃ³n de camiones comerciales de <strong class="text-slate-900">Toyota Group</strong>, es sinÃ³nimo de eficiencia, resistencia y rentabilidad operativa a nivel global. A travÃ©s de <strong class="text-slate-900">CONSUR S.A.</strong>, te acercamos a Paraguay la lÃ­nea completa de camiones diseÃ±ados para cumplir con las mÃ¡s altas exigencias de transporte, distribuciÃ³n urbana y logÃ­stica pesada.
                    </p>
                </div>

                <div class="lg:col-span-5" data-aos="fade-left">
                    <div class="relative overflow-hidden shadow-2xl border border-slate-200 group">
                        <img src="/images/hino/hino-editada.jpg"
                             alt="Camiones Hino en Paraguay"
                             class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-slate-950/95 via-slate-950/60 to-transparent p-6 border-t border-white/10">
                            <span class="text-white text-xs font-bold tracking-widest uppercase block">
                                GarantÃ­a Oficial de 3 AÃ±os o 100.000 Km
                            </span>
                            <span class="text-slate-300 text-xs block mt-1">
                                Respaldo de fÃ¡brica y servicio de posventa garantizado
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. PILARES DE LA MARCA HINO (SECCIÃ“N GRIS CLARO MINIMALISTA) -->
    <section class="w-full py-20 md:py-28 bg-slate-50 border-b border-slate-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-3" data-aos="fade-up">
                <span class="text-xs uppercase font-bold tracking-[0.25em] text-[#eb0a1e] block">
                    Ventajas Competitivas Hino
                </span>
                <h3 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-slate-900 font-heading uppercase tracking-tight">
                    Por QuÃ© Elegir un CamiÃ³n <span class="text-[#eb0a1e]">HINO</span>
                </h3>
                <p class="text-sm sm:text-base text-slate-500">
                    La fÃ³rmula de valor que asegura la mÃ¡xima rentabilidad y el menor costo operativo por kilÃ³metro recorrido.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-px bg-slate-200 border border-slate-200 shadow-sm">
                <!-- Pilar 1: Soporte Total -->
                <div class="bg-white p-8 sm:p-10 space-y-4 hover:bg-slate-50/60 transition-colors relative group" data-aos="fade-up" data-aos-delay="50">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-transparent group-hover:bg-[#eb0a1e] transition-colors"></div>
                    <div class="w-12 h-12 bg-red-50 text-[#eb0a1e] flex items-center justify-center text-xl">
                        <i class="fas fa-handshake-angle"></i>
                    </div>
                    <h4 class="text-base font-bold text-slate-900 font-heading uppercase tracking-wide">
                        Soporte Total (Total Support)
                    </h4>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Al adquirir un camiÃ³n Hino usted accede al sistema de Soporte Total. Nuestro objetivo es que su unidad estÃ© trabajando siempre, minimizando tiempos de inactividad tÃ©cnica para mantener su productividad activa.
                    </p>
                </div>

                <!-- Pilar 2: QDR Durabilidad -->
                <div class="bg-white p-8 sm:p-10 space-y-4 hover:bg-slate-50/60 transition-colors relative group" data-aos="fade-up" data-aos-delay="100">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-transparent group-hover:bg-[#eb0a1e] transition-colors"></div>
                    <div class="w-12 h-12 bg-red-50 text-[#eb0a1e] flex items-center justify-center text-xl">
                        <i class="fas fa-shield-halved"></i>
                    </div>
                    <h4 class="text-base font-bold text-slate-900 font-heading uppercase tracking-wide">
                        QDR: Calidad y Durabilidad
                    </h4>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Los camiones Hino ofrecen durabilidad sin lÃ­mites. Chasis reforzado, componentes sobredimensionados y una rigurosa manufactura japonesa garantizan confiabilidad extrema incluso en faenas severas.
                    </p>
                </div>

                <!-- Pilar 3: Hino Eco Drive -->
                <div class="bg-white p-8 sm:p-10 space-y-4 hover:bg-slate-50/60 transition-colors relative group" data-aos="fade-up" data-aos-delay="150">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-transparent group-hover:bg-emerald-600 transition-colors"></div>
                    <div class="w-12 h-12 bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h4 class="text-base font-bold text-slate-900 font-heading uppercase tracking-wide">
                        Hino Eco Drive
                    </h4>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Equipados con tecnologÃ­a de avanzada para proveer bajas emisiones y una Ã³ptima eficiencia en el consumo de combustible, complementado con recomendaciones y seminarios de conducciÃ³n ecolÃ³gica.
                    </p>
                </div>

                <!-- Pilar 4: GarantÃ­a y Respaldo Oficial -->
                <div class="bg-white p-8 sm:p-10 space-y-4 hover:bg-slate-50/60 transition-colors relative group" data-aos="fade-up" data-aos-delay="200">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-transparent group-hover:bg-[#eb0a1e] transition-colors"></div>
                    <div class="w-12 h-12 bg-red-50 text-[#eb0a1e] flex items-center justify-center text-xl">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h4 class="text-base font-bold text-slate-900 font-heading uppercase tracking-wide">
                        GarantÃ­a 3 AÃ±os o 100.000 Km
                    </h4>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Tenga la tranquilidad de contar con el respaldo institucional mÃ¡s sÃ³lido del paÃ­s, provisiÃ³n permanente de repuestos genuinos y talleres autorizados con tÃ©cnicos capacitados en fÃ¡brica.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. FRANJA PARALLAX FULL-WIDTH: ADN RALLY DAKAR (SIN BORDES REDONDEADOS) -->
    <section class="relative w-full py-24 md:py-32 bg-fixed bg-cover bg-center overflow-hidden text-white"
             style="background-image: url(''/images/hino/banner-dakar.jpg'');">
        <div class="absolute inset-0 bg-gradient-to-r from-neutral-950/95 via-neutral-950/85 to-neutral-950/40"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl space-y-5" data-aos="fade-right">
                <div class="inline-flex items-center gap-2 bg-[#eb0a1e] text-white text-[11px] font-extrabold uppercase px-3.5 py-1.5 tracking-widest">
                    <i class="fas fa-trophy"></i>
                    <span>EspÃ­ritu & Resistencia Dakar</span>
                </div>

                <h3 class="text-3xl sm:text-4xl md:text-5xl font-extrabold uppercase tracking-tight font-heading leading-tight">
                    Probado en la carrera mÃ¡s dura del mundo
                </h3>

                <p class="text-sm sm:text-base text-neutral-300 leading-relaxed font-light">
                    El equipo <strong class="text-white font-semibold">Hino Dakar</strong> ha participado ininterrumpidamente en mÃ¡s de 25 ediciones del Rally Dakar, completando siempre las etapas mÃ¡s inclementes del planeta. Este rÃ©cord histÃ³rico es el resultado directo de la alta resistencia, robustez mecÃ¡nica y calidad japonesa que define a cada camiÃ³n Hino que trabaja en nuestras rutas.
                </p>

                <div class="pt-4 flex flex-wrap items-center gap-8 text-xs font-bold uppercase tracking-wider text-neutral-200 border-t border-white/15">
                    <div class="flex items-center gap-2.5">
                        <i class="fas fa-check text-[#eb0a1e]"></i>
                        <span>+25 Ediciones consecutivas</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <i class="fas fa-check text-[#eb0a1e]"></i>
                        <span>Fiabilidad bajo condiciones extremas</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. MODELOS DISPONIBLES EN PARAGUAY (SERIE 200, SERIE 300, SERIE 500) -->
    <section id="modelos-hino" class="w-full py-20 md:py-28 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-3" data-aos="fade-up">
                <span class="text-xs uppercase font-bold tracking-[0.25em] text-[#eb0a1e] block">
                    LÃ­nea Comercial Oficial
                </span>
                <h3 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-slate-900 font-heading uppercase tracking-tight">
                    Los 3 Modelos Disponibles en <span class="text-[#eb0a1e]">Paraguay</span>
                </h3>
                <p class="text-sm sm:text-base text-slate-500">
                    Soluciones a medida para cada escala de carga: desde transporte urbano Ã¡gil hasta logÃ­stica semipesada interurbana.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- MODELO 1: HINO SERIE 200 -->
                <div class="bg-white border border-slate-200 hover:border-slate-400 transition-all duration-300 flex flex-col justify-between group shadow-xs hover:shadow-xl" data-aos="fade-up" data-aos-delay="50">
                    <div>
                        <div class="relative aspect-[16/10] bg-slate-100 overflow-hidden">
                            <img src="/images/hino/hino200.jpg" alt="Hino Serie 200" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute top-0 left-0 bg-[#eb0a1e] text-white text-[10px] font-extrabold uppercase px-3.5 py-1.5 tracking-widest">
                                Serie 200 &bull; Ligero Urbano
                            </div>
                            <div class="absolute bottom-0 right-0 bg-slate-950/90 text-white text-xs font-bold px-4 py-1.5">
                                Carga: 2.200 Kg
                            </div>
                        </div>

                        <div class="p-7 sm:p-8 space-y-5">
                            <div>
                                <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Modelo 410</span>
                                <h4 class="text-2xl font-extrabold text-slate-900 font-heading uppercase mt-0.5">
                                    HINO Serie 200
                                </h4>
                            </div>

                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                Un vehÃ­culo HINO 200 es garantÃ­a de calidad y satisfacciÃ³n. No es sÃ³lo un camiÃ³n, es un conjunto de grandes beneficios a largo plazo. CamiÃ³n ligero de alta eficiencia, bajo consumo de combustible, motor de bajas emisiones, alta maniobrabilidad, ideal para espacios reducidos, confortable y con bajos costos de mantenimiento.
                            </p>

                            <div class="space-y-2.5 pt-4 border-t border-slate-100 text-xs text-slate-700">
                                <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                                    <span class="font-medium text-slate-500">Capacidad de carga:</span>
                                    <span class="font-bold text-slate-900">2.200 Kg</span>
                                </div>
                                <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                                    <span class="font-medium text-slate-500">ConfiguraciÃ³n:</span>
                                    <span class="font-bold text-slate-900">Eje Simple</span>
                                </div>
                                <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                                    <span class="font-medium text-slate-500">Capacidad eje trasero:</span>
                                    <span class="font-bold text-slate-900">4.300 Kg</span>
                                </div>
                                <div class="flex items-center justify-between py-1.5">
                                    <span class="font-medium text-slate-500">AplicaciÃ³n:</span>
                                    <span class="font-bold text-[#eb0a1e]">Reparto Urbano y Fletes</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-7 sm:p-8 pt-0">
                        <a href="https://wa.me/595985804106?text=Hola%20Consur%2C%20quisiera%20cotizar%20el%20cami%C3%B3n%20HINO%20Serie%20200%20(Modelo%20410)."
                           target="_blank"
                           class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-slate-900 hover:bg-[#eb0a1e] text-white text-xs font-bold uppercase tracking-widest transition-colors">
                            <i class="fab fa-whatsapp text-sm"></i>
                            <span>Cotizar Serie 200</span>
                        </a>
                    </div>
                </div>

                <!-- MODELO 2: HINO SERIE 300 -->
                <div class="bg-white border border-slate-200 hover:border-slate-400 transition-all duration-300 flex flex-col justify-between group shadow-xs hover:shadow-xl" data-aos="fade-up" data-aos-delay="150">
                    <div>
                        <div class="relative aspect-[16/10] bg-slate-100 overflow-hidden">
                            <img src="/images/hino/hino300-814.jpg" alt="Hino Serie 300" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute top-0 left-0 bg-[#eb0a1e] text-white text-[10px] font-extrabold uppercase px-3.5 py-1.5 tracking-widest">
                                Serie 300 &bull; Mediano VersÃ¡til
                            </div>
                            <div class="absolute bottom-0 right-0 bg-slate-950/90 text-white text-xs font-bold px-4 py-1.5">
                                Carga: 2.500 a 6.000 Kg
                            </div>
                        </div>

                        <div class="p-7 sm:p-8 space-y-5">
                            <div>
                                <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Modelos 512 &bull; 711 &bull; 814</span>
                                <h4 class="text-2xl font-extrabold text-slate-900 font-heading uppercase mt-0.5">
                                    HINO Serie 300
                                </h4>
                            </div>

                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                Si su objetivo fuera solamente el de acarrear cargas, no habrÃ­a razÃ³n de seleccionar este camiÃ³n. Este camiÃ³n genera niveles bajos de emisiÃ³n, contribuyendo al cuidado del medio ambiente, y su bajo nivel de consumo lo hace altamente eficiente. Su cabina fue diseÃ±ada desde la perspectiva de prevenir accidentes, con mÃ¡xima seguridad y ergonomÃ­a.
                            </p>

                            <div class="space-y-2.5 pt-4 border-t border-slate-100 text-xs text-slate-700">
                                <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                                    <span class="font-medium text-slate-500">Modelo 512:</span>
                                    <span class="font-bold text-slate-900">2.500 Kg (Eje Simple)</span>
                                </div>
                                <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                                    <span class="font-medium text-slate-500">Modelo 711:</span>
                                    <span class="font-bold text-slate-900">4.500 Kg (Eje Dual)</span>
                                </div>
                                <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                                    <span class="font-medium text-slate-500">Modelo 814:</span>
                                    <span class="font-bold text-slate-900">6.000 Kg (Eje Dual)</span>
                                </div>
                                <div class="flex items-center justify-between py-1.5">
                                    <span class="font-medium text-slate-500">AplicaciÃ³n:</span>
                                    <span class="font-bold text-[#eb0a1e]">DistribuciÃ³n Media y LogÃ­stica</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-7 sm:p-8 pt-0">
                        <a href="https://wa.me/595985804106?text=Hola%20Consur%2C%20quisiera%20cotizar%20el%20cami%C3%B3n%20HINO%20Serie%20300."
                           target="_blank"
                           class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-slate-900 hover:bg-[#eb0a1e] text-white text-xs font-bold uppercase tracking-widest transition-colors">
                            <i class="fab fa-whatsapp text-sm"></i>
                            <span>Cotizar Serie 300</span>
                        </a>
                    </div>
                </div>

                <!-- MODELO 3: HINO SERIE 500 -->
                <div class="bg-white border border-slate-200 hover:border-slate-400 transition-all duration-300 flex flex-col justify-between group shadow-xs hover:shadow-xl" data-aos="fade-up" data-aos-delay="250">
                    <div>
                        <div class="relative aspect-[16/10] bg-slate-100 overflow-hidden">
                            <img src="/images/hino/hino500-1018.jpg" alt="Hino Serie 500" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute top-0 left-0 bg-[#eb0a1e] text-white text-[10px] font-extrabold uppercase px-3.5 py-1.5 tracking-widest">
                                Serie 500 &bull; Carga Pesada
                            </div>
                            <div class="absolute bottom-0 right-0 bg-slate-950/90 text-white text-xs font-bold px-4 py-1.5">
                                Carga: 8.500 Kg
                            </div>
                        </div>

                        <div class="p-7 sm:p-8 space-y-5">
                            <div>
                                <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Modelo 1018</span>
                                <h4 class="text-2xl font-extrabold text-slate-900 font-heading uppercase mt-0.5">
                                    HINO Serie 500
                                </h4>
                            </div>

                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                El Nuevo Hino 500 presenta un diseÃ±o aerodinÃ¡mico y al mismo tiempo fuerte y robusto. Fiel a su legendaria tradiciÃ³n de durabilidad, resistencia y confiabilidad a toda prueba, el Hino 500 se constituye en uno de los modelos mÃ¡s apreciados en el segmento de los camiones medianos y semipesados. Cuando usted elige un Hino, sus negocios tienen el mejor respaldo.
                            </p>

                            <div class="space-y-2.5 pt-4 border-t border-slate-100 text-xs text-slate-700">
                                <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                                    <span class="font-medium text-slate-500">Capacidad de carga:</span>
                                    <span class="font-bold text-slate-900">8.500 Kg</span>
                                </div>
                                <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                                    <span class="font-medium text-slate-500">ConfiguraciÃ³n:</span>
                                    <span class="font-bold text-slate-900">Eje Dual Reforzado</span>
                                </div>
                                <div class="flex items-center justify-between py-1.5 border-b border-slate-100">
                                    <span class="font-medium text-slate-500">Rendimiento:</span>
                                    <span class="font-bold text-slate-900">Alto torque y bajo costo/km</span>
                                </div>
                                <div class="flex items-center justify-between py-1.5">
                                    <span class="font-medium text-slate-500">AplicaciÃ³n:</span>
                                    <span class="font-bold text-[#eb0a1e]">Interurbano, Agro e Industria</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-7 sm:p-8 pt-0">
                        <a href="https://wa.me/595985804106?text=Hola%20Consur%2C%20quisiera%20cotizar%20el%20cami%C3%B3n%20HINO%20Serie%20500%20(Modelo%201018)."
                           target="_blank"
                           class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-slate-900 hover:bg-[#eb0a1e] text-white text-xs font-bold uppercase tracking-widest transition-colors">
                            <i class="fab fa-whatsapp text-sm"></i>
                            <span>Cotizar Serie 500</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 6. TALLERES CERTIFICADOS & REPUESTOS GENUINOS (SECCIÃ“N GRIS CLARO FULL-WIDTH) -->
    <section class="w-full py-20 md:py-28 bg-slate-50 border-b border-slate-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-6 space-y-6" data-aos="fade-right">
                    <div class="inline-flex items-center gap-2 text-[#eb0a1e] text-xs font-bold uppercase tracking-[0.2em]">
                        <span class="w-8 h-[2px] bg-[#eb0a1e]"></span>
                        <span>Posventa Oficial Especializada</span>
                    </div>

                    <h3 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-slate-900 font-heading uppercase tracking-tight leading-tight">
                        Talleres Certificados & Repuestos Genuinos Hino
                    </h3>

                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                        Contamos con talleres exclusivos con certificaciÃ³n de calidad y un equipo de tÃ©cnicos especializados y capacitados en Hino para brindarle un servicio de excelencia. Garantizamos la tranquilidad operativa de su flota con diagnÃ³sticos precisos, mantenimiento preventivo y repuestos 100% legÃ­timos que protegen el valor y la vida Ãºtil de su inversiÃ³n.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 text-xs sm:text-sm font-semibold text-slate-800">
                        <div class="flex items-center gap-3 p-3.5 bg-white border-l-2 border-[#eb0a1e] shadow-2xs">
                            <i class="fas fa-check text-[#eb0a1e]"></i>
                            <span>TÃ©cnicos certificados por fÃ¡brica</span>
                        </div>
                        <div class="flex items-center gap-3 p-3.5 bg-white border-l-2 border-[#eb0a1e] shadow-2xs">
                            <i class="fas fa-check text-[#eb0a1e]"></i>
                            <span>Stock permanente de repuestos</span>
                        </div>
                        <div class="flex items-center gap-3 p-3.5 bg-white border-l-2 border-[#eb0a1e] shadow-2xs">
                            <i class="fas fa-check text-[#eb0a1e]"></i>
                            <span>Mantenimiento express para flotas</span>
                        </div>
                        <div class="flex items-center gap-3 p-3.5 bg-white border-l-2 border-[#eb0a1e] shadow-2xs">
                            <i class="fas fa-check text-[#eb0a1e]"></i>
                            <span>Respaldo oficial de CONSUR S.A.</span>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-6" data-aos="fade-left">
                    <div class="overflow-hidden shadow-xl border border-slate-200">
                        <img src="/images/hino/talleres.jpg?v=2" alt="Taller Oficial Hino" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. BANNER FINAL CALL TO ACTION FULL-WIDTH (SIN BORDES REDONDEADOS) -->
    <section class="w-full py-20 md:py-24 bg-neutral-950 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6" data-aos="fade-up">
            <span class="text-xs uppercase font-extrabold tracking-[0.25em] text-[#eb0a1e] block">
                AtenciÃ³n Comercial & Flotas
            </span>
            <h3 class="text-2xl sm:text-3xl md:text-4xl font-extrabold uppercase tracking-tight font-heading">
                Â¿NecesitÃ¡s asesoramiento para tu prÃ³ximo camiÃ³n?
            </h3>
            <p class="text-sm sm:text-base text-slate-400 max-w-2xl mx-auto font-light leading-relaxed">
                Contactate con nuestros asesores comerciales corporativos de CONSUR S.A. y recibÃ­ una cotizaciÃ³n adaptada a las necesidades de carga y transporte de tu empresa.
            </p>
            <div class="pt-4 flex flex-wrap items-center justify-center gap-4">
                <a href="https://wa.me/595985804106?text=Hola%20Consur%2C%20solicito%20presupuesto%20para%20camiones%20HINO."
                   target="_blank"
                   class="inline-flex items-center gap-2.5 px-8 py-4 bg-[#eb0a1e] hover:bg-red-700 text-white text-xs font-bold uppercase tracking-widest shadow-lg shadow-red-600/25 transition-all">
                    <i class="fab fa-whatsapp text-base"></i>
                    <span>Hablar con un Asesor Hino</span>
                </a>
                <a href="tel:+59571204106"
                   class="inline-flex items-center gap-2.5 px-8 py-4 bg-white/10 hover:bg-white/20 text-white border border-white/15 text-xs font-bold uppercase tracking-widest transition-all">
                    <i class="fas fa-phone-alt"></i>
                    <span>Llamar al +595 71 204 106</span>
                </a>
            </div>
        </div>
    </section>

</div>', 'Camiones HINO en Paraguay â€“ Serie 200, 300 y 500 | Consur S.A.', 'Concesionario Oficial de Camiones HINO (Grupo Toyota) en Paraguay. DescubrÃ­ los modelos Serie 200, Serie 300 y Serie 500 con GarantÃ­a de 3 aÃ±os o 100.000 Km y Soporte Total.', true, 4, '2026-11-05 02:05:13', '2026-11-18 02:04:59');
INSERT INTO public.pages VALUES (1, 'La Empresa â€“ CONSUR S.A.', 'la-empresa', 'Desde 1977, en el corazÃ³n de EncarnaciÃ³n, Consur ha sido sinÃ³nimo de confianza, calidad y liderazgo en la industria automotriz del sur de Paraguay, consolidando 50 aÃ±os de trayectoria.', '/images/pages/la-empresa/consurcentral.jpg', '<div data-cms-layout="fullwidth" class="w-full" x-data="{ lightboxOpen: false, lightboxSrc: '''', lightboxTitle: '''' }">

    <!-- 1. HERO INSTITUCIONAL ULTRA NÃTIDO (2K Ultra-HD + Picture WebP/JPG) -->
    <section class="relative w-full min-h-[440px] md:min-h-[520px] flex items-center overflow-hidden select-none">
        <!-- Capa de imagen de fondo ultra nÃ­tida de alta resoluciÃ³n -->
        <div class="absolute inset-0 z-0">
            <picture class="w-full h-full block">
                <source srcset="/images/pages/la-empresa/fachadaConsurCentral.webp" type="image/webp">
                <img src="/images/pages/la-empresa/fachadaConsurCentral.jpg"
                     alt="CONSUR S.A. Casa Central EncarnaciÃ³n"
                     fetchpriority="high"
                     decoding="async"
                     class="w-full h-full object-cover object-center transform scale-[1.02] transition-transform duration-1000">
            </picture>
            <!-- Capas de contraste cinematogrÃ¡fico y viÃ±eteado elegante -->
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950/95 via-slate-950/80 to-slate-950/45"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-slate-950/40"></div>
            <!-- DecoraciÃ³n geomÃ©trica sutil -->
            <div class="absolute -bottom-24 -right-24 w-96 h-96 rounded-full bg-[#eb0a1e]/15 blur-3xl pointer-events-none"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28 w-full">
            <div class="max-w-3xl">
                <!-- Breadcrumb & Badge -->
                <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15 mb-6" data-aos="fade-down">
                    <span class="w-2 h-2 rounded-full bg-[#eb0a1e] animate-pulse"></span>
                    <span class="text-[11px] font-bold uppercase tracking-[0.22em] text-white/90">
                        Desde 1977 &bull; 50 AÃ±os de Trayectoria
                    </span>
                </div>

                <h1 class="text-4xl sm:text-5xl md:text-6xl font-light text-white uppercase tracking-normal font-heading leading-[1.08]" data-aos="fade-up" data-aos-delay="100">
                    La <span class="font-normal text-[#eb0a1e]">Empresa</span>
                </h1>

                <p class="mt-4 text-base sm:text-lg md:text-xl text-slate-300 font-light max-w-2xl leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                    SinÃ³nimo de confianza, calidad y liderazgo en la industria automotriz del sur de Paraguay.
                </p>

                <!-- Indicadores clave -->
                <div class="mt-10 pt-8 border-t border-white/15 grid grid-cols-3 gap-6 max-w-lg" data-aos="fade-up" data-aos-delay="300">
                    <div>
                        <span class="block text-2xl sm:text-3xl font-light text-white font-heading tracking-normal">1977</span>
                        <span class="text-[11px] uppercase tracking-wider text-slate-400 font-medium">AÃ±o de FundaciÃ³n</span>
                    </div>
                    <div>
                        <span class="block text-2xl sm:text-3xl font-normal text-[#eb0a1e] font-heading tracking-normal">50 AÃ±os</span>
                        <span class="text-[11px] uppercase tracking-wider text-slate-400 font-medium">De Trayectoria</span>
                    </div>
                    <div>
                        <span class="block text-2xl sm:text-3xl font-light text-white font-heading tracking-normal">5 Sedes</span>
                        <span class="text-[11px] uppercase tracking-wider text-slate-400 font-medium">En el Sur del PaÃ­s</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. HISTORIA PRINCIPAL: LA FUERZA AUTOMOTRIZ DEL SUR -->
    <section class="w-full py-20 md:py-28 bg-white dark:bg-neutral-900 relative overflow-hidden">
        <!-- Elemento decorativo de fondo -->
        <div class="absolute top-0 right-0 w-1/3 h-full bg-slate-50/70 dark:bg-neutral-800/20 -skew-x-12 translate-x-24 pointer-events-none hidden lg:block"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">

                <!-- Columna de Texto -->
                <div class="lg:col-span-6 space-y-6" data-aos="fade-right">
                    <div class="inline-flex items-center gap-2 text-[#eb0a1e] text-xs font-bold uppercase tracking-[0.2em]">
                        <span class="w-8 h-[2px] bg-[#eb0a1e]"></span>
                        <span>QuiÃ©nes Somos</span>
                    </div>

                    <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-light text-slate-900 dark:text-white tracking-normal font-heading leading-tight uppercase">
                        La fuerza automotriz del <span class="font-normal text-[#eb0a1e]">Sur</span>
                    </h2>

                    <div class="w-16 h-1 bg-[#eb0a1e] rounded-full"></div>

                    <div class="space-y-5 text-slate-600 dark:text-neutral-300 text-base sm:text-[17px] leading-relaxed font-normal">
                        <p>
                            Desde 1977, en el corazÃ³n de EncarnaciÃ³n, CONSUR ha sido sinÃ³nimo de confianza, calidad y liderazgo en la industria automotriz del sur de Paraguay, consolidando <strong class="text-slate-900 dark:text-white font-semibold">50 aÃ±os de trayectoria</strong>.
                        </p>
                        <p>
                            Fundada por <strong class="text-slate-900 dark:text-white font-semibold">Don Carlos Szopa</strong>, un empresario visionario con profundas raÃ­ces en la comunidad, la empresa creciÃ³ bajo su guÃ­a durante mÃ¡s de dos dÃ©cadas, consolidando una cultura basada en la excelencia y la atenciÃ³n al cliente. Hoy, seguimos avanzando con la misma pasiÃ³n que nos vio nacer. En CONSUR, nos dedicamos a importar, representar y comercializar vehÃ­culos que marcan la diferencia en cada camino y acompaÃ±an la vida de nuestros clientes con desempeÃ±o, seguridad y estilo.
                        </p>
                    </div>

                    <!-- Sello de Respaldo -->
                    <div class="pt-4 flex flex-wrap items-center gap-6">
                        <div class="flex items-center gap-3.5 bg-slate-50 dark:bg-neutral-800/80 px-5 py-3.5 rounded-2xl border border-slate-200/80 dark:border-neutral-700">
                            <div class="w-10 h-10 rounded-xl bg-[#eb0a1e]/10 text-[#eb0a1e] flex items-center justify-center text-lg">
                                <i class="fas fa-award"></i>
                            </div>
                            <div>
                                <span class="block text-xs font-bold uppercase tracking-wider text-slate-900 dark:text-white">Concesionario Oficial</span>
                                <span class="block text-[11px] text-slate-500 dark:text-neutral-400">Calidad, garantÃ­a y posventa de excelencia</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Columna de Imagen Oficial (consursomos.jpg) -->
                <div class="lg:col-span-6" data-aos="fade-left" data-aos-delay="150">
                    <div class="relative group">
                        <!-- Marco decorativo desplazado -->
                        <div class="absolute -inset-3 bg-gradient-to-tr from-[#eb0a1e]/20 via-slate-200/40 to-transparent rounded-3xl transform rotate-1 group-hover:rotate-0 transition-transform duration-500 pointer-events-none"></div>

                        <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-slate-200/80 dark:border-neutral-800 bg-slate-900">
                            <img src="/images/pages/la-empresa/consursomos.jpg"
                                 alt="CONSUR S.A. - La fuerza automotriz del Sur"
                                 class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-700">

                            <!-- Barra inferior superpuesta -->
                            <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-slate-950/90 via-slate-950/50 to-transparent p-6 sm:p-8 flex items-end justify-between">
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#eb0a1e] block">Legado y VisiÃ³n</span>
                                    <span class="text-white text-sm sm:text-base font-bold font-heading">EncarnaciÃ³n &bull; ItapÃºa &bull; Misiones</span>
                                </div>
                                <span class="px-3.5 py-1.5 rounded-full bg-[#eb0a1e] text-white text-xs font-bold tracking-wider uppercase shadow-lg">
                                    50 AÃ±os
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 3. PILARES CORPORATIVOS (Nuestro DesafÃ­o, FilosofÃ­a, Crecimiento - Fondo 2K Ultra NÃ­tido) -->
    <section class="relative w-full py-24 md:py-32 overflow-hidden text-white select-none">
        <!-- Capa de imagen de fondo ultra nÃ­tida de alta resoluciÃ³n -->
        <div class="absolute inset-0 z-0">
            <picture class="w-full h-full block">
                <source srcset="/images/pages/la-empresa/consurobligado.webp" type="image/webp">
                <img src="/images/pages/la-empresa/consurobligado.jpg"
                     alt="CONSUR S.A. Sucursal Obligado"
                     loading="lazy"
                     decoding="async"
                     class="w-full h-full object-cover object-center transform scale-[1.02] transition-transform duration-1000">
            </picture>
            <!-- Overlay oscuro de mÃ¡xima definiciÃ³n y contraste (sin el backdrop-blur de 2px que generaba ruido visual) -->
            <div class="absolute inset-0 bg-slate-950/90"></div>
            <!-- Brillo ambiental rojo Toyota -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[300px] bg-[#eb0a1e]/15 rounded-full blur-3xl pointer-events-none"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Encabezado de secciÃ³n -->
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-xs font-bold uppercase tracking-[0.25em] text-[#eb0a1e] block mb-3">
                    ADN Corporativo CONSUR
                </span>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-light text-white uppercase tracking-normal font-heading">
                    Nuestros Pilares <span class="font-normal text-[#eb0a1e]">Fundamentales</span>
                </h2>
                <div class="w-16 h-1 bg-[#eb0a1e] mx-auto mt-5 rounded-full"></div>
            </div>

            <!-- Grilla Horizontal de 3 Pilares -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Pilar 1: Nuestro DesafÃ­o -->
                <div class="group relative bg-white/5 hover:bg-white/10 backdrop-blur-md rounded-3xl p-8 sm:p-10 border border-white/10 hover:border-[#eb0a1e]/60 transition-all duration-300 flex flex-col justify-between shadow-2xl"
                     data-aos="fade-up" data-aos-delay="100">
                    <div>
                        <div class="flex items-center justify-between mb-8">
                            <div class="w-16 h-16 rounded-2xl bg-[#eb0a1e] text-white flex items-center justify-center text-2xl shadow-lg shadow-red-600/30 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-key"></i>
                            </div>
                            <span class="text-4xl font-light text-white/20 group-hover:text-[#eb0a1e]/40 transition-colors font-heading select-none">01</span>
                        </div>

                        <h3 class="text-xl sm:text-2xl font-semibold text-white uppercase tracking-wide font-heading mb-4 group-hover:text-[#eb0a1e] transition-colors">
                            Nuestro DesafÃ­o
                        </h3>

                        <p class="text-slate-300 text-sm sm:text-base leading-relaxed font-light">
                            Representar y distribuir en forma exclusiva para el departamento de ItapÃºa, los productos de una de las mayores empresas fabricantes de automÃ³viles del mundo: <strong class="text-white font-semibold">TOYOTA</strong>.
                        </p>
                    </div>

                    <div class="mt-8 pt-4 border-t border-white/10 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#eb0a1e]">
                        <span>RepresentaciÃ³n Exclusiva</span>
                        <i class="fas fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </div>

                <!-- Pilar 2: FilosofÃ­a -->
                <div class="group relative bg-white/5 hover:bg-white/10 backdrop-blur-md rounded-3xl p-8 sm:p-10 border border-white/10 hover:border-[#eb0a1e]/60 transition-all duration-300 flex flex-col justify-between shadow-2xl"
                     data-aos="fade-up" data-aos-delay="200">
                    <div>
                        <div class="flex items-center justify-between mb-8">
                            <div class="w-16 h-16 rounded-2xl bg-[#eb0a1e] text-white flex items-center justify-center text-2xl shadow-lg shadow-red-600/30 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-gears"></i>
                            </div>
                            <span class="text-4xl font-light text-white/20 group-hover:text-[#eb0a1e]/40 transition-colors font-heading select-none">02</span>
                        </div>

                        <h3 class="text-xl sm:text-2xl font-semibold text-white uppercase tracking-wide font-heading mb-4 group-hover:text-[#eb0a1e] transition-colors">
                            FilosofÃ­a
                        </h3>

                        <p class="text-slate-300 text-sm sm:text-base leading-relaxed font-light">
                            Nos inspira transitar como empresa incorporando la filosofÃ­a <strong class="text-white font-semibold">â€œKaizenâ€</strong>; concepto basado en la mejora continua con el aporte fundamental de cada uno de los miembros del equipo.
                        </p>
                    </div>

                    <div class="mt-8 pt-4 border-t border-white/10 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#eb0a1e]">
                        <span>Mejora Continua Kaizen</span>
                        <i class="fas fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </div>

                <!-- Pilar 3: Crecimiento -->
                <div class="group relative bg-white/5 hover:bg-white/10 backdrop-blur-md rounded-3xl p-8 sm:p-10 border border-white/10 hover:border-[#eb0a1e]/60 transition-all duration-300 flex flex-col justify-between shadow-2xl"
                     data-aos="fade-up" data-aos-delay="300">
                    <div>
                        <div class="flex items-center justify-between mb-8">
                            <div class="w-16 h-16 rounded-2xl bg-[#eb0a1e] text-white flex items-center justify-center text-2xl shadow-lg shadow-red-600/30 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <span class="text-4xl font-light text-white/20 group-hover:text-[#eb0a1e]/40 transition-colors font-heading select-none">03</span>
                        </div>

                        <h3 class="text-xl sm:text-2xl font-semibold text-white uppercase tracking-wide font-heading mb-4 group-hover:text-[#eb0a1e] transition-colors">
                            Crecimiento
                        </h3>

                        <p class="text-slate-300 text-sm sm:text-base leading-relaxed font-light">
                            A medida que fuimos creciendo en infraestructura, habilitamos otras sucursales en el interior del paÃ­s, y otras alternativas de productos y servicios.
                        </p>
                    </div>

                    <div class="mt-8 pt-4 border-t border-white/10 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#eb0a1e]">
                        <span>ExpansiÃ³n Regional</span>
                        <i class="fas fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 4. NUESTRAS SUCURSALES E INFRAESTRUCTURA (Las 5 Sedes Oficiales de consur.com.py/la-empresa/) -->
    <section class="w-full py-20 md:py-28 bg-slate-50 dark:bg-neutral-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Encabezado -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-6" data-aos="fade-up">
                <div>
                    <div class="inline-flex items-center gap-2 text-[#eb0a1e] text-xs font-bold uppercase tracking-[0.2em] mb-2">
                        <span class="w-8 h-[2px] bg-[#eb0a1e]"></span>
                        <span>Presencia Regional</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-light text-slate-900 dark:text-white uppercase tracking-normal font-heading">
                        Nuestras <span class="font-normal text-[#eb0a1e]">Sucursales</span>
                    </h2>
                </div>
                <p class="text-slate-500 dark:text-neutral-400 text-sm sm:text-base max-w-md">
                    Infraestructura moderna, showrooms oficiales y talleres autorizados estratÃ©gicamente ubicados en ItapÃºa y Misiones.
                </p>
            </div>

            <!-- Casa Central Destacada (Full-Width Card) -->
            <div class="mb-8" data-aos="fade-up" data-aos-delay="100">
                <div @click="lightboxSrc = ''/images/pages/la-empresa/fachadaConsurCentral.jpg''; lightboxTitle = ''CASA CENTRAL: Av. Bernardino Caballero 749 â€“ EncarnaciÃ³n Paraguay''; lightboxOpen = true"
                     class="group relative rounded-3xl overflow-hidden shadow-xl border border-slate-200/80 dark:border-neutral-800 cursor-pointer h-[320px] sm:h-[420px] md:h-[480px]">
                    <img src="/images/pages/la-empresa/fachadaConsurCentral.jpg"
                         alt="CASA CENTRAL: Av. Bernardino Caballero 749 â€“ EncarnaciÃ³n Paraguay"
                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/35 to-transparent"></div>

                    <div class="absolute top-6 left-6">
                        <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#eb0a1e] text-white text-xs font-bold uppercase tracking-widest shadow-lg">
                            <i class="fas fa-building"></i> Sede Principal
                        </span>
                    </div>

                    <div class="absolute top-6 right-6 w-11 h-11 rounded-full bg-black/50 backdrop-blur-md text-white flex items-center justify-center opacity-80 group-hover:opacity-100 group-hover:bg-[#eb0a1e] transition-all">
                        <i class="fas fa-expand text-sm"></i>
                    </div>

                    <div class="absolute bottom-0 inset-x-0 p-6 sm:p-10 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#eb0a1e] block mb-1">EncarnaciÃ³n &bull; Paraguay</span>
                            <h3 class="text-2xl sm:text-3xl font-semibold text-white font-heading uppercase tracking-wide">
                                Casa Central
                            </h3>
                            <p class="text-slate-200 text-sm sm:text-base mt-1 flex items-center gap-2">
                                <i class="fas fa-location-dot text-[#eb0a1e]"></i>
                                <span>Av. Bernardino Caballero 749 â€“ EncarnaciÃ³n Paraguay</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grilla de 4 Sucursales del Interior -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Sucursal 1: MarÃ­a Auxiliadora -->
                <div data-aos="fade-up" data-aos-delay="150"
                     @click="lightboxSrc = ''/images/pages/la-empresa/consurmaux.jpg''; lightboxTitle = ''Ma. Auxiliadora: Ruta VI km. 119''; lightboxOpen = true"
                     class="group relative rounded-3xl overflow-hidden shadow-lg border border-slate-200/80 dark:border-neutral-800 cursor-pointer h-[280px] sm:h-[340px]">
                    <img src="/images/pages/la-empresa/consurmaux.jpg"
                         alt="Ma. Auxiliadora: Ruta VI km. 119"
                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/30 to-transparent"></div>

                    <div class="absolute top-5 right-5 w-10 h-10 rounded-full bg-black/50 backdrop-blur-md text-white flex items-center justify-center opacity-80 group-hover:opacity-100 group-hover:bg-[#eb0a1e] transition-all">
                        <i class="fas fa-expand text-xs"></i>
                    </div>

                    <div class="absolute bottom-0 inset-x-0 p-6 sm:p-8">
                        <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#eb0a1e] block mb-1">Sucursal ItapÃºa</span>
                        <h3 class="text-xl sm:text-2xl font-semibold text-white font-heading uppercase tracking-wide">
                            Ma. Auxiliadora
                        </h3>
                        <p class="text-slate-200 text-sm mt-1 flex items-center gap-2">
                            <i class="fas fa-location-dot text-[#eb0a1e]"></i>
                            <span>Ruta VI km. 119</span>
                        </p>
                    </div>
                </div>

                <!-- Sucursal 2: Obligado -->
                <div data-aos="fade-up" data-aos-delay="200"
                     @click="lightboxSrc = ''/images/pages/la-empresa/consurobligado.jpg''; lightboxTitle = ''Obligado: Av. Gaspar R. de Francia y Mcal. LÃ³pez''; lightboxOpen = true"
                     class="group relative rounded-3xl overflow-hidden shadow-lg border border-slate-200/80 dark:border-neutral-800 cursor-pointer h-[280px] sm:h-[340px]">
                    <img src="/images/pages/la-empresa/consurobligado.jpg"
                         alt="Obligado: Av. Gaspar R. de Francia y Mcal. LÃ³pez"
                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/30 to-transparent"></div>

                    <div class="absolute top-5 right-5 w-10 h-10 rounded-full bg-black/50 backdrop-blur-md text-white flex items-center justify-center opacity-80 group-hover:opacity-100 group-hover:bg-[#eb0a1e] transition-all">
                        <i class="fas fa-expand text-xs"></i>
                    </div>

                    <div class="absolute bottom-0 inset-x-0 p-6 sm:p-8">
                        <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#eb0a1e] block mb-1">Sucursal Colonias Unidas</span>
                        <h3 class="text-xl sm:text-2xl font-semibold text-white font-heading uppercase tracking-wide">
                            Obligado
                        </h3>
                        <p class="text-slate-200 text-sm mt-1 flex items-center gap-2">
                            <i class="fas fa-location-dot text-[#eb0a1e]"></i>
                            <span>Av. Gaspar R. de Francia y Mcal. LÃ³pez</span>
                        </p>
                    </div>
                </div>

                <!-- Sucursal 3: San Ignacio -->
                <div data-aos="fade-up" data-aos-delay="250"
                     @click="lightboxSrc = ''/images/pages/la-empresa/consursanignacio.jpg''; lightboxTitle = ''San Ignacio: Ruta 1 Mcal. Estigarribia, km 224''; lightboxOpen = true"
                     class="group relative rounded-3xl overflow-hidden shadow-lg border border-slate-200/80 dark:border-neutral-800 cursor-pointer h-[280px] sm:h-[340px]">
                    <img src="/images/pages/la-empresa/consursanignacio.jpg"
                         alt="San Ignacio: Ruta 1 Mcal. Estigarribia, km 224"
                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/30 to-transparent"></div>

                    <div class="absolute top-5 right-5 w-10 h-10 rounded-full bg-black/50 backdrop-blur-md text-white flex items-center justify-center opacity-80 group-hover:opacity-100 group-hover:bg-[#eb0a1e] transition-all">
                        <i class="fas fa-expand text-xs"></i>
                    </div>

                    <div class="absolute bottom-0 inset-x-0 p-6 sm:p-8">
                        <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#eb0a1e] block mb-1">Sucursal Misiones</span>
                        <h3 class="text-xl sm:text-2xl font-semibold text-white font-heading uppercase tracking-wide">
                            San Ignacio
                        </h3>
                        <p class="text-slate-200 text-sm mt-1 flex items-center gap-2">
                            <i class="fas fa-location-dot text-[#eb0a1e]"></i>
                            <span>Ruta 1 Mcal. Estigarribia, km 224</span>
                        </p>
                    </div>
                </div>

                <!-- Sucursal 4: San Pedro del ParanÃ¡ -->
                <div data-aos="fade-up" data-aos-delay="300"
                     @click="lightboxSrc = ''/images/pages/la-empresa/consursanpedro.jpg''; lightboxTitle = ''San Pedro del ParanÃ¡: Gregorio Cabrera GonzÃ¡lez entre CapitÃ¡n LeguizamÃ³n y Tebicuary''; lightboxOpen = true"
                     class="group relative rounded-3xl overflow-hidden shadow-lg border border-slate-200/80 dark:border-neutral-800 cursor-pointer h-[280px] sm:h-[340px]">
                    <img src="/images/pages/la-empresa/consursanpedro.jpg"
                         alt="San Pedro del ParanÃ¡: Gregorio Cabrera GonzÃ¡lez entre CapitÃ¡n LeguizamÃ³n y Tebicuary"
                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/30 to-transparent"></div>

                    <div class="absolute top-5 right-5 w-10 h-10 rounded-full bg-black/50 backdrop-blur-md text-white flex items-center justify-center opacity-80 group-hover:opacity-100 group-hover:bg-[#eb0a1e] transition-all">
                        <i class="fas fa-expand text-xs"></i>
                    </div>

                    <div class="absolute bottom-0 inset-x-0 p-6 sm:p-8">
                        <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#eb0a1e] block mb-1">Sucursal ItapÃºa</span>
                        <h3 class="text-xl sm:text-2xl font-semibold text-white font-heading uppercase tracking-wide">
                            San Pedro del ParanÃ¡
                        </h3>
                        <p class="text-slate-200 text-sm mt-1 flex items-center gap-2">
                            <i class="fas fa-location-dot text-[#eb0a1e]"></i>
                            <span>Gregorio Cabrera GonzÃ¡lez entre CapitÃ¡n LeguizamÃ³n y Tebicuary</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- LIGHTBOX MODAL PARA VER IMÃGENES DE SUCURSALES EN PANTALLA COMPLETA -->
    <div x-show="lightboxOpen"
         x-cloak
         x-transition.opacity.duration.250ms
         @keydown.escape.window="lightboxOpen = false"
         @click="lightboxOpen = false"
         class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md flex items-center justify-center p-4">
        <div @click.stop class="relative max-w-5xl w-full rounded-2xl overflow-hidden bg-neutral-950 border border-white/15 shadow-2xl">
            <button @click="lightboxOpen = false"
                    class="absolute top-4 right-4 z-10 w-10 h-10 rounded-full bg-black/70 hover:bg-[#eb0a1e] text-white flex items-center justify-center transition">
                <i class="fas fa-times"></i>
            </button>
            <img :src="lightboxSrc" :alt="lightboxTitle" class="w-full max-h-[80vh] object-contain bg-black">
            <div class="p-4 sm:p-5 bg-neutral-900 border-t border-white/10 text-center">
                <p class="text-white font-bold text-sm sm:text-base font-heading" x-text="lightboxTitle"></p>
            </div>
        </div>
    </div>

</div>', 'La Empresa | Consur S.A. â€“ 50 AÃ±os de Trayectoria', 'Desde 1977, en el corazÃ³n de EncarnaciÃ³n, Consur ha sido sinÃ³nimo de confianza, calidad y liderazgo en la industria automotriz del sur de Paraguay, consolidando 50 aÃ±os de trayectoria.', true, 1, '2026-10-05 14:51:44', '2026-11-18 13:56:14');
INSERT INTO public.pages VALUES (2, 'GarantÃ­a Oficial Toyota & Seguros', 'garantia-y-seguros', 'Tu inversiÃ³n protegida con el respaldo absoluto de fÃ¡brica y alianzas con las principales aseguradoras.', 'https://images.unsplash.com/photo-1617814076367-b759c7d7e738?auto=format&fit=crop&q=80&w=1600', '<h2>GarantÃ­a de FÃ¡brica Toyota</h2>
<p>Cada vehÃ­culo Toyota 0 Km adquirido en CONSUR S.A. cuenta con una cobertura integral de fÃ¡brica respaldada por una red global de servicio tÃ©cnico especializado y repuestos 100% legÃ­timos.</p>
<h2>GarantÃ­a en Usados Certificados</h2>
<p>Nuestros vehÃ­culos seminuevos y usados pasan por una rigurosa inspecciÃ³n tÃ©cnica de mÃ¡s de 120 puntos crÃ­ticos antes de salir al showroom, ofreciendo certificaciÃ³n documentada y garantÃ­a de tranquilidad.</p>
<h2>Convenios y AsesorÃ­a en Seguros</h2>
<p>Te facilitamos la contrataciÃ³n directa de pÃ³lizas contra todo riesgo con las aseguradoras lÃ­deres del mercado paraguayo, gestionando coberturas completas de forma inmediata al momento del retiro de tu unidad.</p>', 'GarantÃ­a Oficial y Seguros | Consur S.A.', 'ConocÃ© las coberturas de garantÃ­a oficial Toyota y los beneficios en seguros que ofrece Consur S.A.', true, 2, '2026-10-05 14:51:44', '2026-11-12 19:25:39');
INSERT INTO public.pages VALUES (10, 'Toyota Paraguay â€“ Gama 0 Km', 'toyota', 'Concesionaria Oficial Consur S.A. CatÃ¡logo completo de vehÃ­culos 0 Km, Principios Toyota, servicio tÃ©cnico especializado y red de sucursales.', '/images/toyota/hiluxcostanera.webp', '<!-- Landing exclusiva gestionada via App\Livewire\Frontend\ToyotaLanding -->', 'Toyota Paraguay â€¢ Modelos 0 Km | Consur S.A. Concesionario Oficial', 'DescubrÃ­ todos los modelos 0 Km de Toyota en Consur S.A.: Hilux, Corolla Cross, RAV4, Fortuner, Land Cruiser Prado y mÃ¡s. Servicio tÃ©cnico oficial y sucursales en Paraguay.', true, 1, '2026-11-05 10:59:10', '2026-11-11 12:20:19');
INSERT INTO public.pages VALUES (3, 'TÃ©rminos, Condiciones y Privacidad', 'terminos-y-condiciones', 'Transparencia y seguridad en el tratamiento de tus datos y cotizaciones en lÃ­nea.', 'https://images.unsplash.com/photo-1450133064473-71024230f91b?auto=format&fit=crop&q=80&w=1600', '<h2>Uso del Sitio Web</h2>
<p>El acceso y navegaciÃ³n en el portal web de CONSUR S.A. implica la aceptaciÃ³n plena de las presentes condiciones generales de uso. Toda informaciÃ³n comercial sobre modelos, precios y planes de financiaciÃ³n es referencial y estÃ¡ sujeta a confirmaciÃ³n con un asesor.</p>
<h2>Tratamiento de Datos Personales</h2>
<p>Los datos consignados en los formularios de cotizaciÃ³n, turnos y test drive son tratados con estricta confidencialidad por el equipo comercial de CONSUR S.A. y no son transferidos a terceros.</p>', 'TÃ©rminos y Condiciones | Consur S.A.', 'PolÃ­ticas de privacidad y tÃ©rminos de uso del sitio web oficial de Consur S.A.', true, 3, '2026-10-05 14:51:44', '2026-11-12 19:25:39');
INSERT INTO public.pages VALUES (11, 'Trabaja con nosotros', 'trabaja-con-nosotros', NULL, NULL, 'Formulario de postulaciÃ³n y talento humano de CONSUR S.A.', NULL, NULL, true, 0, '2026-11-11 18:31:47', '2026-11-12 19:25:39');
INSERT INTO public.pages VALUES (4, 'Posventa â€“ CONSUR S.A.', 'posventa', 'MantenÃ© tu Toyota como nuevo con tÃ©cnicos certificados, repuestos 100% legÃ­timos y talleres oficiales en ItapÃºa y Misiones.', '/images/pages/posventa-hero.jpg', '<div data-cms-layout="fullwidth" class="w-full bg-white text-slate-900">

    <!-- 1. HERO INSTITUCIONAL FULL-WIDTH CON EFECTO PARALLAX (Estilo /hino y /seguros) -->
    <section class="relative w-full min-h-[460px] md:min-h-[540px] flex items-center bg-fixed bg-cover bg-center overflow-hidden select-none"
             style="background-image: url(''/images/pages/posventa-hero.jpg'');">
        <!-- Degradados cinematogrÃ¡ficos de alto contraste -->
        <div class="absolute inset-0 bg-gradient-to-r from-neutral-950/95 via-neutral-950/80 to-neutral-950/40"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-transparent to-neutral-950/40"></div>

        <!-- Brillo ambiental rojo Toyota -->
        <div class="absolute -bottom-24 -right-24 w-96 h-96 rounded-full bg-[#eb0a1e]/15 blur-3xl pointer-events-none"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28 w-full">
            <div class="max-w-3xl" data-aos="fade-right">
                <!-- Badge arquitectÃ³nico sin bordes redondeados -->
                <div class="inline-flex items-center gap-3 mb-6 bg-white/10 backdrop-blur-md px-4 py-2 border-l-2 border-[#eb0a1e]">
                    <span class="w-2 h-2 bg-[#eb0a1e] animate-pulse"></span>
                    <span class="text-[11px] font-bold uppercase tracking-[0.25em] text-white">
                        Servicio TÃ©cnico Oficial &bull; CONSUR S.A.
                    </span>
                </div>

                <!-- TÃ­tulo con TipografÃ­a Toyota (Raleway Light) -->
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-light text-white uppercase tracking-normal font-heading leading-[1.06]">
                    Posventa
                </h1>

                <p class="mt-4 text-base sm:text-lg md:text-xl text-slate-300 font-light max-w-2xl leading-relaxed">
                    MantenÃ© tu vehÃ­culo en condiciones Ã³ptimas con el respaldo oficial de fÃ¡brica, tÃ©cnicos certificados internacionalmente y repuestos 100% legÃ­timos.
                </p>

                <!-- Botones de AcciÃ³n ArquitectÃ³nicos (Sin bordes redondeados tipo pÃ­ldora) -->
                <div class="mt-8 flex flex-wrap items-center gap-4">
                    <a href="http://www.turnos365.com/turnos.aspx?con=131"
                       target="_blank" rel="noopener"
                       class="inline-flex items-center gap-3 px-8 py-4 bg-[#eb0a1e] hover:bg-red-700 text-white text-xs font-bold uppercase tracking-widest transition-all shadow-lg shadow-red-600/30">
                        <i class="far fa-calendar-check text-sm"></i>
                        <span>AgendÃ¡ tu Turno Online</span>
                        <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                    <a href="https://wa.me/595985804106?text=Hola%20Consur%2C%20quisiera%20consultar%20sobre%20el%20Servicio%20T%C3%A9cnico%20y%20Repuestos%20Toyota."
                       target="_blank" rel="noopener"
                       class="inline-flex items-center gap-2.5 px-7 py-4 bg-white/10 hover:bg-white/20 text-white border border-white/20 text-xs font-bold uppercase tracking-widest backdrop-blur-sm transition-all">
                        <i class="fab fa-whatsapp text-emerald-400 text-sm"></i>
                        <span>Consultar a Posventa</span>
                    </a>
                </div>

                <!-- 4 Indicadores Clave en Grilla Lineal -->
                <div class="mt-12 pt-8 border-t border-white/15 grid grid-cols-2 sm:grid-cols-4 gap-6 max-w-2xl">
                    <div>
                        <span class="block text-2xl sm:text-3xl font-light text-white font-heading tracking-normal">21</span>
                        <span class="text-[10px] uppercase tracking-wider text-slate-400 font-medium">Puntos Clave InspecciÃ³n</span>
                    </div>
                    <div>
                        <span class="block text-2xl sm:text-3xl font-normal text-[#eb0a1e] font-heading tracking-normal">4</span>
                        <span class="text-[10px] uppercase tracking-wider text-slate-400 font-medium">Talleres Autorizados</span>
                    </div>
                    <div>
                        <span class="block text-2xl sm:text-3xl font-light text-white font-heading tracking-normal">100%</span>
                        <span class="text-[10px] uppercase tracking-wider text-slate-400 font-medium">Repuestos Genuinos</span>
                    </div>
                    <div>
                        <span class="block text-2xl sm:text-3xl font-normal text-[#eb0a1e] font-heading tracking-normal">Kaizen</span>
                        <span class="text-[10px] uppercase tracking-wider text-slate-400 font-medium">Mejora Continua</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. INTRODUCCIÃ“N EDITORIAL: EXCELENCIA OPERATIVA & RESPALDO OFICIAL (FULL-WIDTH BLANCO LIMPIO) -->
    <section class="w-full py-20 md:py-28 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">

                <!-- Columna Izquierda: InformaciÃ³n Editorial -->
                <div class="lg:col-span-7 space-y-6" data-aos="fade-right">
                    <div class="inline-flex items-center gap-3 text-[#eb0a1e] text-xs font-bold uppercase tracking-[0.25em]">
                        <span class="w-10 h-[2px] bg-[#eb0a1e]"></span>
                        <span>Con GarantÃ­a de Confianza</span>
                    </div>

                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-light text-slate-900 tracking-normal font-heading leading-tight uppercase">
                        <span class="font-normal text-[#eb0a1e]">MantenÃ©</span> tu vehÃ­culo como nuevo
                    </h2>

                    <p class="text-lg sm:text-xl font-medium text-slate-800 tracking-wide border-l-4 border-[#eb0a1e] pl-4">
                        A partir del momento en que adquirÃ­s tu vehÃ­culo empieza una relaciÃ³n de acompaÃ±amiento permanente.
                    </p>

                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed font-light">
                        En <strong class="text-slate-900 font-medium">CONSUR S.A.</strong> cuidamos tu vehÃ­culo con los mismos estÃ¡ndares de fÃ¡brica con los que fue diseÃ±ado. Contamos con tecnologÃ­a de diagnÃ³stico computarizado oficial para todas nuestras marcas representadas, tÃ©cnicos especializados con certificaciÃ³n internacional y un amplio stock de repuestos legÃ­timos que garantizan tu seguridad y la vida Ãºtil de cada componente.
                    </p>

                    <!-- 3 Pilares ArquitectÃ³nicos en Fila Minimalista -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-px bg-slate-200 border border-slate-200 shadow-xs pt-0">
                        <div class="bg-white p-5 space-y-2">
                            <div class="w-10 h-10 bg-red-50 text-[#eb0a1e] flex items-center justify-center text-base">
                                <i class="fas fa-user-check"></i>
                            </div>
                            <span class="block text-xs font-bold uppercase tracking-wider text-slate-900">TÃ©cnicos Certificados</span>
                            <span class="block text-[11px] text-slate-500 font-light leading-snug">CapacitaciÃ³n continua bajo estÃ¡ndares de fÃ¡brica</span>
                        </div>

                        <div class="bg-white p-5 space-y-2">
                            <div class="w-10 h-10 bg-red-50 text-[#eb0a1e] flex items-center justify-center text-base">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <span class="block text-xs font-bold uppercase tracking-wider text-slate-900">Repuestos Genuinos</span>
                            <span class="block text-[11px] text-slate-500 font-light leading-snug">Piezas originales con garantÃ­a oficial de fÃ¡brica</span>
                        </div>

                        <div class="bg-white p-5 space-y-2">
                            <div class="w-10 h-10 bg-red-50 text-[#eb0a1e] flex items-center justify-center text-base">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <span class="block text-xs font-bold uppercase tracking-wider text-slate-900">Preventivo Oficial</span>
                            <span class="block text-[11px] text-slate-500 font-light leading-snug">Mantenimientos programados que cuidan tu inversiÃ³n</span>
                        </div>
                    </div>

                    <!-- Enlaces RÃ¡pidos de AcciÃ³n -->
                    <div class="pt-2 flex flex-wrap items-center gap-4">
                        <a href="http://www.turnos365.com/turnos.aspx?con=131"
                           target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2.5 px-7 py-3.5 bg-[#eb0a1e] hover:bg-red-700 text-white text-xs font-bold uppercase tracking-widest transition shadow-md shadow-red-600/20">
                            <i class="far fa-calendar-check text-xs"></i>
                            <span>AgendÃ¡ tu Turno Online</span>
                        </a>
                        <a href="#servicios-especializados"
                           class="inline-flex items-center gap-2 px-7 py-3.5 bg-transparent hover:bg-slate-100 text-slate-900 border border-slate-300 text-xs font-bold uppercase tracking-widest transition">
                            <span>Ver Servicios Especializados</span>
                            <i class="fas fa-arrow-down text-[10px] text-[#eb0a1e]"></i>
                        </a>
                    </div>
                </div>

                <!-- Columna Derecha: Imagen Oficial de Instalaciones sin Bordes Redondeados -->
                <div class="lg:col-span-5" data-aos="fade-left" data-aos-delay="150">
                    <div class="relative overflow-hidden shadow-2xl border border-slate-200 group">
                        <img src="/images/toyota/frontservicios.png"
                             alt="Instalaciones de Taller y Servicios Oficiales CONSUR Toyota"
                             class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-slate-950/95 via-slate-950/60 to-transparent p-6 border-t border-white/10">
                            <span class="text-xs font-bold uppercase tracking-widest text-[#eb0a1e] block">
                                Excelencia Operativa
                            </span>
                            <span class="text-white text-sm font-semibold font-heading uppercase tracking-wide block mt-0.5">
                                Instalaciones de Taller y Mantenimiento Oficial en CONSUR
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 3. SERVICIOS ESPECIALIZADOS: BOX EXPRÃ‰S, VEHÃCULO DE CORTESÃA Y TALLER MÃ“VIL (FULL-WIDTH GRIS CLARO) -->
    <section id="servicios-especializados" class="w-full py-20 md:py-28 bg-slate-50 border-y border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Encabezado Centrado -->
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-3" data-aos="fade-up">
                <span class="text-xs font-bold uppercase tracking-[0.25em] text-[#eb0a1e] block">
                    Soluciones a Tu Medida
                </span>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-light text-slate-900 font-heading uppercase tracking-normal">
                    Servicios Posventa <span class="font-normal text-[#eb0a1e]">Especializados</span>
                </h2>
                <div class="w-16 h-1 bg-[#eb0a1e] mx-auto mt-4"></div>
                <p class="text-sm sm:text-base text-slate-500 font-light max-w-3xl mx-auto pt-1">
                    AtenciÃ³n inmediata sin esperas, movilidad garantizada mientras cuidamos de tu unidad y soporte tÃ©cnico integral con respaldo oficial para vehÃ­culos <strong class="text-slate-800 font-semibold">Toyota</strong>, <strong class="text-slate-800 font-semibold">OMODA &amp; JAECOO</strong> y camiones <strong class="text-slate-800 font-semibold">HINO</strong>.
                </p>
            </div>

            <!-- Grilla de 3 Tarjetas ArquitectÃ³nicas (Bordes Rectos, LÃ­nea Superior de Hover, Sombra Fina) -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- 1. Box ExprÃ©s -->
                <div class="bg-white border border-slate-200 hover:border-[#eb0a1e] shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group relative"
                     data-aos="fade-up" data-aos-delay="0">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-transparent group-hover:bg-[#eb0a1e] transition-colors"></div>

                    <div>
                        <div class="aspect-[16/10] overflow-hidden bg-slate-100 border-b border-slate-100">
                            <img src="/images/pages/posventa-boxexpress.jpg"
                                 alt="Box ExprÃ©s CONSUR"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        </div>
                        <div class="p-8 space-y-3">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e] block">
                                AtenciÃ³n Inmediata &bull; 21 Puntos Clave
                            </span>
                            <h3 class="text-xl font-semibold text-slate-900 font-heading uppercase tracking-wide">
                                Box ExprÃ©s
                            </h3>
                            <p class="text-sm text-slate-600 leading-relaxed font-light">
                                En nuestro servicio Box ExprÃ©s, tu vehÃ­culo recibe atenciÃ³n inmediata y precisa. Con dos tÃ©cnicos especializados, realizamos el cambio de aceite y filtro, mÃ¡s una inspecciÃ³n completa de 21 puntos clave que incluyen luces, suspensiÃ³n y frenos. Un servicio rÃ¡pido, eficiente y seguro, pensado para que vuelvas a la ruta sin demoras.
                            </p>
                        </div>
                    </div>

                    <div class="p-8 pt-0">
                        <a href="http://www.turnos365.com/turnos.aspx?con=131"
                           target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-900 group-hover:text-[#eb0a1e] transition-colors">
                            <span>Agendar Box ExprÃ©s</span>
                            <i class="fas fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <!-- 2. VehÃ­culo de CortesÃ­a -->
                <div class="bg-white border border-slate-200 hover:border-[#eb0a1e] shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group relative"
                     data-aos="fade-up" data-aos-delay="100">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-transparent group-hover:bg-[#eb0a1e] transition-colors"></div>

                    <div>
                        <div class="aspect-[16/10] overflow-hidden bg-slate-100 border-b border-slate-100">
                            <img src="/images/pages/posventa-vehiculocortesia.jpg"
                                 alt="VehÃ­culo de CortesÃ­a CONSUR"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        </div>
                        <div class="p-8 space-y-3">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e] block">
                                Movilidad Garantizada
                            </span>
                            <h3 class="text-xl font-semibold text-slate-900 font-heading uppercase tracking-wide">
                                VehÃ­culo de CortesÃ­a
                            </h3>
                            <p class="text-sm text-slate-600 leading-relaxed font-light">
                                Servicio posventa sin pausas: mientras cuidamos de tu vehÃ­culo, seguÃ­s tu camino. ConsultÃ¡ por nuestra opciÃ³n de vehÃ­culo de cortesÃ­a para continuar con tu rutina de trabajo o compromisos personales sin ningÃºn tipo de interrupciones.
                            </p>
                        </div>
                    </div>

                    <div class="p-8 pt-0">
                        <a href="https://wa.me/595985804106?text=Hola%20Consur%2C%20quisiera%20consultar%20por%20la%20opci%C3%B3n%20de%20Veh%C3%ADculo%20de%20Cortes%C3%ADa."
                           target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-900 group-hover:text-[#eb0a1e] transition-colors">
                            <span>Consultar Disponibilidad</span>
                            <i class="fas fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <!-- 3. Taller MÃ³vil -->
                <div class="bg-white border border-slate-200 hover:border-[#eb0a1e] shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group relative"
                     data-aos="fade-up" data-aos-delay="200">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-transparent group-hover:bg-[#eb0a1e] transition-colors"></div>

                    <div>
                        <div class="aspect-[16/10] overflow-hidden bg-slate-100 border-b border-slate-100">
                            <img src="/images/pages/posventa-tallermovil.jpg"
                                 alt="Taller MÃ³vil CONSUR"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        </div>
                        <div class="p-8 space-y-3">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e] block">
                                Asistencia Donde EstÃ©s
                            </span>
                            <h3 class="text-xl font-semibold text-slate-900 font-heading uppercase tracking-wide">
                                Taller MÃ³vil
                            </h3>
                            <p class="text-sm text-slate-600 leading-relaxed font-light">
                                Â¡El taller ahora va donde estÃ©s! Con el servicio de Taller MÃ³vil, solucionamos lo que tu vehÃ­culo necesita, estÃ©s donde estÃ©s. PrÃ¡ctico, rÃ¡pido y confiable, con una unidad 100% equipada con herramientas de Ãºltima generaciÃ³n, diagnÃ³stico multimarca oficial y lubricantes certificados.
                            </p>
                        </div>
                    </div>

                    <div class="p-8 pt-0">
                        <a href="https://wa.me/595985804106?text=Hola%20Consur%2C%20solicito%20el%20servicio%20de%20Taller%20M%C3%B3vil%20en%20mi%20domicilio."
                           target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-900 group-hover:text-[#eb0a1e] transition-colors">
                            <span>Solicitar Taller MÃ³vil</span>
                            <i class="fas fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Destacado Especial: Servicio TÃ©cnico Oficial OMODA & JAECOO -->
            <div class="mt-10 bg-slate-950 text-white border border-slate-800 p-8 sm:p-10 flex flex-col lg:flex-row lg:items-center justify-between gap-8 relative overflow-hidden shadow-xl" data-aos="fade-up">
                <div class="absolute top-0 left-0 bottom-0 w-1.5 bg-[#eb0a1e]"></div>
                <div class="absolute -right-20 -bottom-20 w-72 h-72 bg-[#eb0a1e]/10 rounded-full blur-3xl pointer-events-none"></div>

                <div class="space-y-3 max-w-3xl relative z-10">
                    <div class="inline-flex items-center gap-2 bg-[#eb0a1e]/20 border border-[#eb0a1e]/40 text-red-400 text-[10px] font-bold uppercase px-3 py-1 tracking-[0.2em]">
                        <i class="fas fa-bolt text-xs"></i>
                        <span>Soporte Oficial Especializado &bull; Nueva GeneraciÃ³n</span>
                    </div>
                    <h3 class="text-xl sm:text-2xl md:text-3xl font-light font-heading uppercase tracking-wide text-white">
                        Servicio TÃ©cnico &amp; Posventa Oficial <span class="font-semibold text-[#eb0a1e]">OMODA &amp; JAECOO</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-300 font-light leading-relaxed">
                        Contamos con bahÃ­as exclusivas, equipamiento de diagnÃ³stico electrÃ³nico avanzado, soporte especializado para sistemas hÃ­bridos enchufables (<strong class="text-white font-medium">PHEV</strong>) y vehÃ­culos 100% elÃ©ctricos (<strong class="text-white font-medium">EV</strong>), ademÃ¡s de repuestos genuinos para toda la lÃ­nea <strong class="text-white font-medium">OMODA y JAECOO</strong> en Paraguay con la garantÃ­a de <strong class="text-white font-medium">CONSUR S.A.</strong>
                    </p>
                </div>

                <div class="shrink-0 flex flex-wrap items-center gap-3.5 relative z-10">
                    <a href="https://wa.me/595985804106?text=Hola%20CONSUR%2C%20quisiera%20agendar%20o%20consultar%20sobre%20el%20Servicio%20Posventa%20para%20OMODA%20%2F%20JAECOO."
                       target="_blank" rel="noopener"
                       class="inline-flex items-center gap-2.5 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-7 py-4 transition-all shadow-lg shadow-red-600/25">
                        <i class="fab fa-whatsapp text-sm"></i>
                        <span>Posventa OMODA &amp; JAECOO</span>
                        <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÃ“N TOYOTA 10: GARANTÃA EXTENDIDA HASTA 10 AÃ‘OS O 200.000 KM -->
    <section id="toyota-10" class="w-full py-16 md:py-20 bg-white dark:bg-neutral-900 border-b border-slate-200 dark:border-neutral-800 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">

            <!-- 1. ENCABEZADO Y PRESENTACIÃ“N PRINCIPAL (2 COLUMNAS EQUILIBRADAS) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                
                <!-- Columna Izquierda: Escudo Oficial Toyota 10 -->
                <div class="lg:col-span-4 flex flex-col items-center justify-center text-center p-6 bg-slate-50 dark:bg-neutral-800/50 rounded-2xl border border-slate-100 dark:border-neutral-800">
                    <img src="/images/pages/toyota10/badge-toyota-10.webp"
                         alt="Toyota 10: hasta 10 aÃ±os de garantÃ­a o 200.000 km"
                         class="w-40 sm:w-48 h-auto object-contain drop-shadow-md">
                    <span class="mt-4 text-[11px] font-bold uppercase tracking-wider text-slate-500 dark:text-neutral-400">
                        Programa Oficial Toyota
                    </span>
                    <span class="text-xs text-slate-400 dark:text-neutral-500">
                        Exclusivo en la Red CONSUR
                    </span>
                </div>

                <!-- Columna Derecha: InformaciÃ³n Principal y CÃ³mo Funciona -->
                <div class="lg:col-span-8 space-y-6">
                    <div class="space-y-2">
                        <div class="inline-flex items-center gap-2 bg-[#eb0a1e] text-white text-[11px] font-bold uppercase px-3 py-1 rounded-sm tracking-wider">
                            <i class="fas fa-shield-alt text-[10px]"></i>
                            <span>GarantÃ­a Extendida Oficial &bull; Toyota 10</span>
                        </div>

                        <h2 class="text-2xl sm:text-3xl font-light text-slate-900 dark:text-white font-heading uppercase tracking-normal leading-tight">
                            Nos mueve tu <span class="font-normal text-[#eb0a1e]">tranquilidad</span>
                        </h2>
                    </div>

                    <p class="text-sm sm:text-base text-slate-600 dark:text-neutral-300 leading-relaxed font-light">
                        Conscientes de la calidad y durabilidad que definen a cada vehÃ­culo de la marca, te presentamos <strong class="text-slate-900 dark:text-white font-semibold">Toyota 10</strong>: una cobertura extendida de <strong class="text-slate-900 dark:text-white font-semibold">hasta 10 aÃ±os o 200.000 km</strong> que se renueva automÃ¡ticamente con tus mantenimientos oficiales, sin trÃ¡mites extras ni costos adicionales.
                    </p>

                    <!-- Tarjeta Informativa: Â¿CÃ³mo funciona? -->
                    <div class="bg-slate-50 dark:bg-neutral-800/70 border-l-4 border-[#eb0a1e] p-5 rounded-r-xl space-y-2">
                        <h3 class="text-xs sm:text-sm font-bold text-slate-900 dark:text-white font-heading uppercase tracking-wider flex items-center gap-2">
                            <i class="fas fa-sync-alt text-[#eb0a1e] text-xs"></i>
                            Â¿CÃ³mo funciona la renovaciÃ³n?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-neutral-300 leading-relaxed font-light">
                            Con cada servicio de mantenimiento periÃ³dico realizado en nuestros talleres oficiales CONSUR, renovÃ¡s la garantÃ­a por <strong class="text-slate-900 dark:text-white font-medium">1 aÃ±o o 5.000 km</strong> (lo que ocurra primero), hasta completar un perÃ­odo mÃ¡ximo de <strong class="text-slate-900 dark:text-white font-medium">10 aÃ±os o 200.000 km</strong>.
                        </p>
                    </div>
                </div>
            </div>

            <!-- 2. PILARES CLAVE DE TOYOTA 10 (GRID DE 4 TARJETAS LIMPIAS) -->
            <div class="pt-8 border-t border-slate-200 dark:border-neutral-800 space-y-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                    
                    <!-- Tarjeta 1: Cobertura -->
                    <div class="p-5 bg-slate-50 dark:bg-neutral-800/60 rounded-xl border border-slate-200/80 dark:border-neutral-700/80 space-y-2">
                        <div class="w-10 h-10 rounded-lg bg-red-100 dark:bg-red-950/50 flex items-center justify-center text-[#eb0a1e]">
                            <i class="fas fa-shield-alt text-lg"></i>
                        </div>
                        <h4 class="text-lg font-semibold text-slate-900 dark:text-white font-heading leading-tight">
                            Hasta 10 AÃ±os
                        </h4>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-neutral-300">
                            O 200.000 KM
                        </p>
                        <p class="text-xs text-slate-500 dark:text-neutral-400 font-light leading-relaxed">
                            La cobertura mÃ¡s extensa y confiable del mercado automotriz paraguayo.
                        </p>
                    </div>

                    <!-- Tarjeta 2: Repuestos Genuinos -->
                    <div class="p-5 bg-slate-50 dark:bg-neutral-800/60 rounded-xl border border-slate-200/80 dark:border-neutral-700/80 space-y-2">
                        <div class="w-10 h-10 rounded-lg bg-red-100 dark:bg-red-950/50 flex items-center justify-center text-[#eb0a1e]">
                            <i class="fas fa-tools text-lg"></i>
                        </div>
                        <h4 class="text-lg font-semibold text-slate-900 dark:text-white font-heading leading-tight">
                            100% Genuinos
                        </h4>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-neutral-300">
                            Piezas Oficiales Toyota
                        </p>
                        <p class="text-xs text-slate-500 dark:text-neutral-400 font-light leading-relaxed">
                            Mano de obra certificada internacionalmente y repuestos originales.
                        </p>
                    </div>

                    <!-- Tarjeta 3: ActivaciÃ³n Directa -->
                    <div class="p-5 bg-slate-50 dark:bg-neutral-800/60 rounded-xl border border-slate-200/80 dark:border-neutral-700/80 space-y-2">
                        <div class="w-10 h-10 rounded-lg bg-red-100 dark:bg-red-950/50 flex items-center justify-center text-[#eb0a1e]">
                            <i class="fas fa-check-circle text-lg"></i>
                        </div>
                        <h4 class="text-lg font-semibold text-slate-900 dark:text-white font-heading leading-tight">
                            AutomÃ¡tica
                        </h4>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-neutral-300">
                            Sin Contratos Extra
                        </p>
                        <p class="text-xs text-slate-500 dark:text-neutral-400 font-light leading-relaxed">
                            Se activa de inmediato tras completar cada service periÃ³dico oficial.
                        </p>
                    </div>

                    <!-- Tarjeta 4: 100% Transferible -->
                    <div class="p-5 bg-slate-50 dark:bg-neutral-800/60 rounded-xl border border-slate-200/80 dark:border-neutral-700/80 space-y-2">
                        <div class="w-10 h-10 rounded-lg bg-red-100 dark:bg-red-950/50 flex items-center justify-center text-[#eb0a1e]">
                            <i class="fas fa-id-card text-lg"></i>
                        </div>
                        <h4 class="text-lg font-semibold text-slate-900 dark:text-white font-heading leading-tight">
                            Transferible
                        </h4>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-neutral-300">
                            Asociada al Chasis (VIN)
                        </p>
                        <p class="text-xs text-slate-500 dark:text-neutral-400 font-light leading-relaxed">
                            AcompaÃ±a al vehÃ­culo ante cualquier venta, protegiendo su valor residual.
                        </p>
                    </div>

                </div>
            </div>

            <!-- 3. CONSULTA DE ELEGIBILIDAD POR CHASIS (BANNER INTERACTIVO ELEGANTE) -->
            <div class="p-6 sm:p-8 bg-slate-50 dark:bg-neutral-800/70 rounded-2xl border border-slate-200 dark:border-neutral-700 flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="space-y-1.5 text-center md:text-left max-w-xl">
                    <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#eb0a1e]">
                        <i class="fas fa-search"></i>
                        <span>VerificaciÃ³n Inmediata</span>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-slate-900 dark:text-white font-heading">
                        Â¿QuerÃ©s saber si tu Toyota aplica a la garantÃ­a extendida?
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-neutral-400 font-light">
                        Envianos el nÃºmero de chasis (VIN) de tu vehÃ­culo y nuestros asesores oficiales validarÃ¡n el estado de cobertura en el acto.
                    </p>
                </div>

                <div class="shrink-0 w-full md:w-auto flex flex-col sm:flex-row items-center gap-3">
                    <a href="https://wa.me/595985804106?text=Hola%20CONSUR%2C%20quiero%20consultar%20la%20elegibilidad%20de%20mi%20Toyota%20por%20chasis%20(Programa%20Toyota%2010)."
                       target="_blank" rel="noopener noreferrer"
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-6 py-3.5 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition duration-200 shadow-sm">
                        <i class="fas fa-barcode text-sm"></i>
                        <span>Consultar Elegibilidad por VIN</span>
                        <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <!-- 4. BARRA DE ACCIÃ“N Y CONTACTO (TÃ‰RMINOS Y CONDICIONES + AGENDAR TURNO) -->
            <div class="pt-6 border-t border-slate-200 dark:border-neutral-800 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-xs text-slate-500 dark:text-neutral-400 text-center sm:text-left">
                    <span class="font-medium text-slate-700 dark:text-neutral-300">VÃ¡lido para vehÃ­culos comercializados desde noviembre de 2023.</span>
                    <span class="hidden sm:inline"> &bull; Sujeto a cumplimiento del plan de mantenimiento oficial.</span>
                </div>

                <div class="flex flex-wrap items-center justify-center gap-3 w-full sm:w-auto">
                    <!-- BotÃ³n TÃ©rminos y Condiciones -->
                    <a href="/images/pages/toyota10/toyota10-terminos-y-condiciones.pdf"
                       target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center justify-center gap-2 px-5 py-3 bg-white dark:bg-neutral-800 hover:bg-slate-100 dark:hover:bg-neutral-700 text-slate-800 dark:text-white border border-slate-300 dark:border-neutral-600 rounded-xl font-semibold text-xs uppercase tracking-wider transition">
                        <i class="far fa-file-pdf text-[#eb0a1e] text-sm"></i>
                        <span>TÃ©rminos y Condiciones</span>
                    </a>

                    <!-- BotÃ³n Agendar Turno Oficial WhatsApp -->
                    <a href="https://wa.me/595985804106?text=Hola%20CONSUR%2C%20quiero%20agendar%20mi%20turno%20de%20mantenimiento%20Toyota%20para%20mantener%20mi%20Garant%C3%ADa%20Toyota%2010."
                       target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-[#25D366] hover:bg-[#20ba59] text-white rounded-xl font-bold text-xs uppercase tracking-wider transition shadow-sm">
                        <i class="fab fa-whatsapp text-base"></i>
                        <span>AgendÃ¡ tu Turno Oficial</span>
                        <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- 4. FRANJA PARALLAX FULL-WIDTH: 4 TALLERES AUTORIZADOS EN EL SUR DEL PAÃS (Estilo /hino y /la-empresa) -->
    <section class="relative w-full py-24 md:py-32 bg-fixed bg-cover bg-center overflow-hidden text-white select-none"
             style="background-image: url(''/images/home/toyotaaclientes.jpg'');">
        <!-- Overlay oscuro con profundidad -->
        <div class="absolute inset-0 bg-slate-950/90 backdrop-blur-[2px]"></div>

        <!-- Brillo ambiental rojo Toyota -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[300px] bg-[#eb0a1e]/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Encabezado de la Franja Parallax -->
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-3" data-aos="fade-up">
                <span class="text-xs font-bold uppercase tracking-[0.25em] text-[#eb0a1e] block">
                    Red Oficial CONSUR S.A.
                </span>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-light text-white font-heading uppercase tracking-normal">
                    4 Talleres Autorizados en el <span class="font-normal text-[#eb0a1e]">Sur del PaÃ­s</span>
                </h2>
                <div class="w-16 h-1 bg-[#eb0a1e] mx-auto mt-4"></div>
                <p class="text-sm sm:text-base text-slate-300 font-light max-w-2xl mx-auto pt-1 leading-relaxed">
                    Infraestructura de taller oficial, boxes de diagnÃ³stico computarizado y repuestos genuinos estratÃ©gicamente ubicados en ItapÃºa y Misiones.
                </p>
            </div>

            <!-- Grilla ArquitectÃ³nica de las 4 Sedes Oficiales de Taller -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-px bg-white/10 border border-white/10 shadow-2xl mb-12">

                <!-- Sede 1: EncarnaciÃ³n -->
                <div class="bg-neutral-950/80 backdrop-blur-md p-7 sm:p-8 space-y-4 hover:bg-neutral-900/90 transition-all group"
                     data-aos="fade-up" data-aos-delay="50">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e]">
                            Sede Principal
                        </span>
                        <div class="w-9 h-9 bg-white/10 group-hover:bg-[#eb0a1e] text-white flex items-center justify-center transition">
                            <i class="fas fa-location-dot text-xs"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold uppercase tracking-wide font-heading text-white">
                            EncarnaciÃ³n
                        </h3>
                        <p class="text-xs text-slate-300 mt-1 leading-relaxed font-light">
                            Av. Bernardino Caballero 749 (Casa Central)
                        </p>
                    </div>
                    <div class="pt-2 border-t border-white/10 text-[11px] text-slate-400">
                        <i class="far fa-clock text-[#eb0a1e] mr-1"></i>
                        <span>Lun a Vie 07:00 a 17:30 Hs</span>
                    </div>
                </div>

                <!-- Sede 2: Obligado -->
                <div class="bg-neutral-950/80 backdrop-blur-md p-7 sm:p-8 space-y-4 hover:bg-neutral-900/90 transition-all group"
                     data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e]">
                            Colonias Unidas
                        </span>
                        <div class="w-9 h-9 bg-white/10 group-hover:bg-[#eb0a1e] text-white flex items-center justify-center transition">
                            <i class="fas fa-location-dot text-xs"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold uppercase tracking-wide font-heading text-white">
                            Obligado
                        </h3>
                        <p class="text-xs text-slate-300 mt-1 leading-relaxed font-light">
                            Av. Gaspar R. de Francia y Mcal. LÃ³pez
                        </p>
                    </div>
                    <div class="pt-2 border-t border-white/10 text-[11px] text-slate-400">
                        <i class="far fa-clock text-[#eb0a1e] mr-1"></i>
                        <span>Lun a Vie 07:00 a 17:30 Hs</span>
                    </div>
                </div>

                <!-- Sede 3: San Ignacio -->
                <div class="bg-neutral-950/80 backdrop-blur-md p-7 sm:p-8 space-y-4 hover:bg-neutral-900/90 transition-all group"
                     data-aos="fade-up" data-aos-delay="150">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e]">
                            Misiones
                        </span>
                        <div class="w-9 h-9 bg-white/10 group-hover:bg-[#eb0a1e] text-white flex items-center justify-center transition">
                            <i class="fas fa-location-dot text-xs"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold uppercase tracking-wide font-heading text-white">
                            San Ignacio
                        </h3>
                        <p class="text-xs text-slate-300 mt-1 leading-relaxed font-light">
                            Ruta 1 Mcal. Estigarribia, km 224
                        </p>
                    </div>
                    <div class="pt-2 border-t border-white/10 text-[11px] text-slate-400">
                        <i class="far fa-clock text-[#eb0a1e] mr-1"></i>
                        <span>Lun a Vie 07:00 a 17:30 Hs</span>
                    </div>
                </div>

                <!-- Sede 4: MarÃ­a Auxiliadora -->
                <div class="bg-neutral-950/80 backdrop-blur-md p-7 sm:p-8 space-y-4 hover:bg-neutral-900/90 transition-all group"
                     data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-[#eb0a1e]">
                            ItapÃºa Norte
                        </span>
                        <div class="w-9 h-9 bg-white/10 group-hover:bg-[#eb0a1e] text-white flex items-center justify-center transition">
                            <i class="fas fa-location-dot text-xs"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold uppercase tracking-wide font-heading text-white">
                            Ma. Auxiliadora
                        </h3>
                        <p class="text-xs text-slate-300 mt-1 leading-relaxed font-light">
                            Ruta VI km. 119
                        </p>
                    </div>
                    <div class="pt-2 border-t border-white/10 text-[11px] text-slate-400">
                        <i class="far fa-clock text-[#eb0a1e] mr-1"></i>
                        <span>Lun a Vie 07:00 a 17:30 Hs</span>
                    </div>
                </div>

            </div>

            <!-- BotÃ³n Central de Agendamiento -->
            <div class="text-center" data-aos="fade-up">
                <a href="http://www.turnos365.com/turnos.aspx?con=131"
                   target="_blank" rel="noopener"
                   class="inline-flex items-center gap-3 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-10 py-4 transition-all shadow-xl shadow-red-600/30">
                    <i class="far fa-calendar-alt text-sm"></i>
                    <span>AgendÃ¡ tu Turno en Turnos365</span>
                    <i class="fas fa-external-link-alt text-[10px]"></i>
                </a>
            </div>

        </div>
    </section>

    <!-- 5. COMPROMISO POSVENTA: TE ACOMPAÃ‘AMOS & PERSONAL ALTAMENTE CALIFICADO (FULL-WIDTH BLANCO LIMPIO) -->
    <section class="w-full py-20 md:py-28 bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">

                <!-- Columna Izquierda: InformaciÃ³n de Compromiso y Beneficios -->
                <div class="lg:col-span-7 space-y-8" data-aos="fade-right">
                    <div class="space-y-3">
                        <div class="inline-flex items-center gap-2 text-[#eb0a1e] text-xs font-bold uppercase tracking-[0.2em]">
                            <span class="w-8 h-[2px] bg-[#eb0a1e]"></span>
                            <span>Compromiso Posventa CONSUR</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl md:text-5xl font-light text-slate-900 font-heading uppercase tracking-normal">
                            Te <span class="font-normal text-[#eb0a1e]">AcompaÃ±amos</span>
                        </h2>
                        <p class="text-slate-600 text-sm sm:text-base leading-relaxed font-light">
                            A partir del momento que Usted adquiere nuestras unidades o nuestros servicios empieza una relaciÃ³n donde siempre va a encontrarse acompaÃ±ado con la calidez, transparencia y excelencia tÃ©cnica que nos caracteriza desde 1977.
                        </p>
                    </div>

                    <!-- 4 Beneficios Clave (Grilla ArquitectÃ³nica Recta con Iconos Cuadrados) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex items-center gap-4 p-5 bg-slate-50 border border-slate-200 hover:border-[#eb0a1e] transition-colors">
                            <div class="w-11 h-11 bg-red-50 text-[#eb0a1e] flex items-center justify-center shrink-0 text-lg">
                                <i class="fas fa-shield-heart"></i>
                            </div>
                            <div>
                                <span class="block text-xs font-bold uppercase tracking-wider text-slate-900">Extienda la Vida Ãštil</span>
                                <span class="block text-[11px] text-slate-500 font-light mt-0.5">Mantenimientos preventivos que cuidan tu vehÃ­culo</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 p-5 bg-slate-50 border border-slate-200 hover:border-[#eb0a1e] transition-colors">
                            <div class="w-11 h-11 bg-red-50 text-[#eb0a1e] flex items-center justify-center shrink-0 text-lg">
                                <i class="fas fa-gas-pump"></i>
                            </div>
                            <div>
                                <span class="block text-xs font-bold uppercase tracking-wider text-slate-900">Ahorre Combustible</span>
                                <span class="block text-[11px] text-slate-500 font-light mt-0.5">InyecciÃ³n y puesta a punto calibrada de fÃ¡brica</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 p-5 bg-slate-50 border border-slate-200 hover:border-[#eb0a1e] transition-colors">
                            <div class="w-11 h-11 bg-red-50 text-[#eb0a1e] flex items-center justify-center shrink-0 text-lg">
                                <i class="fas fa-coins"></i>
                            </div>
                            <div>
                                <span class="block text-xs font-bold uppercase tracking-wider text-slate-900">ReducciÃ³n de Costos</span>
                                <span class="block text-[11px] text-slate-500 font-light mt-0.5">PrevenciÃ³n temprana de desgastes mayores</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 p-5 bg-slate-50 border border-slate-200 hover:border-[#eb0a1e] transition-colors">
                            <div class="w-11 h-11 bg-red-50 text-[#eb0a1e] flex items-center justify-center shrink-0 text-lg">
                                <i class="fas fa-route"></i>
                            </div>
                            <div>
                                <span class="block text-xs font-bold uppercase tracking-wider text-slate-900">Evite Contratiempos</span>
                                <span class="block text-[11px] text-slate-500 font-light mt-0.5">Seguridad y confianza en cada viaje o jornada</span>
                            </div>
                        </div>
                    </div>

                    <!-- Personal Altamente Calificado (Bloque con Borde Lateral Rojo Estilo Kaizen) -->
                    <div class="border-l-4 border-[#eb0a1e] pl-6 space-y-4 bg-slate-50/70 p-6">
                        <h3 class="text-lg sm:text-xl font-light text-slate-900 font-heading uppercase tracking-normal">
                            Â¡<span class="font-normal text-[#eb0a1e]">Personal altamente calificado</span> para brindar los mejores servicios!
                        </h3>
                        <div class="space-y-3 text-sm text-slate-600 leading-relaxed font-light">
                            <p>
                                Nuestra <strong class="text-slate-900 font-medium">Gerencia de Servicios</strong> se encargarÃ¡ de atenderlo en todo el proceso durante su visita al Servicio TÃ©cnico, tomando nota de sus necesidades y brindÃ¡ndole en forma Ã¡gil toda la informaciÃ³n que necesita.
                            </p>
                            <p>
                                <strong class="text-slate-900 font-medium">TÃ©cnicos altamente capacitados</strong> estarÃ¡n poniendo el mejor de sus conocimientos para realizar los mantenimientos y reparaciones necesarias en su vehÃ­culo. El <strong class="text-slate-900 font-medium">Asesor de Repuestos</strong> podrÃ¡ brindarle toda la informaciÃ³n necesaria acerca de la disponibilidad y costos de accesorios y repuestos legÃ­timos.
                            </p>
                            <p>
                                <strong class="text-slate-900 font-medium">CONSUR S.A.</strong> cuenta con el Servicio TÃ©cnico oficial de los vehÃ­culos comercializados por la firma, ubicados en las diferentes sucursales, todos en una ubicaciÃ³n estratÃ©gica del departamento de ItapÃºa y Misiones.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Columna Derecha: Showcase del MecÃ¡nico con Sello de GarantÃ­a Recto -->
                <div class="lg:col-span-5 flex flex-col items-center justify-center" data-aos="fade-left" data-aos-delay="150">
                    <div class="relative w-full max-w-[420px]">
                        <img src="/images/pages/posventa-mechanic.png"
                             alt="Servicio TÃ©cnico Oficial CONSUR S.A."
                             class="w-full h-auto object-contain drop-shadow-2xl transform hover:scale-105 transition-transform duration-700">

                        <!-- Sello Flotante Recto con Borde Rojo -->
                        <div class="mt-6 bg-slate-950 text-white p-6 border-l-4 border-[#eb0a1e] shadow-xl">
                            <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#eb0a1e] block">
                                Respaldo Escrito de FÃ¡brica
                            </span>
                            <span class="text-base font-semibold font-heading uppercase tracking-wide block mt-1">
                                GarantÃ­a en Mano de Obra y Repuestos
                            </span>
                            <p class="text-xs text-slate-300 mt-1 font-light leading-relaxed">
                                Cada service cuenta con la tranquilidad de contar con trazabilidad, herramientas de diagnÃ³stico oficial Toyota y repuestos 100% legÃ­timos.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 6. FRANJA DE CONTACTO Y HORARIOS OFICIALES (BARRA COMPLETA MINIMALISTA) -->
    <section class="w-full py-12 bg-slate-950 text-white border-t border-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
                <div class="flex flex-wrap items-center gap-6 sm:gap-10 text-xs text-slate-300">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/10 text-[#eb0a1e] flex items-center justify-center text-sm shrink-0">
                            <i class="far fa-clock"></i>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block">Horario de AtenciÃ³n</span>
                            <span class="font-medium text-white">Lun a Vie: 07:00 a 12:00 y 14:00 a 17:30 &bull; SÃ¡b: 07:30 a 12:00</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/10 text-[#eb0a1e] flex items-center justify-center text-sm shrink-0">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block">Casa Central EncarnaciÃ³n</span>
                            <a href="tel:+59571204106" class="font-medium text-white hover:text-[#eb0a1e] transition">+595 71 204 106</a>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap items-center gap-3.5 shrink-0">
                    <a href="http://www.turnos365.com/turnos.aspx?con=131"
                       target="_blank" rel="noopener"
                       class="px-6 py-3.5 bg-[#eb0a1e] hover:bg-red-700 text-white text-xs font-bold uppercase tracking-widest transition shadow-lg shadow-red-600/25 flex items-center gap-2">
                        <i class="far fa-calendar-check text-xs"></i>
                        <span>Turnos Online</span>
                    </a>
                    <a href="https://wa.me/595985804106?text=Hola%20Consur%2C%20quisiera%20consultar%20sobre%20el%20Servicio%20T%C3%A9cnico%20Toyota."
                       target="_blank" rel="noopener"
                       class="px-6 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold uppercase tracking-widest transition shadow-lg shadow-emerald-600/25 flex items-center gap-2">
                        <i class="fab fa-whatsapp text-sm"></i>
                        <span>WhatsApp Taller</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>', 'Posventa Toyota | Consur S.A. â€“ Servicio TÃ©cnico Oficial y Repuestos LegÃ­timos', 'Servicio TÃ©cnico Oficial Toyota en Paraguay: Mantenimiento preventivo, Box ExprÃ©s, VehÃ­culo de CortesÃ­a y Taller MÃ³vil con Consur S.A.', true, 2, '2026-10-28 00:18:47', '2026-11-18 19:09:28');
INSERT INTO public.pages VALUES (5, 'CONSUR Broker de Seguros', 'seguros', 'Para proteger su esfuerzo y sus sueÃ±os. Servicio personalizado, profesional y confiable junto a las principales aseguradoras del paÃ­s.', '', '<div data-cms-layout="fullwidth" class="w-full">

    [slider:seguros]

    <!-- 2. SECCIÃ“N INSTITUCIONAL DE ANCHO COMPLETO (Sin cuadros cerrados, limpia y adaptable) -->
    <section class="w-full py-20 md:py-28 bg-white dark:bg-black border-b border-slate-200/80 dark:border-neutral-900 overflow-hidden transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                
                <!-- Columna Izquierda: PresentaciÃ³n Editorial con Animaciones Escalonadas -->
                <div class="lg:col-span-7 space-y-6">
                    <div data-aos="fade-right" data-aos-delay="50"
                         class="inline-flex items-center gap-3 text-red-600 dark:text-red-500 text-xs font-bold uppercase tracking-[0.25em]">
                        <span class="w-10 h-[2px] bg-red-600"></span>
                        <span>Respaldo Oficial Grupo CONSUR</span>
                    </div>

                    <h1 data-aos="fade-right" data-aos-delay="100"
                        class="text-3xl sm:text-4xl md:text-5xl font-light text-slate-900 dark:text-white font-heading uppercase tracking-wide leading-tight">
                        CONSUR <span class="font-bold text-red-600">Broker de Seguros</span>
                    </h1>

                    <p data-aos="fade-right" data-aos-delay="150"
                       class="text-lg sm:text-xl font-medium text-slate-800 dark:text-neutral-200 tracking-wide border-l-4 border-red-600 pl-4">
                        Para proteger su esfuerzo y sus sueÃ±os.
                    </p>

                    <p data-aos="fade-right" data-aos-delay="200"
                       class="text-slate-600 dark:text-neutral-300 text-sm sm:text-base leading-relaxed font-normal max-w-2xl">
                        Nuestra labor como corredora de seguros se enfoca en proteger a las familias y empresas, a travÃ©s de un servicio personalizado, profesional y confiable. Nos aliamos con las principales aseguradoras del paÃ­s para brindar una cobertura completa en pÃ³lizas personales, patrimoniales y empresariales.
                    </p>

                    <div data-aos="fade-up" data-aos-delay="250"
                         class="pt-4 flex flex-wrap items-center gap-4">
                        <a href="https://wa.me/595984222297?text=Hola%20Consur%20Broker%20de%20Seguros,%20quisiera%20solicitar%20asesoramiento%20sobre%20p%C3%B3lizas."
                           target="_blank" rel="noopener"
                           class="inline-flex items-center gap-3 bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-8 py-4 transition-colors duration-200 shadow-lg shadow-red-600/20">
                            <i class="fab fa-whatsapp text-base"></i>
                            <span>Solicitar AsesorÃ­a Ahora</span>
                        </a>
                        <a href="#coberturas"
                           class="inline-flex items-center gap-2.5 bg-transparent hover:bg-slate-100 dark:hover:bg-neutral-900 text-slate-900 dark:text-white font-bold text-xs uppercase tracking-widest px-7 py-4 transition-colors duration-200 border border-slate-300 dark:border-neutral-700">
                            <span>Ver Ramas de Cobertura</span>
                            <i class="fas fa-arrow-down text-[10px] text-red-600"></i>
                        </a>
                    </div>
                </div>

                <!-- Columna Derecha: Pilares ArquitectÃ³nicos Minimalistas con Entrada Escalonada -->
                <div class="lg:col-span-5">
                    <div class="divide-y divide-slate-200 dark:divide-neutral-800 border-y border-slate-200 dark:border-neutral-800">
                        <div data-aos="fade-left" data-aos-delay="100"
                             class="py-6 flex items-start gap-5 group">
                            <div class="w-12 h-12 bg-red-600 text-white flex items-center justify-center shrink-0 mt-0.5 shadow-md shadow-red-600/20">
                                <i class="fas fa-user-shield text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-sm sm:text-base font-bold uppercase tracking-wider text-slate-900 dark:text-white font-heading">
                                    Asesoramiento Personalizado
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-500 dark:text-neutral-400 mt-1 leading-relaxed">
                                    Analizamos cada riesgo de forma individual para ofrecerte la pÃ³liza exacta con la mejor relaciÃ³n costo-cobertura del mercado.
                                </p>
                            </div>
                        </div>

                        <div data-aos="fade-left" data-aos-delay="200"
                             class="py-6 flex items-start gap-5 group">
                            <div class="w-12 h-12 bg-slate-900 dark:bg-neutral-900 text-red-500 border border-slate-800 flex items-center justify-center shrink-0 mt-0.5">
                                <i class="fas fa-bolt text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-sm sm:text-base font-bold uppercase tracking-wider text-slate-900 dark:text-white font-heading">
                                    GestiÃ³n Ãgil de Siniestros
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-500 dark:text-neutral-400 mt-1 leading-relaxed">
                                    AcompaÃ±amiento directo ante cualquier eventualidad, agilizando trÃ¡mites y talleres oficiales con el respaldo integral de CONSUR S.A.
                                </p>
                            </div>
                        </div>

                        <div data-aos="fade-left" data-aos-delay="300"
                             class="py-6 flex items-start gap-5 group">
                            <div class="w-12 h-12 bg-slate-900 dark:bg-neutral-900 text-red-500 border border-slate-800 flex items-center justify-center shrink-0 mt-0.5">
                                <i class="fas fa-handshake text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-sm sm:text-base font-bold uppercase tracking-wider text-slate-900 dark:text-white font-heading">
                                    Alianzas con Aseguradoras LÃ­deres
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-500 dark:text-neutral-400 mt-1 leading-relaxed">
                                    Trabajamos con las compaÃ±Ã­as de mayor solvencia patrimonial del Paraguay para garantizar tu tranquilidad y la de tu familia.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 3. PROTECCIÃ“N INTEGRAL: BANNER FULL-SCREEN CON IMAGEN DE FONDO PARALLAX Y 4 ÃTEMS EN POSICIÃ“N HORIZONTAL -->
    <section id="coberturas" class="relative w-full py-24 md:py-32 bg-slate-950 text-white overflow-hidden">
        <!-- Imagen de Fondo Oficial con Efecto Parallax -->
        <div class="absolute inset-0 bg-cover bg-center bg-fixed"
             style="background-image: url(''/images/pages/seguros-bg.png'')"></div>
        <!-- Overlay Oscuro Gradual para Contraste de Alta Gama -->
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/90 via-slate-950/80 to-slate-950/95"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-16">
            
            <!-- Encabezado Centrado -->
            <div class="text-center max-w-3xl mx-auto space-y-4" data-aos="fade-up">
                <div class="inline-flex items-center gap-2.5 px-4 py-1.5 bg-red-600/20 border border-red-500/40 text-red-400 text-xs font-bold uppercase tracking-[0.25em]">
                    <span>ProtecciÃ³n Integral</span>
                </div>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-light text-white font-heading uppercase tracking-wide leading-tight">
                    Coberturas en PÃ³lizas <span class="font-bold text-red-500">Personales y Empresariales</span>
                </h2>
                <div class="w-16 h-[2px] bg-red-600 mx-auto"></div>
                <p class="text-sm sm:text-base text-slate-300 font-light leading-relaxed">
                    DiseÃ±amos y gestionamos planes integrales que aseguran la continuidad de tus proyectos, tu patrimonio y el bienestar de quienes mÃ¡s valorÃ¡s.
                </p>
            </div>

            <!-- 4 Ãtems en PosiciÃ³n Horizontal ocupando todo el ancho del contenedor (Wrapper AOS separado del hover transform) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8 items-stretch">
                
                <!-- Ãtem 1: Hogar -->
                <div data-aos="fade-up" data-aos-delay="100" class="flex">
                    <div class="group relative w-full bg-slate-950/75 hover:bg-slate-900/90 backdrop-blur-md border-t-2 border-t-red-600 border-x border-b border-white/15 hover:border-red-500/60 p-7 sm:p-8 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1.5 shadow-2xl">
                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <div class="w-14 h-14 bg-red-600 text-white flex items-center justify-center shadow-lg shadow-red-600/30 group-hover:scale-105 transition-transform">
                                    <i class="fas fa-house-chimney text-xl"></i>
                                </div>
                                <span class="text-3xl font-light text-white/20 group-hover:text-red-500/80 font-heading transition-colors select-none">
                                    01
                                </span>
                            </div>

                            <h3 class="text-xl font-bold text-white font-heading uppercase tracking-wide mb-3 group-hover:text-red-400 transition-colors">
                                Hogar
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed mb-5 font-light">
                                PÃ³lizas adaptadas a las necesidades de tu hogar para proteger la estructura y el equipamiento familiar.
                            </p>

                            <ul class="text-xs text-slate-300 space-y-2.5 pt-4 border-t border-white/10">
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Incendio de edificio y contenido</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Robo y daÃ±os por tentativa</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Cristales y electrodomÃ©sticos</span>
                                </li>
                            </ul>
                        </div>

                        <div class="mt-8 pt-4 border-t border-white/10">
                            <a href="https://wa.me/595984222297?text=Hola%20Consur%20Broker,%20quisiera%20cotizar%20un%20Seguro%20de%20Hogar."
                               target="_blank" rel="noopener"
                               class="inline-flex items-center justify-between w-full text-xs font-bold uppercase tracking-widest text-white group-hover:text-red-400 transition-colors">
                                <span>Cotizar Hogar</span>
                                <i class="fas fa-arrow-right text-[10px] text-red-500 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Ãtem 2: AutomÃ³viles -->
                <div data-aos="fade-up" data-aos-delay="200" class="flex">
                    <div class="group relative w-full bg-slate-950/75 hover:bg-slate-900/90 backdrop-blur-md border-t-2 border-t-red-600 border-x border-b border-white/15 hover:border-red-500/60 p-7 sm:p-8 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1.5 shadow-2xl">
                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <div class="w-14 h-14 bg-red-600 text-white flex items-center justify-center shadow-lg shadow-red-600/30 group-hover:scale-105 transition-transform">
                                    <i class="fas fa-car-side text-xl"></i>
                                </div>
                                <span class="text-3xl font-light text-white/20 group-hover:text-red-500/80 font-heading transition-colors select-none">
                                    02
                                </span>
                            </div>

                            <h3 class="text-xl font-bold text-white font-heading uppercase tracking-wide mb-3 group-hover:text-red-400 transition-colors">
                                AutomÃ³viles
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed mb-5 font-light">
                                Respaldo total para tu vehÃ­culo 0 Km, usado o flota comercial con asistencia permanente en ruta.
                            </p>

                            <ul class="text-xs text-slate-300 space-y-2.5 pt-4 border-t border-white/10">
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Seguro contra todo riesgo</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Responsabilidad Civil hacia terceros</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Asistencia de GrÃºa las 24 hs</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Cobertura nacional y MERCOSUR</span>
                                </li>
                            </ul>
                        </div>

                        <div class="mt-8 pt-4 border-t border-white/10">
                            <a href="https://wa.me/595984222297?text=Hola%20Consur%20Broker,%20quisiera%20cotizar%20un%20Seguro%20de%20Autom%C3%B3vil."
                               target="_blank" rel="noopener"
                               class="inline-flex items-center justify-between w-full text-xs font-bold uppercase tracking-widest text-white group-hover:text-red-400 transition-colors">
                                <span>Cotizar AutomÃ³vil</span>
                                <i class="fas fa-arrow-right text-[10px] text-red-500 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Ãtem 3: Comercio -->
                <div data-aos="fade-up" data-aos-delay="300" class="flex">
                    <div class="group relative w-full bg-slate-950/75 hover:bg-slate-900/90 backdrop-blur-md border-t-2 border-t-red-600 border-x border-b border-white/15 hover:border-red-500/60 p-7 sm:p-8 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1.5 shadow-2xl">
                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <div class="w-14 h-14 bg-red-600 text-white flex items-center justify-center shadow-lg shadow-red-600/30 group-hover:scale-105 transition-transform">
                                    <i class="fas fa-building-shield text-xl"></i>
                                </div>
                                <span class="text-3xl font-light text-white/20 group-hover:text-red-500/80 font-heading transition-colors select-none">
                                    03
                                </span>
                            </div>

                            <h3 class="text-xl font-bold text-white font-heading uppercase tracking-wide mb-3 group-hover:text-red-400 transition-colors">
                                Comercio
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed mb-5 font-light">
                                ProtecciÃ³n integral para instalaciones empresariales, mercaderÃ­as, maquinarias y producciÃ³n agrÃ­cola.
                            </p>

                            <ul class="text-xs text-slate-300 space-y-2.5 pt-4 border-t border-white/10">
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Incendio y riesgos aliados</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Multirriesgo comercial e industrial</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Seguro AgrÃ­cola y patrimonial</span>
                                </li>
                            </ul>
                        </div>

                        <div class="mt-8 pt-4 border-t border-white/10">
                            <a href="https://wa.me/595984222297?text=Hola%20Consur%20Broker,%20quisiera%20cotizar%20un%20Seguro%20para%20Comercio%20/%20Empresa."
                               target="_blank" rel="noopener"
                               class="inline-flex items-center justify-between w-full text-xs font-bold uppercase tracking-widest text-white group-hover:text-red-400 transition-colors">
                                <span>Cotizar Comercio</span>
                                <i class="fas fa-arrow-right text-[10px] text-red-500 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Ãtem 4: Vida -->
                <div data-aos="fade-up" data-aos-delay="400" class="flex">
                    <div class="group relative w-full bg-slate-950/75 hover:bg-slate-900/90 backdrop-blur-md border-t-2 border-t-red-600 border-x border-b border-white/15 hover:border-red-500/60 p-7 sm:p-8 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1.5 shadow-2xl">
                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <div class="w-14 h-14 bg-red-600 text-white flex items-center justify-center shadow-lg shadow-red-600/30 group-hover:scale-105 transition-transform">
                                    <i class="fas fa-heart-pulse text-xl"></i>
                                </div>
                                <span class="text-3xl font-light text-white/20 group-hover:text-red-500/80 font-heading transition-colors select-none">
                                    04
                                </span>
                            </div>

                            <h3 class="text-xl font-bold text-white font-heading uppercase tracking-wide mb-3 group-hover:text-red-400 transition-colors">
                                Vida
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed mb-5 font-light">
                                Tranquilidad y previsiÃ³n financiera para proteger el futuro de tu familia y tu equipo de trabajo.
                            </p>

                            <ul class="text-xs text-slate-300 space-y-2.5 pt-4 border-t border-white/10">
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Seguro de vida individual</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Accidentes Personales (individual y conjunta)</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <i class="fas fa-check text-red-500 text-[10px] mt-1 shrink-0"></i>
                                    <span>Respaldo e indemnizaciÃ³n familiar</span>
                                </li>
                            </ul>
                        </div>

                        <div class="mt-8 pt-4 border-t border-white/10">
                            <a href="https://wa.me/595984222297?text=Hola%20Consur%20Broker,%20quisiera%20cotizar%20un%20Seguro%20de%20Vida."
                               target="_blank" rel="noopener"
                               class="inline-flex items-center justify-between w-full text-xs font-bold uppercase tracking-widest text-white group-hover:text-red-400 transition-colors">
                                <span>Cotizar Vida</span>
                                <i class="fas fa-arrow-right text-[10px] text-red-500 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 4. CARRUSEL DE ASEGURADORAS ALIADAS (Ancho Completo, Logos con el Mismo Alto Exacto) -->
    <section class="w-full py-20 md:py-24 bg-white dark:bg-black border-b border-slate-200/80 dark:border-neutral-900 overflow-hidden select-none transition-colors duration-200"
             x-data="{
                currentSlide: 0,
                totalItems: 7,
                itemsPerPage: 4,
                timer: null,
                touchStartX: 0,
                touchEndX: 0,
                get maxIndex() {
                    return Math.max(0, this.totalItems - this.itemsPerPage);
                },
                updateItemsPerPage() {
                    if (window.innerWidth < 640) {
                        this.itemsPerPage = 1;
                    } else if (window.innerWidth < 1024) {
                        this.itemsPerPage = 2;
                    } else if (window.innerWidth < 1280) {
                        this.itemsPerPage = 3;
                    } else {
                        this.itemsPerPage = 4;
                    }
                    if (this.currentSlide > this.maxIndex) {
                        this.currentSlide = this.maxIndex;
                    }
                },
                next() {
                    this.currentSlide = this.currentSlide >= this.maxIndex ? 0 : this.currentSlide + 1;
                },
                prev() {
                    this.currentSlide = this.currentSlide <= 0 ? this.maxIndex : this.currentSlide - 1;
                },
                startAuto() {
                    this.stopAuto();
                    this.timer = setInterval(() => this.next(), 3200);
                },
                stopAuto() {
                    if (this.timer) {
                        clearInterval(this.timer);
                        this.timer = null;
                    }
                },
                handleTouchStart(e) {
                    this.touchStartX = e.changedTouches[0].screenX;
                },
                handleTouchEnd(e) {
                    this.touchEndX = e.changedTouches[0].screenX;
                    if (this.touchStartX - this.touchEndX > 50) this.next();
                    if (this.touchEndX - this.touchStartX > 50) this.prev();
                }
             }"
             x-init="updateItemsPerPage(); startAuto()"
             @resize.window.debounce.100ms="updateItemsPerPage()"
             @mouseenter="stopAuto()"
             @mouseleave="startAuto()"
             @touchstart.passive="handleTouchStart($event); stopAuto()"
             @touchend.passive="handleTouchEnd($event); startAuto()">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            
            <!-- Encabezado y Controles -->
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 pb-6 border-b border-slate-200 dark:border-neutral-800">
                <div data-aos="fade-right">
                    <div class="inline-flex items-center gap-2.5 text-red-600 dark:text-red-500 text-xs font-bold uppercase tracking-[0.25em] mb-2">
                        <span class="w-8 h-[2px] bg-red-600"></span>
                        <span>CompaÃ±Ã­as Oficiales</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-slate-900 dark:text-white font-heading uppercase tracking-wide">
                        Trabajamos con las siguientes <span class="font-bold">aseguradoras</span>
                    </h2>
                </div>

                <!-- Botones Prev / Next -->
                <div data-aos="fade-left" class="flex items-center gap-2 self-start sm:self-auto">
                    <button type="button"
                            @click="prev()"
                            class="w-11 h-11 border border-slate-200 dark:border-neutral-800 bg-white dark:bg-[#0d0d0d] hover:bg-red-600 hover:border-red-600 hover:text-white text-slate-700 dark:text-neutral-300 flex items-center justify-center transition-colors duration-200 cursor-pointer"
                            aria-label="Anterior">
                        <i class="fas fa-chevron-left text-xs"></i>
                    </button>
                    <button type="button"
                            @click="next()"
                            class="w-11 h-11 border border-slate-200 dark:border-neutral-800 bg-white dark:bg-[#0d0d0d] hover:bg-red-600 hover:border-red-600 hover:text-white text-slate-700 dark:text-neutral-300 flex items-center justify-center transition-colors duration-200 cursor-pointer"
                            aria-label="Siguiente">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </button>
                </div>
            </div>

            <!-- Pista del Carrusel: Todos los logos tienen exactamente el mismo alto (h-10 / 40px) -->
            <div data-aos="fade-up" data-aos-delay="150" class="overflow-hidden relative py-4">
                <div class="flex items-center transition-transform duration-500 ease-out"
                     :style="`transform: translateX(-${currentSlide * (100 / itemsPerPage)}%);`">

                    <!-- 1. La Consolidada -->
                    <div class="flex-shrink-0 px-4" :style="`width: ${100 / itemsPerPage}%;`">
                        <div class="h-28 border-b-2 border-transparent hover:border-red-600 bg-slate-50/70 dark:bg-white/[0.03] px-6 flex items-center justify-center transition-all duration-300 group">
                            <img src="/images/pages/seg-consolidada.png"
                                 alt="La Consolidada de Seguros"
                                 class="h-10 sm:h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105 dark:brightness-110">
                        </div>
                    </div>

                    <!-- 2. Sudameris Seguros -->
                    <div class="flex-shrink-0 px-4" :style="`width: ${100 / itemsPerPage}%;`">
                        <div class="h-28 border-b-2 border-transparent hover:border-red-600 bg-slate-50/70 dark:bg-white/[0.03] px-6 flex items-center justify-center transition-all duration-300 group">
                            <img src="/images/pages/seg-sudameris.png"
                                 alt="Sudameris Seguros"
                                 class="h-10 sm:h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105 dark:brightness-110">
                        </div>
                    </div>

                    <!-- 3. Aseguradora del Este -->
                    <div class="flex-shrink-0 px-4" :style="`width: ${100 / itemsPerPage}%;`">
                        <div class="h-28 border-b-2 border-transparent hover:border-red-600 bg-slate-50/70 dark:bg-white/[0.03] px-6 flex items-center justify-center transition-all duration-300 group">
                            <img src="/images/pages/seg-deleste.png"
                                 alt="Aseguradora del Este"
                                 class="h-10 sm:h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105 dark:brightness-110">
                        </div>
                    </div>

                    <!-- 4. Mapfre Seguros -->
                    <div class="flex-shrink-0 px-4" :style="`width: ${100 / itemsPerPage}%;`">
                        <div class="h-28 border-b-2 border-transparent hover:border-red-600 bg-slate-50/70 dark:bg-white/[0.03] px-6 flex items-center justify-center transition-all duration-300 group">
                            <img src="/images/pages/seg-mapfre.png"
                                 alt="Mapfre Seguros"
                                 class="h-10 sm:h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105 dark:brightness-110">
                        </div>
                    </div>

                    <!-- 5. Royal Seguros -->
                    <div class="flex-shrink-0 px-4" :style="`width: ${100 / itemsPerPage}%;`">
                        <div class="h-28 border-b-2 border-transparent hover:border-red-600 bg-slate-50/70 dark:bg-white/[0.03] px-6 flex items-center justify-center transition-all duration-300 group">
                            <img src="/images/pages/seg-royal.png"
                                 alt="Royal Seguros"
                                 class="h-10 sm:h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105 dark:brightness-110">
                        </div>
                    </div>

                    <!-- 6. La Rural Seguros -->
                    <div class="flex-shrink-0 px-4" :style="`width: ${100 / itemsPerPage}%;`">
                        <div class="h-28 border-b-2 border-transparent hover:border-red-600 bg-slate-50/70 dark:bg-white/[0.03] px-6 flex items-center justify-center transition-all duration-300 group">
                            <img src="/images/pages/seg-aseguradora-5.png"
                                 alt="La Rural Seguros"
                                 class="h-10 sm:h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105 dark:brightness-110">
                        </div>
                    </div>

                    <!-- 7. La AgrÃ­cola CompaÃ±Ã­a de Seguros -->
                    <div class="flex-shrink-0 px-4" :style="`width: ${100 / itemsPerPage}%;`">
                        <div class="h-28 border-b-2 border-transparent hover:border-red-600 bg-slate-50/70 dark:bg-white/[0.03] px-6 flex items-center justify-center transition-all duration-300 group">
                            <img src="/images/pages/seg-laagricola.png"
                                 alt="La AgrÃ­cola CompaÃ±Ã­a de Seguros"
                                 class="h-10 sm:h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105 dark:brightness-110">
                        </div>
                    </div>

                </div>
            </div>

            <!-- Indicador de PaginaciÃ³n Lineal -->
            <div data-aos="fade-up" data-aos-delay="250" class="flex items-center justify-center gap-2">
                <template x-for="i in (maxIndex + 1)" :key="i">
                    <button type="button"
                            @click="currentSlide = i - 1"
                            class="h-1 transition-all duration-300 cursor-pointer"
                            :class="currentSlide === (i - 1) ? ''w-10 bg-red-600'' : ''w-3 bg-slate-200 dark:bg-neutral-800 hover:bg-slate-400''"></button>
                </template>
            </div>

        </div>
    </section>

    <!-- 5. REDES SOCIALES Y CONTACTO DIRECTO DE ANCHO COMPLETO -->
    <section class="w-full py-20 md:py-24 bg-[#08090c] text-white relative overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-[2px] bg-gradient-to-r from-transparent via-red-600 to-transparent"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-8">
            <div data-aos="fade-up" class="space-y-3 max-w-2xl mx-auto">
                <span class="text-xs font-bold uppercase tracking-[0.25em] text-red-500 block">
                    AtenciÃ³n Directa & Comunidad
                </span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-light font-heading uppercase tracking-wide">
                    SeguÃ­ las Redes Sociales de <span class="font-bold text-white">CONSUR Broker de Seguros</span>
                </h2>
                <p class="text-xs sm:text-sm text-neutral-400 font-light leading-relaxed">
                    Conectate con nuestro equipo para recibir novedades, promociones vigentes y asistencia inmediata en tus pÃ³lizas.
                </p>
            </div>

            <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
                <div data-aos="fade-up" data-aos-delay="100">
                    <a href="https://www.facebook.com/share/12KrjKDoXnH/?mibextid=wwXIfr"
                       target="_blank" rel="noopener"
                       class="inline-flex items-center justify-center gap-3 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-8 py-4 transition-all duration-200 shadow-lg shadow-red-600/25 min-w-[200px]">
                        <i class="fab fa-facebook-f text-sm"></i>
                        <span>Facebook</span>
                    </a>
                </div>

                <div data-aos="fade-up" data-aos-delay="200">
                    <a href="https://www.instagram.com/consurbroker?igsh=ZmdoemNmbTdsc29s"
                       target="_blank" rel="noopener"
                       class="inline-flex items-center justify-center gap-3 bg-[#eb0a1e] hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-8 py-4 transition-all duration-200 shadow-lg shadow-red-600/25 min-w-[200px]">
                        <i class="fab fa-instagram text-base"></i>
                        <span>Instagram</span>
                    </a>
                </div>

                <div data-aos="fade-up" data-aos-delay="300">
                    <a href="https://wa.me/595984222297"
                       target="_blank" rel="noopener"
                       class="inline-flex items-center justify-center gap-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs uppercase tracking-widest px-8 py-4 transition-all duration-200 shadow-lg shadow-emerald-600/25 min-w-[200px]">
                        <i class="fab fa-whatsapp text-base"></i>
                        <span>WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>', 'Consur Broker de Seguros | PÃ³lizas Personales y Empresariales', 'Consur Broker de Seguros en Paraguay. Coberturas de Hogar, AutomÃ³viles, Comercio y Vida con las principales aseguradoras del paÃ­s.', true, 5, '2026-10-29 13:42:38', '2026-11-19 13:05:22');


--
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- Data for Name: podcasts; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.podcasts VALUES (1, 'Episodio 12', 'TecnologÃ­a HÃ­brida Toyota: Mitos, Realidades y Ahorro en Paraguay', 'Conversamos con ingenieros de Toyota y especialistas sobre cÃ³mo funciona el sistema hÃ­brido autorrecargable y su rendimiento en rutas de nuestro paÃ­s.', 'Equipo TÃ©cnico Oficial Consur', 'https://open.spotify.com/show/2c7HzcDvLF5XXMPbOckJn2', 'https://youtube.com', 'https://images.unsplash.com/photo-1590602847861-f357a9332bbc?auto=format&fit=crop&q=80&w=600', '42 min', '2026-09-25', true, 1, '2026-10-05 02:20:26', '2026-10-05 02:20:26');


--
-- Data for Name: posts; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.posts VALUES (1, 'CONSUR REALIZÃ“ EL ACTO DE PALADA INICIAL DE SU NUEVA SUCURSAL EN BELLA VISTA', 'consur-realizo-el-acto-de-palada-inicial-de-su-nueva-sucursal-en-bella-vista', 'Novedades', 'La empresa continÃºa apostando al crecimiento de ItapÃºa con la que serÃ¡ su quinta sucursal. En una jornada cargada de emociones y significado, CONSUR realizÃ³ este viernes el acto de palada inicial de su nueva sucursal en la ciudad de Bella Vista, reafirmando su compromiso con el desarrollo de la regiÃ³n y consolidando su presencia [â€¦]', '
<p class="wp-block-paragraph"><strong>La empresa continÃºa apostando al crecimiento de ItapÃºa con la que serÃ¡ su quinta sucursal.</strong></p>



<p class="wp-block-paragraph">En una jornada cargada de emociones y significado, CONSUR realizÃ³ este viernes el acto de palada inicial de su nueva sucursal en la ciudad de Bella Vista, reafirmando su compromiso con el desarrollo de la regiÃ³n y consolidando su presencia como Dealer Oficial Toyota en los departamentos de ItapÃºa y Misiones.</p>



<p class="wp-block-paragraph">La ceremonia tuvo lugar en una fecha muy especial para la empresa, coincidiendo con el cumpleaÃ±os de su presidente, <strong>Don Carlos Szopa</strong>, y contÃ³ con la participaciÃ³n de directivos, gerentes, colaboradores, familiares, representantes de medios de comunicaciÃ³n, autoridades locales encabezadas por el intendente municipal <strong>Don Euclides de Godois</strong>, asÃ­ como miembros de la Junta Municipal.</p>



<p class="wp-block-paragraph">El acto se iniciÃ³ con una bendiciÃ³n a cargo del <strong>Padre RomÃ¡n Borowski</strong>, quien elevÃ³ una oraciÃ³n por el Ã©xito de la nueva obra, sus colaboradores y las familias que forman parte de la historia de CONSUR.</p>



<p class="wp-block-paragraph">Durante su discurso, <strong>Don Carlos Szopa</strong> agradeciÃ³ la presencia de los asistentes y recordÃ³ los <strong>48 aÃ±os de trayectoria de la empresa</strong>, destacando que esta nueva inversiÃ³n representa un paso importante para seguir acercando los servicios Toyota a mÃ¡s clientes de la regiÃ³n.</p>



<p class="wp-block-paragraph">â€œBella Vista serÃ¡ una de las sucursales con mayores comodidades para nuestros clientes, con todos los servicios y la atenciÃ³n que nos caracteriza. Apostamos por esta ciudad por su ubicaciÃ³n estratÃ©gica y por la confianza de tantos clientes y amigos que ya forman parte de nuestra historia en esta zonaâ€, expresÃ³.</p>



<p class="wp-block-paragraph">Por su parte, el director de la firma, <strong>Juan AndrÃ©s Szopa</strong>, destacÃ³ que la nueva sucursal tambiÃ©n generarÃ¡ nuevas oportunidades laborales para la comunidad local y recordÃ³ con emociÃ³n a su madre, <strong>DoÃ±a Esperanza Ivasiuten</strong>, cuyo legado continÃºa inspirando a la familia y a toda la organizaciÃ³n.</p>



<p class="wp-block-paragraph">â€œSeguiremos transmitiendo ese don de servicio hacia las personas que ella nos inculcÃ³ y que fue ejemplo durante tantos aÃ±os acompaÃ±ando a nuestros clientes. Ese espÃ­ritu sigue siendo uno de los pilares fundamentales de CONSURâ€, seÃ±alÃ³.</p>



<p class="wp-block-paragraph">A su turno, el intendente municipal <strong>Euclides de Godois</strong> manifestÃ³ su satisfacciÃ³n por la llegada de la nueva sucursal a Bella Vista y valorÃ³ el impacto positivo que tendrÃ¡ para la ciudad.</p>



<p class="wp-block-paragraph">â€œEs un dÃ­a muy especial para Bella Vista. Estamos felices de recibir a CONSUR y de que finalmente se concrete esta obra, que generarÃ¡ oportunidades laborales y aportarÃ¡ al desarrollo econÃ³mico de nuestra comunidad. Agradecemos a la familia Szopa y a toda la empresa por confiar y apostar por nuestra ciudadâ€, expresÃ³.</p>



<p class="wp-block-paragraph">La nueva sucursal representa ademÃ¡s un importante desafÃ­o para la nueva generaciÃ³n de la familia Szopa, que continÃºa fortaleciendo el legado de una empresa familiar construida sobre valores de trabajo, cercanÃ­a y servicio.</p>



<p class="wp-block-paragraph">Al finalizar el acto protocolar, los presentes compartieron un brindis y un refrigerio para celebrar el inicio de esta nueva etapa institucional y homenajear a Don Carlos Szopa en el dÃ­a de su cumpleaÃ±os.</p>



<p class="wp-block-paragraph">Con esta nueva inversiÃ³n, CONSUR reafirma su compromiso con el crecimiento de ItapÃºa, apostando al desarrollo regional, la generaciÃ³n de empleo y la mejora continua de la experiencia de sus clientes, manteniÃ©ndose siempre cerca de las comunidades que acompaÃ±a desde hace casi cinco dÃ©cadas.</p>
', '/images/novedades/consur-realizo-el-acto-de-palada-inicial-de-su-nueva-sucursal-en-bella-vista.jpg', '2026-06-17 14:28:22', true, 'CONSUR REALIZÃ“ EL ACTO DE PALADA INICIAL DE SU NUEVA SUCURSAL EN BELLA VISTA', 'La empresa continÃºa apostando al crecimiento de ItapÃºa con la que serÃ¡ su quinta sucursal. En una jornada cargada de emociones y significado, CONSUR realizÃ³ est...', '2026-11-01 02:02:22', '2026-11-01 02:02:22', NULL);
INSERT INTO public.posts VALUES (2, 'ItapÃºa hizo historia: el Campeonato Panamericano de MTB posiciona a Paraguay en la Ã©lite del deporte continental', 'itapua-hizo-historia-el-campeonato-panamericano-de-mtb-posiciona-a-paraguay-en-la-elite-del-deporte-continental', 'Novedades', 'Por primera vez en la historia, el departamento de ItapÃºa fue sede del Campeonato Panamericano de Mountain Bike (MTB), consolidando a Paraguay como un nuevo hub regional para grandes eventos deportivos internacionales. El circuito de AguaVista, en San Juan del ParanÃ¡, recibiÃ³ a delegaciones de mÃ¡s de 15 paÃ­ses del continente, reuniendo a los mejores [â€¦]', '
<p class="wp-block-paragraph">Por primera vez en la historia, el departamento de ItapÃºa fue sede del Campeonato Panamericano de Mountain Bike (MTB), consolidando a Paraguay como un nuevo hub regional para grandes eventos deportivos internacionales.</p>



<p class="wp-block-paragraph">El circuito de AguaVista, en San Juan del ParanÃ¡, recibiÃ³ a delegaciones de mÃ¡s de 15 paÃ­ses del continente, reuniendo a los mejores exponentes del ciclismo en disciplinas como XCO, XCC, XCE y relevos por equipos (XCR), en una semana marcada por la alta competencia, la integraciÃ³n cultural y una destacada organizaciÃ³n.</p>



<p class="wp-block-paragraph">Durante cinco jornadas, atletas de paÃ­ses como Brasil, Colombia, Chile, Argentina, Estados Unidos, CanadÃ¡ y MÃ©xico, entre otros, ofrecieron un espectÃ¡culo de primer nivel, con podios ampliamente disputados y un nivel tÃ©cnico que reafirma el crecimiento del MTB en AmÃ©rica.</p>



<p class="wp-block-paragraph">El evento contÃ³ con la participaciÃ³n de aproximadamente 300 ciclistas y una convocatoria cercana a las 2.000 personas entre pÃºblico, equipos tÃ©cnicos, prensa y acompaÃ±antes, generando un impacto directo en la economÃ­a local y en la promociÃ³n turÃ­stica de ItapÃºa.</p>



<p class="wp-block-paragraph">La organizaciÃ³n fue ampliamente valorada por delegaciones y autoridades, destacÃ¡ndose la infraestructura del circuito, la logÃ­stica, la seguridad y los servicios brindados, en un entorno natural que se mostrÃ³ a la altura de competencias internacionales de primer nivel.</p>



<p class="wp-block-paragraph">MÃ¡s allÃ¡ de lo deportivo, el Panamericano representÃ³ una plataforma estratÃ©gica para posicionar a Paraguay en el calendario internacional, reafirmando su capacidad para albergar eventos de gran magnitud. Este logro se suma a hitos recientes como el Rally del Paraguay, fortaleciendo la imagen del paÃ­s como destino de grandes competencias y experiencias.</p>



<p class="wp-block-paragraph">Asimismo, el evento dejÃ³ un legado significativo para el desarrollo del ciclismo nacional, impulsando a nuevas generaciones de atletas y fortaleciendo el trabajo de formaciÃ³n que se viene realizando en distintas regiones del paÃ­s.</p>



<p class="wp-block-paragraph">Con una organizaciÃ³n sÃ³lida, una convocatoria internacional destacada y el acompaÃ±amiento del pÃºblico, el Campeonato Panamericano de MTB 2026 se consolida como un antes y un despuÃ©s para el deporte paraguayo, proyectando a ItapÃºa y al paÃ­s hacia nuevos desafÃ­os en el escenario deportivo global.</p>



<p class="wp-block-paragraph"></p>
', '/images/novedades/itapua-hizo-historia-el-campeonato-panamericano-de-mtb-posiciona-a-paraguay-en-la-elite-del-deporte-continental.jpeg', '2026-04-30 09:55:24', true, 'ItapÃºa hizo historia: el Campeonato Panamericano de MTB posiciona a Paraguay en la Ã©lite del deporte continental', 'Por primera vez en la historia, el departamento de ItapÃºa fue sede del Campeonato Panamericano de Mountain Bike (MTB), consolidando a Paraguay como un nuevo hub...', '2026-11-01 02:02:23', '2026-11-01 02:02:23', NULL);
INSERT INTO public.posts VALUES (3, 'CONSUR PRESENTA SU NUEVO CICLO DE ENTREVISTAS A PILOTOS DE RALLY', 'consur-presenta-su-nuevo-ciclo-de-entrevistas-a-pilotos-de-rally', 'Novedades', 'Historias reales, pasiÃ³n por el rally y el sueÃ±o de representar al paÃ­s en lo mÃ¡s alto. CONSUR, concesionaria oficial Toyota en el sur del paÃ­s, lanza oficialmente su nuevo proyecto audiovisual: â€œCONSUR TALKS: Una pasiÃ³n, un paÃ­s, un mundialâ€, un podcast que lleva la adrenalina del rally paraguayo a otro nivel. Conducido por la [â€¦]', '
<p class="wp-block-paragraph"><strong><em>Historias reales, pasiÃ³n por el rally y el sueÃ±o de representar al paÃ­s en lo mÃ¡s alto.</em></strong></p>



<p class="wp-block-paragraph">CONSUR, concesionaria oficial Toyota en el sur del paÃ­s, lanza oficialmente su nuevo proyecto audiovisual: <strong>â€œCONSUR TALKS: Una pasiÃ³n, un paÃ­s, un mundialâ€</strong>, un podcast que lleva la adrenalina del rally paraguayo a otro nivel.</p>



<p class="wp-block-paragraph">Conducido por la comunicadora Bianca Guerrero, este espacio propone una serie de entrevistas Ã­ntimas y reveladoras con reconocidos pilotos de Rally del Paraguay, los que corren con los colores de Toyota Gazoo Racing.</p>



<p class="wp-block-paragraph">Los episodios giran en torno a sus historias de vida, trayectorias deportivas, desafÃ­os superados y cÃ³mo estÃ¡n viviendo la cuenta regresiva hacia el primer Mundial de Rally que se celebrarÃ¡ en ItapÃºa en elm es de agosto, un evento histÃ³rico para el deporte motor nacional.</p>



<p class="wp-block-paragraph">Este ciclo de entrevistas nace como una iniciativa de CONSUR, dealer de Toyota Paraguay con el objetivo de ofrecer un contenido original que conecte con toda la comunidad automotriz â€”desde los fanÃ¡ticos del rally hasta quienes apenas se inician en este apasionante mundoâ€” brindando una mirada cercana y humana de quienes lo dejan todo en la pista.</p>



<p class="wp-block-paragraph"><strong>Â¿DÃ³nde ver â€œCONSUR TALKSâ€?</strong></p>



<p class="wp-block-paragraph"><strong>ðŸŸ¥</strong><strong> YouTube: Entrevistas completas en el canal ConsurToyota</strong> </p>



<p class="wp-block-paragraph"><a href="https://www.youtube.com/@Consurtoyota">https://www.youtube.com/@Consurtoyota</a></p>



<p class="wp-block-paragraph"><strong>ðŸŸª Instagram: Versiones cortas en @consur_toyota</strong></p>



<p class="wp-block-paragraph"> <a href="https://www.instagram.com/consur_toyota/">https://www.instagram.com/consur_toyota/</a></p>



<p class="wp-block-paragraph"><strong>ðŸŽµ TikTok: Momentos destacados en @consurtoyota</strong> </p>



<p class="wp-block-paragraph"><a href="https://www.tiktok.com/@consurtoyota?_t=ZM-8xiprZD1Ne4&amp;_r=1">https://www.tiktok.com/@consurtoyota?_t=ZM-8xiprZD1Ne4&amp;_r=1</a></p>



<p class="wp-block-paragraph">Los capÃ­tulos se estrenarÃ¡n cada 15 dÃ­as, acompaÃ±ando de cerca la cuenta regresiva hacia el evento automovilÃ­stico mÃ¡s importante del aÃ±o.</p>



<p class="wp-block-paragraph">CONSUR TALKS busca amplificar la voz de los verdaderos protagonistas del rally nacional, en un aÃ±o donde todo un paÃ­s se prepara para rugir con orgullo en el escenario mundial.</p>
', '/images/novedades/consur-presenta-su-nuevo-ciclo-de-entrevistas-a-pilotos-de-rally.jpg', '2025-07-03 11:12:15', true, 'CONSUR PRESENTA SU NUEVO CICLO DE ENTREVISTAS A PILOTOS DE RALLY', 'Historias reales, pasiÃ³n por el rally y el sueÃ±o de representar al paÃ­s en lo mÃ¡s alto. CONSUR, concesionaria oficial Toyota en el sur del paÃ­s, lanza oficialme...', '2026-11-01 02:02:25', '2026-11-01 02:02:25', NULL);
INSERT INTO public.posts VALUES (4, 'Culmina con Ã‰xito la Copa Aguavista 2025', 'culmina-con-exito-la-copa-aguavista-2025', 'Novedades', 'David Domingo Campos Motos y Agustina MarÃ­a Apaza, Campeones de la Copa Aguavista UCI MTB XCO2025Tras una temporada de exigente competencia en los desafiantes circuitos del Club Aguavista de San Juandel ParanÃ¡ la ediciÃ³n culminÃ³ con la consagraciÃ³n de los lÃ­deres de la categorÃ­a Ã©lite, marcando un hitodeportivo en este dÃ­a de profunda significaciÃ³n.La categorÃ­a [â€¦]', '
<p class="wp-block-paragraph">David Domingo Campos Motos y Agustina MarÃ­a Apaza, Campeones de la Copa Aguavista UCI MTB XCO<br />2025<br />Tras una temporada de exigente competencia en los desafiantes circuitos del Club Aguavista de San Juan<br />del ParanÃ¡ la ediciÃ³n culminÃ³ con la consagraciÃ³n de los lÃ­deres de la categorÃ­a Ã©lite, marcando un hito<br />deportivo en este dÃ­a de profunda significaciÃ³n.<br />La categorÃ­a Ã‰lite Masculina presenciÃ³ la coronaciÃ³n del atleta de Ã©lite DAVID DOMINGO CAMPOS MOTOS<br />(BH Team Coloma) como el indiscutible campeÃ³n de esta ediciÃ³n en el dÃ­a de su cumpleaÃ±os.<br />Su trayectoria a lo largo de la copa, caracterizada por una notable consistencia, una potencia fÃ­sica<br />excepcional y una estrategia de carrera impecable, lo catapultÃ³ a la cima del podio.<br />El BH Team Coloma de EspaÃ±a reafirmÃ³ su liderazgo en la disciplina al copar los tres primeros lugares, con<br />JOFRE CULLELL asegurando la segunda posiciÃ³n y CATRIEL ANDRÃ‰S SOTO obteniendo un meritorio tercer<br />puesto. Este logro subraya la solidez y el talento colectivo del equipo.<br />En la categorÃ­a Ã‰lite Femenina, la ciclista argentina AGUSTINA MARÃA APAZA demostrÃ³ una vez mÃ¡s su<br />dominio en la especialidad, adjudicÃ¡ndose el primer lugar y el tÃ­tulo de campeona de la Copa Aguavista<br />UCI MTB XCO 2025. Su compatriota, AGUSTINA ANTONELLA QUIRÃ“S, tambiÃ©n protagonizÃ³ una destacada<br />actuaciÃ³n, alcanzando el segundo puesto y evidenciando el creciente nivel del ciclismo de montaÃ±a<br />femenino en Argentina. La atleta brasileÃ±a LUIZA EUZEBIO DE SOUZA (LUIZA SOUZA) completÃ³ el podio<br />en la tercera posiciÃ³n, resaltando la competitividad y el talento regional en esta disciplina de alto<br />rendimiento.<br />El evento contÃ³ con la presencia del Gobernador de ItapÃºa el Sr. Javier Pereira y otras autoridades locales,<br />patrocinadores e invitados especiales, quienes se sumaron a esta gran fiesta del deporte y pudieron<br />presenciar el alto nivel competitivo de los ciclistas mÃ¡s experimentados en este hermoso rincÃ³n del<br />Paraguay.<br />Los resultados detallados de todas las categorÃ­as y las incidencias de cada una de las fechas de la Copa<br />Aguavista UCI MTB XCO 2025 se encuentran disponibles para su consulta en el sitio web oficial:<br />https://www.race.com.py/resultados.php?id=MjA=<br />La culminaciÃ³n de la Copa Aguavista UCI MTB XCO 2025 en este significativo Domingo de Pascua subraya<br />la capacidad del deporte para unir a las comunidades en torno a la pasiÃ³n y el esfuerzo, incluso en fechas<br />de profunda reflexiÃ³n personal y familiar. La organizaciÃ³n de este evento de calibre internacional extiende<br />su mÃ¡s sincero agradecimiento a los patrocinadores, los equipos participantes, los atletas por su entrega<br />al pÃºblico por su entusiasta apoyo, al comitÃ© organizador de los Juegos Asu 2025 por su colaboraciÃ³n y a<br />los miembros del equipo organizador de la Copa Aguavista en su 12Â° ediciÃ³n quienes contribuyeron al<br />Ã©xito rotundo del evento.</p>



<p class="wp-block-paragraph"></p>
', '/images/novedades/culmina-con-exito-la-copa-aguavista-2025.jpg', '2025-04-24 10:49:23', true, 'Culmina con Ã‰xito la Copa Aguavista 2025', 'David Domingo Campos Motos y Agustina MarÃ­a Apaza, Campeones de la Copa Aguavista UCI MTB XCO2025Tras una temporada de exigente competencia en los desafiantes c...', '2026-11-01 02:02:27', '2026-11-01 02:02:27', NULL);
INSERT INTO public.posts VALUES (8, 'CONSUR PRESENTE EN EL CLUB DE PESCA BELLA VISTA CON UNA AMPLIA GAMA DE MODELOS TOYOTA Y UTV', 'consur-presente-en-el-club-de-pesca-bella-vista-con-una-amplia-gama-de-modelos-toyota-y-utv', 'Novedades', 'CONSUR estuvo presente el domingo 09 de febrero en el Club de Pesca Bella Vista con una destacada exposiciÃ³n de vehÃ­culos 0 km TOYOTA, UTV (vehÃ­culos todoterreno) de la marca Can-Am ideales para vivir aventuras a todo terreno, ademÃ¡s de ser una opciÃ³n elegida por muchos productores de la zona para diferentes actividades de trabajo [â€¦]', '
<p class="has-text-align-left wp-block-paragraph">CONSUR estuvo presente el domingo 09 de febrero en el Club de Pesca Bella Vista con una destacada exposiciÃ³n de vehÃ­culos 0 km TOYOTA, UTV (vehÃ­culos todoterreno) de la marca Can-Am ideales para vivir aventuras a todo terreno, ademÃ¡s de ser una opciÃ³n elegida por muchos productores de la zona para diferentes actividades de trabajo sobre todo en el campo; tambiÃ©n exposiciÃ³n de motos de agua de la marca Sea-Doo ideales para la diversiÃ³n acuÃ¡tica.<br />Esta lÃ­nea de vehÃ­culos tiene un uso frecuente debido a su fÃ¡cil manejo y tambiÃ©n a su confort.<br />Este evento estuvo diseÃ±ado para compartir con las familias de la zona en una jornada inolvidable, que se extendiÃ³ de 10:00 a 20:00 hs.<br />La Ing. Bianca Guerrero encargada de Marketing, destacÃ³: <em><strong>es un espacio para la familia, el disfrute y la conexiÃ³n con la naturaleza, estamos comprometidos con llevar a los clientes experiencias Ãºnicas y este tipo de eventos nos permite fortalecer nuestro lazo con la comunidad.</strong></em><br />AdemÃ¡s, los asistentes tuvieron la oportunidad de realizar un test drive exclusivo de Toyota con el acompaÃ±amiento de nuestros asesores comerciales que guiaron la experiencia, destacando sus innovaciones tecnolÃ³gicas, confort y desempeÃ±o en ruta.<br />Destacar tambiÃ©n que la jornada estuvo amenizada con mÃºsica en vivo, y una selecciÃ³n de aperitivos y bebidas, para hacer de esta experiencia un verdadero encuentro social y familiar.<br />Bajo un cielo despejado y temperaturas propias de la temporada, CONSUR acompaÃ±Ã³ a quienes se acercaron al Club de Pesca en busca de un dÃ­a de esparcimiento, contacto con la naturaleza y momentos compartidos en familia, reafirmando su compromiso con la comunidad y su pasiÃ³n por la innovaciÃ³n en el mundo automotriz.<br />Este evento es uno de una serie de encuentros que la firma itapuense estarÃ¡ realizando a lo largo del aÃ±o, lo cual le permite reafirmar su compromiso con los clientes.</p>
', '/images/novedades/consur-presente-en-el-club-de-pesca-bella-vista-con-una-amplia-gama-de-modelos-toyota-y-utv.jpeg', '2025-02-14 15:27:55', true, 'CONSUR PRESENTE EN EL CLUB DE PESCA BELLA VISTA CON UNA AMPLIA GAMA DE MODELOS TOYOTA Y UTV', 'CONSUR estuvo presente el domingo 09 de febrero en el Club de Pesca Bella Vista con una destacada exposiciÃ³n de vehÃ­culos 0 km TOYOTA, UTV (vehÃ­culos todoterren...', '2026-11-01 02:02:33', '2026-11-01 02:02:33', NULL);
INSERT INTO public.posts VALUES (6, 'CONSUR encendiÃ³ el verano con un Sunset exclusivo en Aguavista.', 'consur-encendio-el-verano-con-un-sunset-exclusivo-en-aguavista', 'Novedades', 'Alrededor de 120 invitados, entre familias, adultos y niÃ±os, se reunieron en el Ã¡rea nÃ¡utica de Aguavista, a orillas del rÃ­o ParanÃ¡, para disfrutar de un atardecer Ãºnico y un ambiente cÃ¡lido. La exclusiva propuesta de CONSUR ofreciÃ³ una experiencia inolvidable a sus clientes, quienes disfrutaron de exquisitos aperitivos y tragos mientras el sol se [â€¦]', '
<p class="wp-block-paragraph">Alrededor de 120 invitados, entre familias, adultos y niÃ±os, se reunieron en el Ã¡rea nÃ¡utica de Aguavista, a orillas del rÃ­o ParanÃ¡, para disfrutar de un atardecer Ãºnico y un ambiente cÃ¡lido. La exclusiva propuesta de CONSUR ofreciÃ³ una experiencia inolvidable a sus clientes, quienes disfrutaron de exquisitos aperitivos y tragos mientras el sol se despedÃ­a en el horizonte.<br />El evento, que se llevÃ³ a cabo en un entorno natural privilegiado, contÃ³ con diferentes espacios para el relax y la diversiÃ³n. Los asistentes pudieron recorrer el Ã¡rea nÃ¡utica y apreciar la belleza del paisaje.<br />Los directivos, gerentes y asesores comerciales estuvieron presentes para ofrecer informaciÃ³n sobre la amplia gama de productos de la firma, desde autos exclusivos como los Lexus NR, NX y NZ, hasta los modelos Toyota Yaris Cross, New Prado y Corolla Cross Hybrid. Los asistentes tuvieron la oportunidad de realizar pruebas de manejo del Corolla Cross Hybrid y experimentar de primera mano la tecnologÃ­a y el confort de este vehÃ­culo.<br />El Lic. Carlos Insaurralde, Gerente General de CONSUR, dirigiÃ³ unas palabras al pÃºblico presente, agradeciendo la confianza depositada en la empresa familiar a lo largo de sus 40 aÃ±os de trayectoria.<br />DestacÃ³ la constante evoluciÃ³n de la firma, que hoy amplÃ­a su oferta de productos representando a otras marcas ademÃ¡s de Toyota.<br /><strong>Lexus: lujo y sofisticaciÃ³n sobre ruedas</strong><br />Los modelos Lexus NR, NX y NZ, que se exhibieron en el evento, son sinÃ³nimo de lujo, elegancia y tecnologÃ­a de vanguardia. El Lexus NR, con su diseÃ±o deportivo y su potente motor, es ideal para aquellos que buscan emociones fuertes al volante. El Lexus NX, por su parte, destaca por su confort y su versatilidad, siendo perfecto para el uso diario y los viajes largos. El Lexus NZ, finalmente, es la mÃ¡xima expresiÃ³n del lujo y la sofisticaciÃ³n, con un diseÃ±o imponente y un equipamiento de primera clase.<br /><strong>MÃ¡s allÃ¡ de los autos: aventura en tierra y agua</strong><br />AdemÃ¡s de los autos, CONSUR tambiÃ©n exhibiÃ³ una gama de vehÃ­culos recreaô€†Ÿvos, como los ATV y UTV de las marcas Sea-Doo y Can-Am. Estos vehÃ­culos son perfectos para aquellos que buscan aventuras en la naturaleza, ya sea en tierra o en agua. Los asistentes pudieron conocer cerca de los diferentes modelos y recibir informaciÃ³n sobre sus caracterÃ­sticas y funcionalidades.<br />La atmÃ³sfera del evento fue de camaraderÃ­a y celebraciÃ³n, con mÃºsica en vivo y un ambiente distendido que invita a compartir y disfrutar del verano.<br />De esta manera, CONSUR reafirma su compromiso con sus clientes, ofreciendo experiencias exclusivas y de alta calidad que van mÃ¡s allÃ¡ de la venta de vehÃ­culos.</p>
', '/images/novedades/consur-encendio-el-verano-con-un-sunset-exclusivo-en-aguavista.jpeg', '2025-02-20 08:26:04', true, 'Consur encendiÃ³ el verano con un Sunset exclusivo en Aguavista.', 'Alrededor de 120 invitados, entre familias, adultos y niÃ±os, se reunieron en el Ã¡rea nÃ¡utica de Aguavista, a orillas del rÃ­o ParanÃ¡, para disfrutar de un atarde...', '2026-11-01 02:02:30', '2026-11-12 19:25:39', NULL);
INSERT INTO public.posts VALUES (7, 'CONSUR presente en el lanzamiento de la cosecha de arroz 2025 en Ã‘eembucÃº.', 'consur-presente-en-el-lanzamiento-de-la-cosecha-de-arroz-2025-en-neembucu', 'Novedades', 'La empresa Concesionaria del Sur participÃ³ en el lanzamiento oficial de la cosecha de arroz 2025, celebrado en un dÃ­a de campo en el distrito de Villa Franca, Ã‘eembucÃº. El evento, organizado por SEAGRO y ARROZAL, reuniÃ³ a productores, tÃ©cnicos, empresarios del sector y autoridades nacionales, incluyendo al presidente de la RepÃºblica, Santiago PeÃ±a.El lanzamiento [â€¦]', '
<p class="wp-block-paragraph">La empresa Concesionaria del Sur participÃ³ en el lanzamiento oficial de la cosecha de arroz 2025, celebrado en un dÃ­a de campo en el distrito de Villa Franca, Ã‘eembucÃº. El evento, organizado por SEAGRO y ARROZAL, reuniÃ³ a productores, tÃ©cnicos, empresarios del sector y autoridades nacionales, incluyendo al presidente de la RepÃºblica, Santiago PeÃ±a.<br />El lanzamiento de la cosecha 2025 destacÃ³ el gran potencial de Paraguay para el cultivo de arroz, gracias a sus condiciones ambientales favorables y la cadena de valor que involucra a numerosos sectores.<br />CONSUR estuvo presente con un stand donde exhibiÃ³ algunos de sus modelos mÃ¡s destacados, especialmente diseÃ±ados para el trabajo en el campo. Los visitantes pudieron conocer cerca la Land Cruiser 70, una camioneta robusta y confiable, ideal para las tareas mÃ¡s exigentes. TambiÃ©n se exhibieron la Hilux GR, una pick-up deportiva y versÃ¡til, perfecta para quienes buscan un vehÃ­culo Ã¡gil y potente, y la Hilux de cabina simple, una opciÃ³n prÃ¡ctica y funcional para el transporte de carga.<br /><strong><em>Â«En CONSUR, queremos estar cerca de nuestros clientes y ofrecerles los mejores vehÃ­culos para el campo. La Land Cruiser 70, la Hilux GR y la Hilux de cabina simple son excelentes opciones para los productores de arroz, ya que ofrecen la potencia, la durabilidad y la versatilidad necesarias para el trabajo diarioÂ»</em></strong>.<br />Durante el evento, los asesores comerciales tuvieron la oportunidad de conversar con los productores y conocer sus necesidades. AdemÃ¡s, pudieron compartir informaciÃ³n sobre los planes de financiaciÃ³n y los servicios postventa que ofrece la empresa.<br />En una entrevista con el Ing. Felipe RamÃ­rez, vicepresidente de Arrozal expresÃ³ su agradecimiento a las diferentes empresas aliadas que apostaron por el evento.<br />Desde CONSUR, queremos agradecer a SEAGRO y ARROZAL por invitarnos a participar en este dÃ­a de campo, Â«Fue un evento muy productivo y esperamos seguir colaborando con el sector arrocero en el futuro.</p>
', '/images/novedades/consur-presente-en-el-lanzamiento-de-la-cosecha-de-arroz-2025-en-neembucu.jpeg', '2025-02-20 08:10:28', true, 'CONSUR presente en el lanzamiento de la cosecha de arroz 2025 en Ã‘eembucÃº.', 'La empresa Concesionaria del Sur participÃ³ en el lanzamiento oficial de la cosecha de arroz 2025, celebrado en un dÃ­a de campo en el distrito de Villa Franca, Ã‘...', '2026-11-01 02:02:32', '2026-11-12 19:25:39', NULL);
INSERT INTO public.posts VALUES (12, 'Trinidad se convierte en el epicentro del MTB sudamericano.', 'trinidad-se-convierte-en-el-epicentro-del-mtb-sudamericano', 'Novedades', 'MÃ¡s de 300 ciclistas se darÃ¡n cita en el Campeonato Sudamericano MTB XCM UCI en ItapÃºa. Un evento ya tradicional en el calendario de competencias de mountain bike marathon que este aÃ±o disputa su 11Â° ediciÃ³n del Trans ItapÃºa Bike. La ciudad de Trinidad, se prepara para recibir a los mejores ciclistas de SudamÃ©rica. El [â€¦]', '
<p class="wp-block-paragraph"><strong>MÃ¡s de 300 ciclistas se darÃ¡n cita en el Campeonato Sudamericano MTB XCM UCI en ItapÃºa.</strong></p>



<p class="wp-block-paragraph">Un evento ya tradicional en el calendario de competencias de mountain bike marathon que este aÃ±o disputa su 11Â° ediciÃ³n del Trans ItapÃºa Bike.</p>



<p class="wp-block-paragraph">La ciudad de Trinidad, se prepara para recibir a los mejores ciclistas de SudamÃ©rica. El prÃ³ximo 20 de octubre, el tradicional Sudamericano de Mountain Bike XCM volverÃ¡ a encender los motores de la pasiÃ³n por este deporte, consolidÃ¡ndose como uno de los eventos mÃ¡s importantes del calendario internacional.</p>



<p class="wp-block-paragraph">Organizado por CONSUR BIKE, esta ediciÃ³n 2024 promete ser inolvidable. Desde los mÃ¡s jÃ³venes, con apenas 12 aÃ±os, hasta los experimentados corredores mÃ¡ster, todos encontrarÃ¡n su lugar en esta fiesta deportiva.</p>



<p class="wp-block-paragraph">Desde 2013, el Sudamericano XCM se ha convertido en un referente del mountain bike en Paraguay.</p>



<p class="wp-block-paragraph">Sus desafiantes senderos, rodeados de la belleza natural de ItapÃºa, han cautivado a ciclistas de todo el continente.</p>



<p class="wp-block-paragraph">Este aÃ±o, la FederaciÃ³n Paraguaya de Ciclismo (FPC) y la UniÃ³n de Ciclistas Internacional (UCI) vuelven a respaldar este evento, que se ha convertido en una fecha obligada para los amantes de las dos ruedas.</p>



<p class="wp-block-paragraph"><strong><u>Trinidad, un destino Ãºnico</u></strong></p>



<p class="wp-block-paragraph">La ciudad de Trinidad, famosa por sus Misiones JesuÃ­ticas declaradas Patrimonio de la Humanidad por la UNESCO, se transforma en el escenario perfecto para esta competencia. Sus caminos, que serpentean entre la naturaleza, ofrecen un desafÃ­o Ãºnico para los participantes.</p>



<p class="wp-block-paragraph">El Sudamericano XCM no es solo una competencia, sino una celebraciÃ³n del deporte y la vida al aire libre con actividades para toda la familia y ofertas gastronÃ³micas, el evento promete ser una experiencia inolvidable para todos los asistentes.</p>



<p class="wp-block-paragraph">Si eres amante del ciclismo o simplemente buscas un dÃ­a lleno de adrenalina y emociÃ³n, no puedes faltar al trans itapÃºa bike Â¡AnÃ­mate a vivir esta experiencia Ãºnica!</p>



<p class="wp-block-paragraph"><strong><u>Para mÃ¡s informaciÃ³n</u></strong></p>



<p class="wp-block-paragraph"><strong>+595 985 410 314 Marketing y ComunicaciÃ³n</strong></p>



<p class="wp-block-paragraph"><strong>INSCRIPCIONES: www.race.com.py</strong></p>



<p class="wp-block-paragraph"><strong>WEB DEL EVENTO: www.race.com.py</strong></p>



<p class="wp-block-paragraph"><strong>REDES SOCIALES: @racesportpy</strong></p>



<p class="wp-block-paragraph"><a href="https://maps.app.goo.gl/6Y8iGBvKtq4mni7G9">https://maps.app.goo.gl/6Y8iGBvKtq4mni7G9</a></p>
', '/images/novedades/trinidad-se-convierte-en-el-epicentro-del-mtb-sudamericano.jpeg', '2024-10-04 15:28:35', true, 'Trinidad se convierte en el epicentro del MTB sudamericano.', 'MÃ¡s de 300 ciclistas se darÃ¡n cita en el Campeonato Sudamericano MTB XCM UCI en ItapÃºa. Un evento ya tradicional en el calendario de competencias de mountain bi...', '2026-11-01 02:02:40', '2026-11-01 02:02:40', NULL);
INSERT INTO public.posts VALUES (10, 'CONSUR PRESENTE EN LA AGRODINÃMICA 2024', 'consur-presente-en-la-agrodinamica-2024', 'Novedades', 'Del martes 26 al viernes 29 de noviembre, CONSUR marcÃ³ presencia en la AgrodinÃ¡mica 2024, el evento agroindustrial mÃ¡s destacado del 2024 en el sur del paÃ­s. Este aÃ±o inspirado en el espÃ­ritu del Rally teniendo en cuenta que el prÃ³ximo aÃ±o se disputarÃ¡ en el departamento de ItapÃºa, nuestro espacio fue el epicentro de [â€¦]', '
<p class="wp-block-paragraph">Del martes 26 al viernes 29 de noviembre, CONSUR marcÃ³ presencia en la AgrodinÃ¡mica 2024, el evento agroindustrial mÃ¡s destacado del 2024 en el sur del paÃ­s. Este aÃ±o inspirado en el espÃ­ritu del Rally teniendo en cuenta que el prÃ³ximo aÃ±o se disputarÃ¡ en el departamento de ItapÃºa, nuestro espacio fue el epicentro de experiencias Ãºnicas que combinaron innovaciÃ³n, potencia y el estilo inconfundible de Toyota.<br /><strong>Un espacio de experiencias inolvidables</strong><br />MÃ¡s de 1,000 personas visitaron nuestro stand durante los 4 dÃ­as, donde los modelos 2025 mÃ¡s destacados de Toyota fueron protagonistas.<br />La exclusividad llegÃ³ de la mano del Yaris GR, presentado por primera vez en este evento, causando sensaciÃ³n y convirtiÃ©ndose en tendencia. AdemÃ¡s, los asistentes disfrutaron del simulador de rally Gazoo Racing, una experiencia que emocionÃ³ tanto a los fanÃ¡ticos de la velocidad como a quienes querÃ­an vivir la adrenalina del automovilismo.<br /><strong>AtenciÃ³n personalizada y respaldo integral</strong><br />Nuestro equipo de asesores comerciales brindÃ³ una atenciÃ³n personalizada, asegurÃ¡ndose de responder a todas las inquietudes y necesidades de los visitantes. TambiÃ©n contamos con la destacada presencia del equipo de posventa, reafirmando el compromiso de CONSUR con la calidad y el respaldo a sus clientes.<br />Un cierre especial para una semana exitosa<br />El evento culminÃ³ el viernes con una noche especial para clientes y amigos que reuniÃ³ a los directivos de CONSUR, liderados por el Sr. Carlos Szopa Presidente de la firma y el Sr. Juan AndrÃ©s Szopa director de la misma, junto a nuestros valiosos aliados estratÃ©gicos: Sudameris, Lubrax y Royal Seguros.<br />Este cierre fue una celebraciÃ³n de los logros alcanzados durante la AgrodinÃ¡mica y una reafirmaciÃ³n de nuestra visiÃ³n de innovaciÃ³n y excelencia.<br />En CONSUR seguimos comprometidos con ofrecer experiencias memorables, combinando el espÃ­ritu de Toyota con el apoyo incondicional de nuestros colaboradores y aliados. Â¡Gracias a todos los que formaron parte de esta exitosa ediciÃ³n!</p>



<p class="wp-block-paragraph"></p>
', '/images/novedades/consur-presente-en-la-agrodinamica-2024.jpeg', '2024-12-03 18:00:59', true, 'CONSUR PRESENTE EN LA AGRODINÃMICA 2024', 'Del martes 26 al viernes 29 de noviembre, Consur marcÃ³ presencia en la AgrodinÃ¡mica 2024, el evento agroindustrial mÃ¡s destacado del 2024 en el sur del paÃ­s. Es...', '2026-11-01 02:02:37', '2026-11-12 19:25:39', NULL);
INSERT INTO public.posts VALUES (11, 'Trans ItapÃºa Bike: La aventura ciclista mÃ¡s grande de SudamÃ©rica llega a las Misiones JesuÃ­ticas', 'trans-itapua-bike-la-aventura-ciclista-mas-grande-de-sudamerica-llega-a-las-misiones-jesuiticas', 'Novedades', 'Un evento ya tradicional en el calendario de competencias de mountain bike marathon que este aÃ±o disputa su 11Â° ediciÃ³n del Trans ItapÃºa Bike llega este domingo 20 de octubreÂ  con novedades que lo posicionan como un referente en la regiÃ³n. Organizado por CONSUR Bike, el evento ha sido declarado de InterÃ©s TurÃ­stico Nacional por [â€¦]', '
<p class="has-text-align-left wp-block-paragraph">Un evento ya tradicional en el calendario de competencias de mountain bike marathon que este aÃ±o disputa su 11Â° ediciÃ³n del Trans ItapÃºa Bike llega este domingo 20 de octubre&nbsp; con novedades que lo posicionan como un referente en la regiÃ³n.</p>



<p class="has-text-align-left wp-block-paragraph">Organizado por CONSUR Bike, el evento ha sido declarado de InterÃ©s TurÃ­stico Nacional por la SecretarÃ­a Nacional de Turismo (SENATUR), lo que demuestra el gran impacto que tiene en la promociÃ³n de nuestro paÃ­s.</p>



<p class="has-text-align-left wp-block-paragraph">Las majestuosas Misiones JesuÃ­ticas, declaradas Patrimonio de la Humanidad por la UNESCO, brindarÃ¡n un escenario natural incomparable para esta competencia.</p>



<p class="has-text-align-left wp-block-paragraph">Sus senderos, rodeados de exuberante vegetaciÃ³n y rica historia, desafiarÃ¡n a los ciclistas mÃ¡s experimentados, mientras que su belleza cautivarÃ¡ a todos los presentes.</p>



<p class="has-text-align-left wp-block-paragraph">Este evento cuenta con el respaldo de la FederaciÃ³n Paraguaya de Ciclismo (FPC) y la UniÃ³n Ciclista Internacional (UCI), lo que garantiza su calidad y prestigio. AdemÃ¡s, al ser el Campeonato Sudamericano de XCM, reunirÃ¡ a los mejores ciclistas de la regiÃ³n, quienes competirÃ¡n por el tÃ­tulo continental.</p>



<p class="has-text-align-left wp-block-paragraph"><strong><u>MÃ¡s inclusiÃ³n en el ciclismo: Trans ItapÃºa Bike 2024 con categorÃ­a e-bike</u></strong></p>



<p class="has-text-align-left wp-block-paragraph">El Trans ItapÃºa Bike 2024 se consolida como un evento pionero al incluir una categorÃ­a especial para bicicletas elÃ©ctricas, demostrando que el futuro del ciclismo es cada vez mÃ¡s inclusivo y tecnolÃ³gico.</p>



<p class="has-text-align-left wp-block-paragraph"><strong>CategorÃ­a Master C e-bikes</strong>: se incorpora una categorÃ­a especial para ciclistas de mÃ¡s de 50 aÃ±os que utilizan bicicletas elÃ©ctricas. Esta iniciativa busca promover el ciclismo como una actividad accesible para todas las edades y condiciones fÃ­sicas.</p>



<p class="has-text-align-left wp-block-paragraph">El Trans ItapÃºa Bike es mucho mÃ¡s que una competencia. Es un evento para toda la familia, que contarÃ¡ con ofertas gastronÃ³micas, espacios exclusivos para los espectadores. Los niÃ±os tambiÃ©n podrÃ¡n participar en categorÃ­as especiales, demostrando que el ciclismo es un deporte para todas las edades. No solo es una competencia deportiva, sino tambiÃ©n una oportunidad para fomentar el turismo en la regiÃ³n.</p>



<p class="has-text-align-left wp-block-paragraph">El evento atrae a ciclistas de todo el paÃ­s y del extranjero, quienes descubren los encantos de ItapÃºa y generan un importante movimiento econÃ³mico.</p>



<p class="has-text-align-left wp-block-paragraph">Cabe resaltas que los participantes podrÃ¡n llevarse premios en efectivo y productos exclusivos gracias al apoyo de reconocidas marcas del sector.</p>



<p class="has-text-align-left wp-block-paragraph">Si eres amante del ciclismo y buscas un desafÃ­o, no puedes perderte el Trans ItapÃºa Bike.</p>



<p class="has-text-align-left wp-block-paragraph">InscrÃ­bete ya y forma parte de este evento histÃ³rico tienes tiempo hasta el 11 de octubre.</p>



<p class="has-text-align-left wp-block-paragraph"><strong><u>Para mÃ¡s informaciÃ³n</u></strong></p>



<p class="wp-block-paragraph"><strong>+595 985 410 314 Marketing y ComunicaciÃ³n</strong></p>



<p class="wp-block-paragraph"><strong>INSCRIPCIONES: www.race.com.py</strong></p>



<p class="wp-block-paragraph"><strong>WEB DEL EVENTO: www.race.com.py</strong></p>



<p class="wp-block-paragraph"><strong>REDES SOCIALES: @racesportpy</strong></p>



<p class="wp-block-paragraph"><a href="https://maps.app.goo.gl/6Y8iGBvKtq4mni7G9">https://maps.app.goo.gl/6Y8iGBvKtq4mni7G9</a></p>
', '/images/novedades/trans-itapua-bike-la-aventura-ciclista-mas-grande-de-sudamerica-llega-a-las-misiones-jesuiticas.jpeg', '2024-10-09 08:56:19', true, 'Trans ItapÃºa Bike: La aventura ciclista mÃ¡s grande de SudamÃ©rica llega a las Misiones JesuÃ­ticas', 'Un evento ya tradicional en el calendario de competencias de mountain bike marathon que este aÃ±o disputa su 11Â° ediciÃ³n del Trans ItapÃºa Bike llega este domingo...', '2026-11-01 02:02:38', '2026-11-12 19:25:39', NULL);
INSERT INTO public.posts VALUES (13, 'Ã‰xito rotundo en el DÃ­a Mundial Sin Auto en EncarnaciÃ³n', 'exito-rotundo-en-el-dia-mundial-sin-auto-en-encarnacion', 'Novedades', 'El pasado sÃ¡bado 7 de septiembre EncarnaciÃ³n viviÃ³ una jornada memorable al celebrar el DÃ­a Mundial Sin Auto. El evento organizado por CONSUR Bike en su 13Âª ediciÃ³n y por Medicina Bike de la Universidad Nacional de ItapÃºa (UNI) en su 4Âª ediciÃ³n, contÃ³ con la participaciÃ³n de mÃ¡s de 400 personas comprometidas con la [â€¦]', '
<p class="has-medium-font-size wp-block-paragraph">El pasado sÃ¡bado 7 de septiembre EncarnaciÃ³n viviÃ³ una jornada memorable al celebrar el DÃ­a Mundial Sin Auto. El evento organizado por CONSUR Bike en su 13Âª ediciÃ³n y por Medicina Bike de la Universidad Nacional de ItapÃºa (UNI) en su 4Âª ediciÃ³n, contÃ³ con la participaciÃ³n de mÃ¡s de 400 personas comprometidas con la salud y el medio ambiente.<br />La convocatoria superÃ³ las expectativas, reuniendo a 200 ciclistas y 200 participantes en la corre caminata. La actividad iniciÃ³ a las 15:00 horas desde la estaciÃ³n de servicio Petrobras, ubicada en Av. Caballero casi Juan L. MallorquÃ­n, y culminÃ³ en la costanera de EncarnaciÃ³n, donde los participantes disfrutaron de diversas actividades recreativas y educativas.<br />Bajo el lema â€œPedalea por tu salud y el planetaâ€, el evento tuvo como objetivo principal concienciar a la comunidad sobre la importancia de reducir el uso de vehÃ­culos motorizados, promoviendo alternativas sostenibles como el ciclismo y el ejercicio al aire libre. Los asistentes demostraron entusiasmo y compromiso, reflejando el interÃ©s creciente por adoptar estilos de vida mÃ¡s saludables y respetuosos con el medio ambiente.<br />Durante la jornada, se llevaron a cabo actividades orientadas a resaltar los beneficios del ciclismo y la actividad fÃ­sica, tanto para la salud personal como para la preservaciÃ³n del planeta. Los organizadores destacaron la importancia de estas iniciativas para mejorar la calidad del aire y contribuir a una ciudad mÃ¡s sostenible.<br />CONSUR Bike y Medicina Bike de la Universidad Nacional de ItapuÃ¡, agradecen profundamente a todos los participantes, voluntarios, marcas aliadas y autoridades que hicieron posible el Ã©xito de este evento. Su apoyo y entusiasmo son fundamentales para continuar promoviendo acciones que beneficien a toda la comunidad.<br />El DÃ­a Mundial Sin Auto en EncarnaciÃ³n se consolida como una fecha emblemÃ¡tica que inspira a mÃ¡s personas a sumarse al cambio hacia un futuro mÃ¡s verde y saludable.<br />Â¡Gracias, EncarnaciÃ³n, Â¡por ser parte del movimiento hacia un mundo mejor!</p>
', '/images/novedades/exito-rotundo-en-el-dia-mundial-sin-auto-en-encarnacion.png', '2024-09-09 14:52:07', true, 'Ã‰xito rotundo en el DÃ­a Mundial Sin Auto en EncarnaciÃ³n', 'El pasado sÃ¡bado 7 de septiembre EncarnaciÃ³n viviÃ³ una jornada memorable al celebrar el DÃ­a Mundial Sin Auto. El evento organizado por Consur Bike en su 13Âª edi...', '2026-11-01 02:02:42', '2026-11-12 19:25:39', NULL);
INSERT INTO public.posts VALUES (14, 'CONSUR celebra 47 aÃ±os de historia en EncarnaciÃ³n', 'consur-celebra-47-anos-de-historia-en-encarnacion', 'Novedades', 'La prestigiosa empresa encarnacena CONSUR cumple este mes 47 aÃ±os de exitosa trayectoria en el sector automotriz. Fundada por el visionario Don Carlos Szopa, CONSUR se ha consolidado como un referente en el sur del paÃ­s, en la representaciÃ³n y comercializaciÃ³n de vehÃ­culos Toyota, gracias a su compromiso con la excelencia y la satisfacciÃ³n del [â€¦]', '
<p class="wp-block-paragraph">La prestigiosa empresa encarnacena CONSUR cumple este mes 47 aÃ±os de exitosa trayectoria en el sector automotriz. Fundada por el visionario Don Carlos Szopa, CONSUR se ha consolidado como un referente en el sur del paÃ­s, en la representaciÃ³n y comercializaciÃ³n de vehÃ­culos Toyota, gracias a su compromiso con la excelencia y la satisfacciÃ³n del cliente.</p>



<p class="wp-block-paragraph">Durante mÃ¡s de dos dÃ©cadas, CONSUR ha trabajado incansablemente con un equipo altamente capacitado y motivado, cuyo objetivo principal es superar las expectativas de sus clientes. Este aniversario es un momento especial para agradecer a todos aquellos que han contribuido al crecimiento y consolidaciÃ³n de la empresa.</p>



<p class="wp-block-paragraph">CONSUR ademÃ¡s se destaca por el servicio post venta, un taller mecÃ¡nico con tÃ©cnicos altamente capacitados, repuestos originales y servicios de mantenimiento. Por sus unidades de negocio: CONSUR Bike, CONSUR seguros y CONSUR Shop, asÃ­ como por su atenciÃ³n personalizada y asesoramiento experto.</p>



<p class="wp-block-paragraph">En este aniversario, CONSUR reafirma su compromiso con la calidad, la transparencia y la responsabilidad social. La empresa seguirÃ¡ trabajando arduamente para ofrecer a sus clientes las mejores productos y servicios, consolidando asÃ­ su posiciÃ³n como uno de los principales actores del mercado automotriz paraguayo.</p>
', '/images/novedades/consur-celebra-47-anos-de-historia-en-encarnacion.jpeg', '2024-09-04 17:04:02', true, 'Consur celebra 47 aÃ±os de historia en EncarnaciÃ³n', 'La prestigiosa empresa encarnacena Consur cumple este mes 47 aÃ±os de exitosa trayectoria en el sector automotriz. Fundada por el visionario Don Carlos Szopa, Co...', '2026-11-01 02:02:44', '2026-11-12 19:25:39', NULL);
INSERT INTO public.posts VALUES (16, '36 aÃ±os de Ã©xito y compromiso con ItapÃºa', '36-anos-de-exito-y-compromiso-con-itapua', 'Novedades', 'El nÃºmero 8 es conocido como el sÃ­mbolo de la fortuna y la abundancia, pero para nosotros significa mucho mÃ¡s. Un dÃ­a como hoy, hace 36 aÃ±os, el 8 de agosto de 1988, abrimos las puertas de nuestro primer local propio en EncarnaciÃ³n, donde hasta la fecha continÃºa operando nuestra casa central. A lo largo [â€¦]', '
<p class="wp-block-paragraph">El nÃºmero 8 es conocido como el sÃ­mbolo de la fortuna y la abundancia, pero para nosotros significa mucho mÃ¡s. Un dÃ­a como hoy, hace 36 aÃ±os, el 8 de agosto de 1988, abrimos las puertas de nuestro primer local propio en EncarnaciÃ³n, donde hasta la fecha continÃºa operando nuestra casa central.</p>



<p class="wp-block-paragraph">A lo largo de estos aÃ±os, hemos tenido el privilegio de expandirnos y consolidar nuestra presencia en otras ciudades como Obligado, MarÃ­a Auxiliadora, y San Ignacio. Cada una de estas expansiones representa un nuevo capÃ­tulo en nuestra historia, llena de anÃ©cdotas y testimonios que nos motivan a seguir adelante.</p>



<p class="wp-block-paragraph">Queremos expresar nuestra profunda gratitud a los clientes y amigos que nos han acompaÃ±ado en este viaje, eligiÃ©ndonos dÃ­a tras dÃ­a. Este aniversario no solo celebra un nÃºmero, sino el esfuerzo y la confianza que hemos construido juntos.</p>
', '/images/novedades/36-anos-de-exito-y-compromiso-con-itapua.jpg', '2024-08-17 09:19:01', true, '36 aÃ±os de Ã©xito y compromiso con ItapÃºa', 'El nÃºmero 8 es conocido como el sÃ­mbolo de la fortuna y la abundancia, pero para nosotros significa mucho mÃ¡s. Un dÃ­a como hoy, hace 36 aÃ±os, el 8 de agosto de...', '2026-11-01 02:02:47', '2026-11-01 02:02:47', NULL);
INSERT INTO public.posts VALUES (5, 'EncarnaciÃ³n vibrÃ³ con la Carrera de NiÃ±os en Bici', 'encarnacion-vibro-con-la-carrera-de-ninos-en-bici', 'Novedades', 'MÃ¡s de 200 niÃ±os celebraron el espÃ­ritu deportivo y la uniÃ³n familiar en un evento inolvidable. La 4Âª ediciÃ³n de la Carrera de NiÃ±os en Bici â€“ Copa Internacional FundaciÃ³n EncarnaciÃ³n fue un rotundo Ã©xito, superando todas las expectativas y consolidÃ¡ndose como un evento clÃ¡sico en la regiÃ³n. El domingo pasado, mÃ¡s de 200 niÃ±os [â€¦]', '
<p class="has-text-align-left wp-block-paragraph">MÃ¡s de 200 niÃ±os celebraron el espÃ­ritu deportivo y la uniÃ³n familiar en un evento inolvidable.</p>



<p class="has-text-align-left wp-block-paragraph"><br />La 4Âª ediciÃ³n de la Carrera de NiÃ±os en Bici &#8211; Copa Internacional FundaciÃ³n EncarnaciÃ³n fue un rotundo Ã©xito, superando todas las expectativas y consolidÃ¡ndose como un evento clÃ¡sico en la regiÃ³n. </p>



<p class="has-text-align-left wp-block-paragraph">El domingo pasado, mÃ¡s de 200 niÃ±os de entre 4 y 14 aÃ±os se dieron cita en el Centro CÃ­vico y el parque de la ciudad para competir en diferentes categorÃ­as, demostrando su espÃ­ritu deportivo y disfrutando de una jornada llena de alegrÃ­a y camaraderÃ­a.</p>



<p class="has-text-align-left wp-block-paragraph"><br />El evento, organizado por CONSUR Bike Club y Puerta del Sur, en el marco de las celebraciones previas al aniversario de EncarnaciÃ³n, contÃ³ con la presencia de autoridades e invitados especiales, quienes acompaÃ±aron y alentaron a los pequeÃ±os ciclistas. Familias enteras, incluyendo abuelos, padres, tÃ­os y primos, se unieron para apoyar a los participantes, creando un ambiente festivo y emotivo.</p>



<p class="has-text-align-left wp-block-paragraph"><br />A pesar de la amenaza de lluvia, el clima se despejÃ³ justo a tiempo para el inicio de la competencia, permitiendo que los niÃ±os disfrutaran de una tarde soleada y llena de energÃ­a. Todos los participantes recibieron premios, reconociendo su esfuerzo y dedicaciÃ³n.</p>



<p class="has-text-align-left wp-block-paragraph"><br />La jornada estuvo repleta de actividades recreativas para los niÃ±os, gracias al apoyo de diversas marcas.</p>



<p class="has-text-align-left wp-block-paragraph"> El show en vivo de ROCEMI animÃ³ al pÃºblico con dinÃ¡micas y juegos, mientras que los espacios de comida saludable ofrecieron opciones nutritivas para toda la familia.<br />Este evento, que promueve la competitividad sana y el trabajo en equipo, valores fundamentales en el deporte y la vida diaria, reafirma el compromiso de CONSUR Bike Club con la formaciÃ³n de nuevas generaciones de ciclistas a travÃ©s de su escuelita de ciclismo.</p>



<p class="has-text-align-left wp-block-paragraph"><br />La 4Âª ediciÃ³n de la Carrera de NiÃ±os en Bici &#8211; Copa Internacional FundaciÃ³n EncarnaciÃ³n fue una celebraciÃ³n del deporte, la familia y la comunidad, dejando recuerdos imborrables en todos los presentes.</p>



<p class="wp-block-paragraph"></p>
', '/images/novedades/encarnacion-vibro-con-la-carrera-de-ninos-en-bici.jpeg', '2025-03-27 15:12:31', true, 'EncarnaciÃ³n vibrÃ³ con la Carrera de NiÃ±os en Bici', 'MÃ¡s de 200 niÃ±os celebraron el espÃ­ritu deportivo y la uniÃ³n familiar en un evento inolvidable. La 4Âª ediciÃ³n de la Carrera de NiÃ±os en Bici â€“ Copa Internaciona...', '2026-11-01 02:02:28', '2026-11-12 19:25:39', NULL);
INSERT INTO public.posts VALUES (9, 'CONSUR Suc. San Ignacio CelebrÃ³ 10 AÃ±os de Logros y Gratitud', 'consur-suc-san-ignacio-celebro-10-anos-de-logros-y-gratitud', 'Novedades', 'La Sucursal de San Ignacio conmemorÃ³ su dÃ©cimo aniversario con una velada llena de emociones, recuerdos y gratitud, destacando el compromiso de sus asesores comerciales y la excelencia de su servicio de posventa. Un mensaje lleno de orgullo y compromisoLa apertura oficial incluyÃ³ palabras del presidente Carlos Szopa, el director Juan Szopa y el gerente [â€¦]', '
<p class="wp-block-paragraph">La  Sucursal de San Ignacio conmemorÃ³ su dÃ©cimo aniversario con una velada llena de emociones, recuerdos y gratitud, destacando el compromiso de sus asesores comerciales y la excelencia de su servicio de posventa.</p>



<p class="wp-block-paragraph"><strong>Un mensaje lleno de orgullo y compromiso</strong><br />La apertura oficial incluyÃ³ palabras del presidente Carlos Szopa, el director Juan Szopa y el gerente general Juan Insaurralde. Durante su discurso, el director expresÃ³:<br />Â«Una empresa no existe sin sus clientes ni su equipo. Desde nuestros primeros aÃ±os, CONSUR ha sido bien recibida por ustedes, nuestros clientes y amigos. Hoy, 10 aÃ±os despuÃ©s, seguimos trabajando con la misma pasiÃ³n y compromiso.Â»</p>



<p class="wp-block-paragraph">La noche continuÃ³ con una cena exclusiva en honor a los clientes, un gesto de agradecimiento por su confianza y apoyo a lo largo de esta dÃ©cada de logros.</p>



<p class="wp-block-paragraph"><strong>CelebraciÃ³n y cierre con mÃºsica en vivo</strong><br />El evento concluyÃ³ con un show en vivo que animÃ³ a los asistentes y sellÃ³ una noche inolvidable de celebraciÃ³n y gratitud.</p>



<p class="wp-block-paragraph"><strong>Una dÃ©cada de confianza y servicio</strong><br />CONSUR reafirma su compromiso de seguir creciendo junto a la comunidad, trabajando con pasiÃ³n, calidad y dedicaciÃ³n.</p>



<p class="wp-block-paragraph">Â¡Gracias por estos 10 aÃ±os de confianza!</p>
', '/images/novedades/consur-suc-san-ignacio-celebro-10-anos-de-logros-y-gratitud.jpeg', '2024-12-17 08:53:59', true, 'Consur Suc. San Ignacio CelebrÃ³ 10 AÃ±os de Logros y Gratitud', 'La Sucursal de San Ignacio conmemorÃ³ su dÃ©cimo aniversario con una velada llena de emociones, recuerdos y gratitud, destacando el compromiso de sus asesores com...', '2026-11-01 02:02:35', '2026-11-12 19:25:39', NULL);
INSERT INTO public.posts VALUES (15, 'La costanera de EncarnaciÃ³n se llenÃ³ de alegrÃ­a con el ciclismo infantil.', 'la-costanera-se-lleno-de-alegria-con-el-ciclismo-infantil', 'Novedades', 'Sonrisas, risas y mucho entusiasmo se vivieron en la Costanera de EncarnaciÃ³n, precisamente entre el Silo y el Molino, el pasado sÃ¡bado 31 de agosto, gracias a la clase de ciclismo gratuita para niÃ±os organizada por CONSUR Bike. PequeÃ±os ciclistas de entre 4 y 12 aÃ±os aprendieron a dominar sus bicicletas de la mano del [â€¦]', '
<p class="has-text-align-left wp-block-paragraph">Sonrisas, risas y mucho entusiasmo se vivieron en la Costanera de EncarnaciÃ³n, precisamente entre el Silo y el Molino, el pasado sÃ¡bado 31 de agosto, gracias a la clase de ciclismo gratuita para niÃ±os organizada por CONSUR Bike. PequeÃ±os ciclistas de entre 4 y 12 aÃ±os aprendieron a dominar sus bicicletas de la mano del profesor Fernando Vargas, quien con paciencia y dedicaciÃ³n los guiÃ³ en cada paso.</p>



<p class="has-text-align-left wp-block-paragraph">La jornada estuvo repleta de actividades recreativas que hicieron para los mÃ¡s pequeÃ±os, caritas pintadas, globo loco crearon un ambiente festivo y lleno de color. </p>



<p class="has-text-align-left wp-block-paragraph">Los padres, por su parte, tuvieron la oportunidad de probar las bicicletas elÃ©ctricas y conocer las Ãºltimas novedades en movilidad sostenible.</p>



<p class="wp-block-paragraph">Esta iniciativa, realizada en el marco del Mes del NiÃ±o, busca promover la actividad fÃ­sica y el uso de la bicicleta como un medio de transporte saludable y divertido. Sin duda, una tarde inolvidable para todos los participantes.</p>



<figure class="wp-block-gallery has-nested-images columns-default is-cropped wp-block-gallery-1 is-layout-flex wp-block-gallery-is-layout-flex"></figure>
', '/images/novedades/la-costanera-se-lleno-de-alegria-con-el-ciclismo-infantil.jpeg', '2024-09-04 15:21:53', true, 'La costanera de EncarnaciÃ³n se llenÃ³ de alegrÃ­a con el ciclismo infantil.', 'Sonrisas, risas y mucho entusiasmo se vivieron en la Costanera de EncarnaciÃ³n, precisamente entre el Silo y el Molino, el pasado sÃ¡bado 31 de agosto, gracias a...', '2026-11-01 02:02:46', '2026-11-12 19:25:39', NULL);
INSERT INTO public.posts VALUES (17, 'CONSUR EntregÃ³ premio a un cliente con un viaje para dos personas', 'consur-entrego-premio-a-un-cliente-con-un-viaje-para-dos-personas', 'Novedades', 'Por el mes de la amistad, CONSUR ha realizado su emocionante campaÃ±a Â«Amigos en MovimientoÂ», invitando a todos los interesados a participar en exclusivos text drives en la ciudad de EncarnaciÃ³n. La campaÃ±a que se extendiÃ³ durante todo el mes de julio, promoviÃ³ la Ãºltima tecnologÃ­a hÃ­brida de Toyota y las innovadoras E-Bikes de CONSUR [â€¦]', '
<p class="wp-block-paragraph">Por el mes de la amistad, CONSUR ha realizado su emocionante campaÃ±a Â«Amigos en MovimientoÂ», invitando a todos los interesados a participar en exclusivos text drives en la ciudad de EncarnaciÃ³n.</p>



<iframe loading="lazy" width="560" height="315" src="https://www.youtube.com/embed/ixjXVp11zog?si=ZUDHhV6TGZgkGUgz" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>



<p class="wp-block-paragraph">La campaÃ±a que se extendiÃ³ durante todo el mes de julio, promoviÃ³ la Ãºltima tecnologÃ­a hÃ­brida de Toyota y las innovadoras E-Bikes de CONSUR Bike, ofreciendo a los participantes una experiencia Ãºnica junto a sus amigos.</p>



<p class="wp-block-paragraph">En ese sentido, los clientes de las unidades de negocio de CONSUR, participaron de un viaje para dos personas a destinos a elecciÃ³n entre Buenos Aires o RÃ­o de Janeiro. Durante la maÃ±ana de este martes se realizÃ³ el sorteo, donde resultÃ³ ganador Lauro Emhart de la ciudad de Obligado.</p>



<iframe loading="lazy" width="560" height="315" src="https://www.youtube.com/embed/m7RD5ZMiOkc?si=k27FR0m_8W0Y3nzt" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
', '/images/novedades/consur-entrego-premio-a-un-cliente-con-un-viaje-para-dos-personas.png', '2024-08-06 10:54:03', true, 'Consur EntregÃ³ premio a un cliente con un viaje para dos personas', 'Por el mes de la amistad, CONSUR ha realizado su emocionante campaÃ±a Â«Amigos en MovimientoÂ», invitando a todos los interesados a participar en exclusivos text d...', '2026-11-01 02:02:49', '2026-11-12 19:25:39', NULL);


--
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.sessions VALUES ('Scik33LadaPBA6fZRFqhWWiOXTjwWkZEq7sX0ng6', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36 Edg/157.0.0.0', 'eyJfdG9rZW4iOiI4QU9jSWx3eDlIOG5nVGhwYkJWeHZIM052SEt3MTE0d095NmtXV2JPIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwidXJsIjpbXSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsInBhc3N3b3JkX2hhc2hfd2ViIjoiNTQwNWQwYTNlYjkzMTZjOTU1ZTM5YWQ5N2FjYmFiZjBiM2UzZTJjYjY1ODQyMDdmMzIyMjUxODA2YmZjMjgwYSJ9', 1795097342);


--
-- Data for Name: settings; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.settings VALUES (2, 'contact_phone', '+595 985 804 106', 'text', 'contact', 'TelÃ©fono de Contact Center', NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.settings VALUES (3, 'contact_whatsapp', '595985204106', 'text', 'contact', 'WhatsApp Principal (sin +)', NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.settings VALUES (4, 'contact_email', 'contacto@consur.com.py', 'text', 'contact', 'Email de Contacto', NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.settings VALUES (6, 'schedule_info', 'Lun a Vie: 7:00 a 12:00 â€¢ 14:00 a 17:30 | SÃ¡b: 7:30 a 12:00', 'text', 'general', 'Horarios de AtenciÃ³n', NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.settings VALUES (7, 'turnos_url', 'http://www.turnos365.com/turnos.aspx?con=131', 'text', 'general', 'Enlace de Turnos Online', NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.settings VALUES (12, 'logo_type', 'typography', 'text', 'branding', 'Tipo de Logo (typography o image)', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (13, 'logo_primary_text', 'CONSUR', 'text', 'branding', 'Texto Principal Logo', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (14, 'logo_dot_color', '#DC2626', 'text', 'branding', 'Color del Punto del Logo', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (15, 'logo_brand_badge', 'TOYOTA', 'text', 'branding', 'Texto Insignia Marca', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (16, 'logo_image_url', 'https://consur.com.py/wp-content/uploads/2019/07/logoconsurweb.png', 'text', 'branding', 'URL de Imagen de Logo', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (17, 'favicon_url', '', 'text', 'branding', 'URL del Favicon', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (18, 'home_value_cards', '[{"icon":"fas fa-certificate","title":"Concesionaria Oficial","subtitle":"Garant\u00eda y respaldo Toyota"},{"icon":"fas fa-truck-pickup","title":"Taller M\u00f3vil","subtitle":"Asistencia t\u00e9cnica en tu campo"},{"icon":"fas fa-shield-alt","title":"Usados Certificados","subtitle":"150 puntos de inspecci\u00f3n"},{"icon":"fas fa-hand-holding-usd","title":"Financiaci\u00f3n Propia","subtitle":"Planes en Guaran\u00edes o D\u00f3lares"}]', 'json', 'home_sections', 'Tarjetas de Barra de Beneficios', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (19, 'sec_0km_tag', 'LÃ­nea de Modelos 0 Km', 'text', 'home_sections', '0KM - Etiqueta', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (20, 'sec_0km_title', 'DescubrÃ­ la Gama Toyota', 'text', 'home_sections', '0KM - TÃ­tulo Principal', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (22, 'sec_usados_title', 'VehÃ­culos con Experiencia y Respaldo Oficial', 'text', 'home_sections', 'Usados - TÃ­tulo', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (24, 'sec_usados_btn_text', 'Ver Todo el Stock de Usados', 'text', 'home_sections', 'Usados - Texto BotÃ³n', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (25, 'sec_usados_btn_url', '/usados', 'text', 'home_sections', 'Usados - URL BotÃ³n', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (26, 'sec_usados_bg_image', 'https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=1920', 'text', 'home_sections', 'Usados - Imagen Fondo', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (27, 'sec_posventa_tag', 'Servicio de Posventa Exclusivo', 'text', 'home_sections', 'Posventa - Etiqueta', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (29, 'sec_posventa_desc', 'Entendemos que tu tiempo y tu trabajo no se detienen. Por eso, nuestro equipo de tÃ©cnicos certificados se traslada con vehÃ­culos equipados con herramientas de diagnÃ³stico de Ãºltima generaciÃ³n.', 'text', 'home_sections', 'Posventa - DescripciÃ³n', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (30, 'sec_posventa_image', 'https://images.unsplash.com/photo-1486006920555-c77dce18193b?auto=format&fit=crop&q=80&w=1200', 'text', 'home_sections', 'Posventa - Foto Taller MÃ³vil', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (31, 'sec_posventa_badge_title', '100% OFICIAL', 'text', 'home_sections', 'Posventa - TÃ­tulo Badge Flotante', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (32, 'sec_posventa_badge_desc', 'Mantenimiento con repuestos legÃ­timos en la comodidad de tu hogar o establecimiento rural.', 'text', 'home_sections', 'Posventa - Texto Badge', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (33, 'sec_posventa_card1_icon', 'fas fa-tools', 'text', 'home_sections', 'Posventa - Card 1 Ãcono', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (34, 'sec_posventa_card1_title', 'Service Programado', 'text', 'home_sections', 'Posventa - Card 1 TÃ­tulo', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (35, 'sec_posventa_card1_desc', 'Mantenimiento de 5.000 a 100.000 km manteniendo la garantÃ­a de fÃ¡brica.', 'text', 'home_sections', 'Posventa - Card 1 DescripciÃ³n', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (36, 'sec_posventa_card2_icon', 'fas fa-oil-can', 'text', 'home_sections', 'Posventa - Card 2 Ãcono', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (37, 'sec_posventa_card2_title', 'Repuestos Genuinos', 'text', 'home_sections', 'Posventa - Card 2 TÃ­tulo', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (38, 'sec_posventa_card2_desc', 'Filtros, lubricantes originales Toyota TGMO y pastillas de freno.', 'text', 'home_sections', 'Posventa - Card 2 DescripciÃ³n', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (39, 'sec_podcast_tag', 'Espacio de Audio', 'text', 'home_sections', 'Podcast - Etiqueta', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (41, 'sec_podcast_desc', 'Novedades automotrices, tecnologÃ­a hÃ­brida y consejos para el cuidado de tu vehÃ­culo.', 'text', 'home_sections', 'Podcast - DescripciÃ³n', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (42, 'sec_testimonials_tag', 'Experiencias Reales', 'text', 'home_sections', 'Testimonios - Etiqueta', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (43, 'sec_testimonials_title', 'Lo que dicen nuestros clientes', 'text', 'home_sections', 'Testimonios - TÃ­tulo', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (44, 'sec_branches_tag', 'Red de AtenciÃ³n', 'text', 'home_sections', 'Sucursales - Etiqueta', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (45, 'sec_branches_title', 'Nuestras Sucursales', 'text', 'home_sections', 'Sucursales - TÃ­tulo', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (46, 'sec_branches_desc', 'Visitanos en nuestras salas de exhibiciÃ³n y talleres autorizados en el sur del paÃ­s.', 'text', 'home_sections', 'Sucursales - SubtÃ­tulo', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (47, 'form_quote_tag', 'Asesoramiento Personalizado', 'text', 'forms', 'Formulario - Etiqueta', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (48, 'form_quote_title', 'CotizÃ¡ tu PrÃ³ximo Toyota', 'text', 'forms', 'Formulario - TÃ­tulo', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (1, 'company_name', 'CONSUR S.A. â€“ Concesionaria Oficial Toyota', 'text', 'general', 'Nombre de Empresa', NULL, '2026-10-05 02:20:26', '2026-11-12 19:25:39');
INSERT INTO public.settings VALUES (21, 'sec_usados_tag', 'CONSUR Usados Certificados', 'text', 'home_sections', 'Usados - Etiqueta', NULL, '2026-10-05 13:33:22', '2026-11-12 19:25:39');
INSERT INTO public.settings VALUES (28, 'sec_posventa_title', 'Taller MÃ³vil CONSUR Toyota', 'text', 'home_sections', 'Posventa - TÃ­tulo', NULL, '2026-10-05 13:33:22', '2026-11-12 19:25:39');
INSERT INTO public.settings VALUES (40, 'sec_podcast_title', 'Podcast "Ruta CONSUR"', 'text', 'home_sections', 'Podcast - TÃ­tulo', NULL, '2026-10-05 13:33:22', '2026-11-12 19:25:39');
INSERT INTO public.settings VALUES (8, 'facebook_url', 'https://www.facebook.com/ConsurToyota/', 'text', 'social', 'Facebook Url', NULL, '2026-10-05 02:20:26', '2026-11-18 18:17:55');
INSERT INTO public.settings VALUES (9, 'instagram_url', 'https://www.instagram.com/consur_toyota/', 'text', 'social', 'Instagram Url', NULL, '2026-10-05 02:20:26', '2026-11-18 18:17:55');
INSERT INTO public.settings VALUES (10, 'tiktok_url', 'https://www.tiktok.com/@consurtoyota', 'text', 'social', 'Tiktok Url', NULL, '2026-10-05 02:20:26', '2026-11-18 18:17:55');
INSERT INTO public.settings VALUES (11, 'spotify_url', 'https://open.spotify.com/show/2c7HzcDvLF5XXMPbOckJn2', 'text', 'social', 'Spotify Url', NULL, '2026-10-05 02:20:26', '2026-11-18 18:17:55');
INSERT INTO public.settings VALUES (50, 'form_quote_btn_text', 'Enviar Solicitud de CotizaciÃ³n', 'text', 'forms', 'Formulario - Texto BotÃ³n', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (51, 'form_quote_success_title', 'Â¡Gracias por contactarnos!', 'text', 'forms', 'Formulario - TÃ­tulo Ã‰xito', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (52, 'form_quote_success_desc', 'Hemos recibido tu consulta y nos pondremos en contacto contigo a la brevedad.', 'text', 'forms', 'Formulario - Mensaje Ã‰xito', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (53, 'form_notification_email', 'ventas@consur.com.py', 'text', 'forms', 'Email de NotificaciÃ³n de Leads', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (54, 'footer_col1_text', 'Concesionaria Oficial de Toyota en Paraguay. Excelencia, garantÃ­a y servicio de posventa especializado para tu tranquilidad y confianza.', 'text', 'footer', 'Footer - Texto Columna 1', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (61, 'site_logo_text_prefix', 'CONSUR', 'text', 'branding', 'Prefijo de Texto del Logo', NULL, '2026-10-05 14:30:53', '2026-10-05 14:30:53');
INSERT INTO public.settings VALUES (62, 'site_logo_text_suffix', '.', 'text', 'branding', 'Sufijo de Texto del Logo', NULL, '2026-10-05 14:30:53', '2026-10-05 14:30:53');
INSERT INTO public.settings VALUES (67, 'footer_show_facebook', '1', 'text', 'footer', 'Footer Show Facebook', NULL, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (68, 'footer_show_instagram', '1', 'text', 'footer', 'Footer Show Instagram', NULL, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (69, 'footer_show_tiktok', '1', 'text', 'footer', 'Footer Show Tiktok', NULL, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (70, 'footer_show_spotify', '1', 'text', 'footer', 'Footer Show Spotify', NULL, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (73, 'linkedin_url', 'https://www.linkedin.com/company/consur-toyota', 'text', 'social', 'Linkedin Url', NULL, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (60, 'site_logo_type', 'image', 'text', 'general', 'Site Logo Type', NULL, '2026-10-05 14:30:53', '2026-11-01 00:30:52');
INSERT INTO public.settings VALUES (64, 'site_logo_url', '/images/logoconsurweb.png', 'text', 'general', 'Site Logo Url', NULL, '2026-10-05 14:30:53', '2026-11-01 00:30:53');
INSERT INTO public.settings VALUES (63, 'site_logo_badge', '', 'text', 'general', 'Site Logo Badge', NULL, '2026-10-05 14:30:53', '2026-11-01 00:30:53');
INSERT INTO public.settings VALUES (80, 'footer_logo_type', 'image', 'text', 'general', 'Footer Logo Type', NULL, '2026-11-01 00:30:53', '2026-11-01 00:30:53');
INSERT INTO public.settings VALUES (81, 'footer_logo_url', '/images/logoconsurweb.png', 'text', 'general', 'Footer Logo Url', NULL, '2026-11-01 00:30:53', '2026-11-01 00:30:53');
INSERT INTO public.settings VALUES (82, 'footer_logo_badge', '', 'text', 'general', 'Footer Logo Badge', NULL, '2026-11-01 00:30:53', '2026-11-01 00:30:53');
INSERT INTO public.settings VALUES (83, 'catalog_pdf_url', '/catalogos/CATALOGO_CONSUR_TOYOTA_WEB_02.pdf', 'text', 'catalog', 'Ruta del PDF del CatÃ¡logo Activo', NULL, '2026-11-10 13:59:05', '2026-11-10 13:59:05');
INSERT INTO public.settings VALUES (85, 'catalog_edition', 'EdiciÃ³n Oficial Vigente', 'text', 'catalog', 'EdiciÃ³n / Mes del CatÃ¡logo', NULL, '2026-11-10 13:59:05', '2026-11-10 13:59:05');
INSERT INTO public.settings VALUES (65, 'site_favicon_url', '/images/favicon/favicon-32x32.png', 'text', 'branding', 'URL de Favicon', NULL, '2026-10-05 14:30:53', '2026-11-11 18:31:47');
INSERT INTO public.settings VALUES (86, 'site_logo_dark_url', '/images/logoconsurweb-white.png', 'text', 'branding', 'URL de Imagen del Logo para Modo Oscuro', NULL, '2026-11-12 11:17:15', '2026-11-12 11:17:15');
INSERT INTO public.settings VALUES (23, 'sec_usados_desc', 'AccedÃ© a autos y camionetas seleccionadas con historial verificado, revisiÃ³n tÃ©cnica integral en talleres CONSUR y planes de financiaciÃ³n directa.', 'text', 'home_sections', 'Usados - DescripciÃ³n', NULL, '2026-10-05 13:33:22', '2026-11-12 19:25:39');
INSERT INTO public.settings VALUES (49, 'form_quote_desc', 'CompletÃ¡ el formulario y un asesor comercial de CONSUR S.A. se comunicarÃ¡ contigo con las mejores opciones de pago.', 'text', 'forms', 'Formulario - SubtÃ­tulo', NULL, '2026-10-05 13:33:22', '2026-11-12 19:25:39');
INSERT INTO public.settings VALUES (59, 'footer_copyright', 'Â© {year} CONSUR S.A. Todos los derechos reservados. Concesionaria Oficial Toyota Paraguay.', 'text', 'footer', 'Footer Copyright', NULL, '2026-10-05 13:33:22', '2026-11-12 19:25:39');
INSERT INTO public.settings VALUES (84, 'catalog_title', 'CatÃ¡logo Digital CONSUR S.A.', 'text', 'catalog', 'TÃ­tulo del CatÃ¡logo Digital', NULL, '2026-11-10 13:59:05', '2026-11-12 19:25:39');
INSERT INTO public.settings VALUES (72, 'footer_show_youtube', '1', 'text', 'footer', 'Footer Show Youtube', NULL, '2026-10-05 14:42:34', '2026-11-18 01:28:31');
INSERT INTO public.settings VALUES (74, 'youtube_url', 'https://www.youtube.com/@Consurtoyota', 'text', 'social', 'Youtube Url', NULL, '2026-10-05 14:42:34', '2026-11-18 01:28:31');
INSERT INTO public.settings VALUES (71, 'footer_show_linkedin', '0', 'text', 'footer', 'Footer Show Linkedin', NULL, '2026-10-05 14:42:34', '2026-11-18 18:18:27');
INSERT INTO public.settings VALUES (55, 'footer_col2_title', 'Marcas Oficiales', 'text', 'footer', 'Footer Col2 Title', NULL, '2026-10-05 13:33:22', '2026-11-18 18:34:28');
INSERT INTO public.settings VALUES (56, 'footer_col3_title', 'NOSOTROS', 'text', 'footer', 'Footer Col3 Title', NULL, '2026-10-05 13:33:22', '2026-11-18 18:34:28');


--
-- Data for Name: site_sections; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.site_sections VALUES (6, 'branches_section', 'SecciÃ³n Red de Sucursales', true, 6, '{"desc": "Visitanos en nuestras salas de exhibiciÃ³n y talleres autorizados en el sur del paÃ­s.", "badge": "Red de AtenciÃ³n", "title": "Nuestras Sucursales"}', '2026-10-05 14:38:08', '2026-10-05 14:38:08');
INSERT INTO public.site_sections VALUES (2, 'featured_0km', 'SecciÃ³n VehÃ­culos 0 Km Destacados', true, 2, '{"badge": "LÃ­nea de Modelos 0 Km", "title": "DescubrÃ­ tu prÃ³ximo Toyota"}', '2026-10-05 14:38:08', '2026-10-27 20:47:13');
INSERT INTO public.site_sections VALUES (8, 'consur_shop_cta', 'Tienda Online Consur Shop (CTA)', true, 4, '{"desc": "Â¡Enterate de todo lo que tenemos para vos! EncontrÃ¡ repuestos, accesorios, equipamiento y productos destacados desde tu celular o computadora.", "badge": "CONSUR Shop â€¢ Compra Online RÃ¡pido y FÃ¡cil", "title": "VisitÃ¡ Nuestra Tienda Online", "button_url": "https://consurshop.com", "button_text": "Visitar ConsurShop.com", "banner_image": "/images/home/banner_consurshop.webp"}', '2026-10-31 21:44:35', '2026-11-12 19:25:39');
INSERT INTO public.site_sections VALUES (1, 'quick_value_bar', 'Gran Variedad de Servicios (4 Bloques)', true, 5, '{"desc": "Para una mejor atenciÃ³n disponemos de cinco locales, con la mÃ¡s amplia gama de vehÃ­culos, repuestos y servicios.", "badge": "Respaldo Posventa Integral", "title": "Gran variedad de servicios", "item_1": {"desc": "Tenemos todo lo que buscas con precios que te harÃ¡n ahorrar dinero y ganar seguridad.", "icon": "fas fa-cogs", "image": "/images/home/turbo.png", "title": "Repuestos originales"}, "item_2": {"desc": "Personalice su vehÃ­culo con una gran variedad de accesorios que disponemos para usted.", "icon": "fas fa-car", "image": "/images/home/steering-wheel.png", "title": "Equipamiento"}, "item_3": {"desc": "Diagnosticamos si tu vehÃ­culo estÃ¡ en condiciones normales de funcionamiento.", "icon": "fas fa-stethoscope", "image": "/images/home/suspension.png", "title": "Chequeo & DiagnÃ³stico"}, "item_4": {"desc": "Valoramos tu tiempo y estamos comprometidos en brindarte el mejor servicio Post venta.", "icon": "fas fa-tablet-alt", "image": "/images/home/support.png", "title": "Service Tablet"}, "background_image": "/images/home/toyotaaclientes.jpg"}', '2026-10-05 14:38:08', '2026-10-31 21:44:35');
INSERT INTO public.site_sections VALUES (3, 'usados_banner', 'Banner de Usados Certificados', true, 3, '{"desc": "AccedÃ© a autos y camionetas seleccionadas con historial verificado, revisiÃ³n tÃ©cnica integral en talleres CONSUR y planes de financiaciÃ³n directa.", "badge": "CONSUR Usados Certificados", "title": "VehÃ­culos con Experiencia y Respaldo Oficial", "button_url": "/usados", "button_text": "Ver Todo el Stock de Usados", "background_image": "https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=1920"}', '2026-10-05 14:38:08', '2026-11-12 19:25:39');
INSERT INTO public.site_sections VALUES (7, 'quotation_section', 'SecciÃ³n Formulario de CotizaciÃ³n', true, 7, '{"desc": "CompletÃ¡ el formulario y un asesor comercial de CONSUR S.A. se comunicarÃ¡ contigo con las mejores opciones de pago.", "badge": "Asesoramiento Personalizado", "title": "CotizÃ¡ tu PrÃ³ximo Toyota", "button_text": "Enviar Solicitud de CotizaciÃ³n"}', '2026-10-05 14:38:08', '2026-11-12 19:25:39');
INSERT INTO public.site_sections VALUES (4, 'posventa_taller_movil', 'SecciÃ³n Posventa & Taller MÃ³vil', true, 2, '{"desc": "Porque tu tiempo es importante nos acercamos a vos. Servicio pos-venta CONSUR MÃ³vil: te ofrecemos mantenimiento express para tu vehÃ­culo en tu hogar u oficina.", "badge": "Â¡Una nueva soluciÃ³n para vos!", "title": "Taller MÃ³vil CONSUR", "main_image": "/images/home/hometallermovil.png", "button_1_url": "http://www.turnos365.com/turnos.aspx?con=131", "button_2_msg": "Hola CONSUR, quisiera agendar el servicio de Taller MÃ³vil", "button_1_text": "Agendar Turno Online", "button_2_text": "Solicitar Taller MÃ³vil", "feature_1_desc": "Mantenimiento oficial manteniendo la garantÃ­a de fÃ¡brica.", "feature_1_icon": "fas fa-tools", "feature_2_desc": "Filtros, lubricantes originales Toyota y revisiÃ³n integral de 12 puntos.", "feature_2_icon": "fas fa-oil-can", "feature_1_title": "Service Programado", "feature_2_title": "Repuestos Genuinos", "highlight_badge_desc": "AtenciÃ³n en tu casa, oficina o establecimiento con tÃ©cnicos certificados Toyota y Hino.", "highlight_badge_title": "100% OFICIAL"}', '2026-10-05 14:38:08', '2026-11-12 19:25:39');
INSERT INTO public.site_sections VALUES (5, 'podcast_section', 'Podcast Oficial en Spotify', true, 6, '{"podcast_desc": "EscuchÃ¡ o mirÃ¡ automÃ¡ticamente nuestro episodio mÃ¡s reciente sobre novedades automotrices, tecnologÃ­a Toyota y consejos de posventa, o visitÃ¡ nuestro canal oficial con todos los capÃ­tulos.", "podcast_badge": "Conecta con CONSUR â€¢ Podcast Oficial", "podcast_title": "Ãšltimo Episodio en Spotify", "spotify_show_url": "https://open.spotify.com/show/2c7HzcDvLF5XXMPbOckJn2?si=50dea64677714274"}', '2026-10-05 14:38:08', '2026-11-12 19:25:39');


--
-- Data for Name: sliders; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.sliders VALUES (8, 'NUEVO LANZAMIENTO', 'TecnologÃ­a que inspira en cada vuelta', 'Una nueva dimensiÃ³n en Movilidad llega a ItapÃºa', NULL, NULL, NULL, NULL, 'sliders/7K9HgmGrv9OYSm6hj4vdIpxihUCVD7nlPQ10OKrd.jpg', 'sliders/ReZtmVO5SpcoByhwbK4l0BH2hauGqHIbg03ci2wu.jpg', 'center', true, 1, '2026-11-11 15:18:55', '2026-11-11 15:30:12', NULL, 'home');
INSERT INTO public.sliders VALUES (9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sliders/px5lf6jiMQCOdUxEJZ66UrGgePSbypHMu2U5QRou.jpg', 'sliders/ywNW0doS54Cy3iJrs1qIxiidq1Wel5a8xHAYNNqU.jpg', 'left', true, 0, '2026-11-19 11:38:12', '2026-11-19 11:39:25', NULL, 'home');
INSERT INTO public.sliders VALUES (10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sliders/fOtZIxuk59L74S67bsODsQ5tHEUoccwwzbSXLlUA.jpg', 'sliders/OV9HGgCHQOesWYNbpSQaFj5axoVXM9MnukMYiGi8.jpg', 'left', true, 0, '2026-11-19 11:41:47', '2026-11-19 11:41:47', NULL, 'home');
INSERT INTO public.sliders VALUES (11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sliders/hRLifmVPQNlgMHEdqVxyfnombaYAwRo0Zd0BvoRF.jpg', 'sliders/awWTkRLIB7BHhF5d5i97K6s5TgLbADz0djXOUJjv.jpg', 'left', true, 0, '2026-11-19 11:42:46', '2026-11-19 11:42:46', NULL, 'home');
INSERT INTO public.sliders VALUES (12, NULL, NULL, NULL, NULL, 'https://wa.me/595984222297?text=Hola+CONSUR+Broker+de+Seguros%2C+quiero+renovar+o+adquirir+mi+p%C3%B3liza+y+participar+por+el+viaje+a+R%C3%ADo+de+Janeiro.', NULL, NULL, 'images/pages/seguros-slide-1-1795090047-Wz64Zc.webp', 'images/pages/seguros-slide-1-mobile-1795091269-uCwG8d.webp', 'left', true, 1, '2026-11-19 12:58:33', '2026-11-19 12:58:33', NULL, 'seguros');
INSERT INTO public.sliders VALUES (13, NULL, NULL, NULL, NULL, 'https://wa.me/595984222297?text=Hola+CONSUR+Broker+de+Seguros%2C+quisiera+solicitar+asesoramiento+sobre+p%C3%B3lizas.', NULL, NULL, 'images/pages/seguros-slide-2-1795090055-nFZ0h1.webp', 'images/pages/seguros-slide-2-mobile-1795091292-5gJdXU.webp', 'left', true, 2, '2026-11-19 12:58:33', '2026-11-19 12:58:33', NULL, 'seguros');


--
-- Data for Name: testimonials; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.testimonials VALUES (1, 'Ing. Fernando Gamarra', 'Toyota Hilux SRV 4x4', 'ItapÃºa', 'El servicio de Taller MÃ³vil de Consur es invaluable para los que trabajamos en el campo. Vinieron a mi estancia para el service oficial sin perder un solo dÃ­a de trabajo.', 5, NULL, true, 1, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.testimonials VALUES (2, 'Dra. Patricia Villalba', 'Toyota Corolla Cross Hybrid', 'EncarnaciÃ³n', 'ComprÃ© mi vehÃ­culo usado con certificaciÃ³n de Consur y la tranquilidad que te dan es total. El consumo de combustible es mÃ­nimo y la atenciÃ³n posventa impecable.', 5, NULL, true, 2, '2026-10-05 02:20:26', '2026-10-05 02:20:26');


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.users VALUES (2, 'Asesor de Ventas 0KM & Usados', 'ventas@consur.com.py', '+595 985 204 106', 'ventas', true, NULL, '2026-10-05 02:20:24', '$2y$12$B2WdX74c64cmodlqHbXpgOoSpHp2qMI.LrP821l9mpZN3W18tr/5K', NULL, '2026-10-05 02:20:24', '2026-10-05 02:20:24');
INSERT INTO public.users VALUES (1, 'Carlos BenÃ­tez (Administrador General)', 'admin@consur.com.py', '+595 985 804 106', 'admin', true, NULL, '2026-10-05 23:34:29', '$2y$12$ssxCPozspJcbzlkhWQIJZOc4aP5CzglpACWiVjI9EhhZtUO8kMtSO', NULL, '2026-10-05 02:20:24', '2026-10-05 23:34:29');
INSERT INTO public.users VALUES (3, 'MarÃ­a Duarte (Gestora de Contenidos)', 'gestor@consur.com.py', '+595 985 304 106', 'gestor', true, NULL, '2026-10-05 23:34:29', '$2y$12$AYmLMpfi8BINeWCVIC2wlOWBOVz.TKFgCQI/Df7R2h3ih/sDL044y', NULL, '2026-10-05 23:34:29', '2026-10-05 23:34:29');
INSERT INTO public.users VALUES (4, 'Rodrigo Alcaraz (Asesor Comercial)', 'vendedor@consur.com.py', '+595 985 204 106', 'vendedor', true, NULL, '2026-10-05 23:34:29', '$2y$12$bKrvf4faSFGCPkMllUeLd.Kt505O4PabjSTj1quYqDJ2543jqLrJq', NULL, '2026-10-05 23:34:29', '2026-10-05 23:34:29');
INSERT INTO public.users VALUES (5, 'Lautaro Gimenez', 'lautaro.ventas@consur.com.py', '+595 981 777 888', 'vendedor', true, NULL, NULL, '$2y$12$wcmHm0XSST7uOiQwDMsOHeFV4HKUsfFsORXgO3/a5JdkbkpBocWGa', NULL, '2026-10-05 23:58:35', '2026-10-05 23:58:35');


--
-- Data for Name: vehicle_categories; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.vehicle_categories VALUES (2, 'SUV', 'suv', 'fa-car', NULL, true, 1, '2026-10-05 02:20:24', '2026-11-05 01:51:00');
INSERT INTO public.vehicle_categories VALUES (6, 'Pick-Up', 'pick-up', 'fa-truck-pickup', NULL, true, 2, '2026-10-27 20:45:47', '2026-11-05 01:51:00');
INSERT INTO public.vehicle_categories VALUES (1, 'SedÃ¡n', 'sedan', 'fa-car-side', NULL, true, 3, '2026-10-05 02:20:24', '2026-11-05 01:51:00');
INSERT INTO public.vehicle_categories VALUES (4, 'Hatchback', 'hatchback', 'fa-car', NULL, true, 4, '2026-10-05 02:20:24', '2026-11-05 01:51:00');
INSERT INTO public.vehicle_categories VALUES (10, 'Comercial / Utilitario', 'utilitario', 'fa-van-shuttle', NULL, true, 5, '2026-10-31 19:25:38', '2026-11-05 01:51:00');
INSERT INTO public.vehicle_categories VALUES (9, 'Electrificados / HÃ­bridos', 'electrificados', 'fa-leaf', NULL, true, 6, '2026-10-27 20:45:47', '2026-11-05 01:51:00');
INSERT INTO public.vehicle_categories VALUES (3, 'Camioneta', 'camioneta', 'fa-truck-pickup', NULL, false, 3, '2026-10-05 02:20:24', '2026-11-05 01:51:00');
INSERT INTO public.vehicle_categories VALUES (5, 'HÃ­bridos', 'hibridos', 'fa-leaf', NULL, false, 5, '2026-10-05 02:20:24', '2026-11-05 01:51:00');
INSERT INTO public.vehicle_categories VALUES (8, 'Deportivos', 'deportivos', 'fa-bolt', NULL, false, 5, '2026-10-27 20:45:47', '2026-11-05 01:51:00');
INSERT INTO public.vehicle_categories VALUES (7, 'Comercial', 'comercial', 'fa-van-shuttle', NULL, false, 4, '2026-10-27 20:45:47', '2026-11-05 01:51:00');


--
-- Data for Name: vehicle_images; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.vehicle_images VALUES (267, 42, 'images/vehicles/rush/rush.png', NULL, true, 1, '2026-10-31 19:42:44', '2026-11-19 10:55:16');
INSERT INTO public.vehicle_images VALUES (57, 9, 'images/models/yaris-hatchback.webp', NULL, true, 1, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (58, 9, 'images/models/yaris-hatchback-hover.webp', NULL, false, 2, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (59, 10, 'images/models/corolla.webp', NULL, true, 1, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (60, 10, 'images/models/corolla-hover.png', NULL, false, 2, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (61, 11, 'images/models/agya.png', NULL, true, 1, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (62, 12, 'images/models/hilux-cabina-doble.webp', NULL, true, 1, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (63, 12, 'images/models/hilux-cabina-doble-hover.webp', NULL, false, 2, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (64, 13, 'images/models/hilux-cabina-simple.png', NULL, true, 1, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (65, 13, 'images/models/hilux-cabina-simple-hover.png', NULL, false, 2, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (66, 14, 'images/models/hilux-gr-sport.png', NULL, true, 1, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (67, 14, 'images/models/hilux-gr-sport-hover.png', NULL, false, 2, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (68, 15, 'images/models/corolla-cross.webp', NULL, true, 1, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (69, 15, 'images/models/corolla-cross-hover.webp', NULL, false, 2, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (70, 16, 'images/models/fortuner-sw4.webp', NULL, true, 1, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (71, 16, 'images/models/fortuner-sw4-hover.webp', NULL, false, 2, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (72, 17, 'images/models/yaris-cross.webp', NULL, true, 1, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (73, 17, 'images/models/yaris-cross-hover.webp', NULL, false, 2, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (74, 18, 'images/models/land-cruiser-prado.png', NULL, true, 1, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (75, 18, 'images/models/land-cruiser-prado-hover.png', NULL, false, 2, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (76, 19, 'images/models/raize-sport.png', NULL, true, 1, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (77, 20, 'images/models/hiace-furgon.webp', NULL, true, 1, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (78, 20, 'images/models/hiace-furgon-hover.webp', NULL, false, 2, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (79, 21, 'images/models/hiace-commuter.webp', NULL, true, 1, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (80, 21, 'images/models/hiace-commuter-hover.webp', NULL, false, 2, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (81, 22, 'images/models/gr-yaris.webp', NULL, true, 1, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (82, 22, 'images/models/gr-yaris-hover.webp', NULL, false, 2, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (83, 23, 'images/models/corolla-gr-sport.webp', NULL, true, 1, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (84, 23, 'images/models/corolla-gr-sport-hover.webp', NULL, false, 2, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (85, 24, 'images/models/gr86.webp', NULL, true, 1, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (86, 24, 'images/models/gr86-hover.webp', NULL, false, 2, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (87, 25, 'images/models/corolla-hybrid.webp', NULL, true, 1, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (88, 25, 'images/models/corolla-hybrid-hover.webp', NULL, false, 2, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (89, 26, 'images/models/corolla-cross-hybrid.webp', NULL, true, 1, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (90, 26, 'images/models/corolla-cross-hybrid-hover.webp', NULL, false, 2, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (91, 27, 'images/models/rav4-hybrid.png', NULL, true, 1, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (92, 27, 'images/models/rav4-hybrid-hover.png', NULL, false, 2, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (93, 28, 'images/models/yaris-cross-hybrid.webp', NULL, true, 1, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (94, 28, 'images/models/yaris-cross-hybrid-hover.webp', NULL, false, 2, '2026-10-27 20:47:13', '2026-10-27 20:47:13');
INSERT INTO public.vehicle_images VALUES (357, 29, 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_01.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 1', true, 1, '2026-11-11 16:42:40', '2026-11-11 16:42:40');
INSERT INTO public.vehicle_images VALUES (358, 29, 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_02.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 2', false, 2, '2026-11-11 16:42:40', '2026-11-11 16:42:40');
INSERT INTO public.vehicle_images VALUES (359, 29, 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_03.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 3', false, 3, '2026-11-11 16:42:40', '2026-11-11 16:42:40');
INSERT INTO public.vehicle_images VALUES (360, 29, 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_04.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 4', false, 4, '2026-11-11 16:42:40', '2026-11-11 16:42:40');
INSERT INTO public.vehicle_images VALUES (361, 29, 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_05.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 5', false, 5, '2026-11-11 16:42:40', '2026-11-11 16:42:40');
INSERT INTO public.vehicle_images VALUES (362, 29, 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_06.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 6', false, 6, '2026-11-11 16:42:40', '2026-11-11 16:42:40');
INSERT INTO public.vehicle_images VALUES (363, 29, 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_07.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 7', false, 7, '2026-11-11 16:42:40', '2026-11-11 16:42:40');
INSERT INTO public.vehicle_images VALUES (364, 29, 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_08.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 8', false, 8, '2026-11-11 16:42:40', '2026-11-11 16:42:40');
INSERT INTO public.vehicle_images VALUES (365, 29, 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_09.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 9', false, 9, '2026-11-11 16:42:40', '2026-11-11 16:42:40');
INSERT INTO public.vehicle_images VALUES (366, 29, 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_10.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 10', false, 10, '2026-11-11 16:42:40', '2026-11-11 16:42:40');
INSERT INTO public.vehicle_images VALUES (367, 29, 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_11.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 11', false, 11, '2026-11-11 16:42:41', '2026-11-11 16:42:41');
INSERT INTO public.vehicle_images VALUES (368, 29, 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_12.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 12', false, 12, '2026-11-11 16:42:43', '2026-11-11 16:42:43');
INSERT INTO public.vehicle_images VALUES (369, 29, 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_13.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 13', false, 13, '2026-11-11 16:42:45', '2026-11-11 16:42:45');
INSERT INTO public.vehicle_images VALUES (370, 29, 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_14.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 14', false, 14, '2026-11-11 16:42:47', '2026-11-11 16:42:47');
INSERT INTO public.vehicle_images VALUES (371, 29, 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_15.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 15', false, 15, '2026-11-11 16:42:48', '2026-11-11 16:42:48');
INSERT INTO public.vehicle_images VALUES (372, 29, 'vehicles/usados/toyota-fortuner-2018-plata-4x4-aut/foto_16.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 16', false, 16, '2026-11-11 16:42:49', '2026-11-11 16:42:49');
INSERT INTO public.vehicle_images VALUES (373, 32, 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_01.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2024 - Foto 1', true, 1, '2026-11-11 16:42:49', '2026-11-11 16:42:49');
INSERT INTO public.vehicle_images VALUES (374, 32, 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_02.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2024 - Foto 2', false, 2, '2026-11-11 16:42:49', '2026-11-11 16:42:49');
INSERT INTO public.vehicle_images VALUES (375, 32, 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_03.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2024 - Foto 3', false, 3, '2026-11-11 16:42:49', '2026-11-11 16:42:49');
INSERT INTO public.vehicle_images VALUES (376, 32, 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_04.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2024 - Foto 4', false, 4, '2026-11-11 16:42:49', '2026-11-11 16:42:49');
INSERT INTO public.vehicle_images VALUES (377, 32, 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_05.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2024 - Foto 5', false, 5, '2026-11-11 16:42:49', '2026-11-11 16:42:49');
INSERT INTO public.vehicle_images VALUES (378, 32, 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_06.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2024 - Foto 6', false, 6, '2026-11-11 16:42:49', '2026-11-11 16:42:49');
INSERT INTO public.vehicle_images VALUES (379, 32, 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_07.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2024 - Foto 7', false, 7, '2026-11-11 16:42:49', '2026-11-11 16:42:49');
INSERT INTO public.vehicle_images VALUES (380, 32, 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_08.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2024 - Foto 8', false, 8, '2026-11-11 16:42:49', '2026-11-11 16:42:49');
INSERT INTO public.vehicle_images VALUES (381, 32, 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_09.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2024 - Foto 9', false, 9, '2026-11-11 16:42:49', '2026-11-11 16:42:49');
INSERT INTO public.vehicle_images VALUES (382, 32, 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_10.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2024 - Foto 10', false, 10, '2026-11-11 16:42:51', '2026-11-11 16:42:51');
INSERT INTO public.vehicle_images VALUES (383, 32, 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_11.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2024 - Foto 11', false, 11, '2026-11-11 16:42:53', '2026-11-11 16:42:53');
INSERT INTO public.vehicle_images VALUES (384, 32, 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_12.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2024 - Foto 12', false, 12, '2026-11-11 16:42:54', '2026-11-11 16:42:54');
INSERT INTO public.vehicle_images VALUES (385, 32, 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_13.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2024 - Foto 13', false, 13, '2026-11-11 16:42:56', '2026-11-11 16:42:56');
INSERT INTO public.vehicle_images VALUES (386, 32, 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_14.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2024 - Foto 14', false, 14, '2026-11-11 16:42:58', '2026-11-11 16:42:58');
INSERT INTO public.vehicle_images VALUES (387, 32, 'vehicles/usados/toyota-rav4-hv-2024-hibrida-aut/foto_15.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2024 - Foto 15', false, 15, '2026-11-11 16:42:59', '2026-11-11 16:42:59');
INSERT INTO public.vehicle_images VALUES (388, 33, 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_01.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2020 - Foto 1', true, 1, '2026-11-11 16:42:59', '2026-11-11 16:42:59');
INSERT INTO public.vehicle_images VALUES (389, 33, 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_02.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2020 - Foto 2', false, 2, '2026-11-11 16:42:59', '2026-11-11 16:42:59');
INSERT INTO public.vehicle_images VALUES (390, 33, 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_03.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2020 - Foto 3', false, 3, '2026-11-11 16:42:59', '2026-11-11 16:42:59');
INSERT INTO public.vehicle_images VALUES (391, 33, 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_04.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2020 - Foto 4', false, 4, '2026-11-11 16:42:59', '2026-11-11 16:42:59');
INSERT INTO public.vehicle_images VALUES (392, 33, 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_05.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2020 - Foto 5', false, 5, '2026-11-11 16:42:59', '2026-11-11 16:42:59');
INSERT INTO public.vehicle_images VALUES (393, 33, 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_06.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2020 - Foto 6', false, 6, '2026-11-11 16:42:59', '2026-11-11 16:42:59');
INSERT INTO public.vehicle_images VALUES (394, 33, 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_07.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2020 - Foto 7', false, 7, '2026-11-11 16:42:59', '2026-11-11 16:42:59');
INSERT INTO public.vehicle_images VALUES (395, 33, 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_08.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2020 - Foto 8', false, 8, '2026-11-11 16:43:01', '2026-11-11 16:43:01');
INSERT INTO public.vehicle_images VALUES (396, 33, 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_09.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2020 - Foto 9', false, 9, '2026-11-11 16:43:02', '2026-11-11 16:43:02');
INSERT INTO public.vehicle_images VALUES (397, 33, 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_10.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2020 - Foto 10', false, 10, '2026-11-11 16:43:04', '2026-11-11 16:43:04');
INSERT INTO public.vehicle_images VALUES (398, 33, 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_11.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2020 - Foto 11', false, 11, '2026-11-11 16:43:06', '2026-11-11 16:43:06');
INSERT INTO public.vehicle_images VALUES (302, 49, 'images/vehicles/hilux-cabina-simple/hiluxsimple.png', NULL, true, 1, '2026-10-31 19:42:44', '2026-11-19 10:55:15');
INSERT INTO public.vehicle_images VALUES (342, 46, 'images/vehicles/rav4/rav4limited.png', NULL, true, 1, '2026-11-11 14:52:56', '2026-11-19 10:55:16');
INSERT INTO public.vehicle_images VALUES (322, 53, 'images/vehicles/hilux/hilux.png', NULL, true, 1, '2026-10-31 19:42:44', '2026-11-19 01:55:55');
INSERT INTO public.vehicle_images VALUES (347, 52, 'images/vehicles/fortuner/fortuner.png', NULL, true, 1, '2026-11-11 14:52:56', '2026-11-19 01:55:55');
INSERT INTO public.vehicle_images VALUES (292, 47, 'images/vehicles/yaris-cross/yariscross.png', NULL, true, 1, '2026-10-31 19:42:44', '2026-11-19 01:55:55');
INSERT INTO public.vehicle_images VALUES (272, 43, 'images/vehicles/corolla/corolla.png', NULL, true, 1, '2026-10-31 19:42:44', '2026-11-19 10:55:15');
INSERT INTO public.vehicle_images VALUES (277, 44, 'images/vehicles/corolla-cross/corollacross.png', NULL, true, 1, '2026-10-31 19:42:44', '2026-11-19 10:55:15');
INSERT INTO public.vehicle_images VALUES (312, 51, 'images/vehicles/hiace/hiace.png', NULL, true, 1, '2026-10-31 19:42:44', '2026-11-19 10:55:15');
INSERT INTO public.vehicle_images VALUES (352, 50, 'images/vehicles/land-cruiser-prado/landcruiserprado.png', NULL, true, 1, '2026-11-11 14:52:56', '2026-11-19 10:55:16');
INSERT INTO public.vehicle_images VALUES (297, 48, 'images/vehicles/land-cruiser-300/landcruiservx300.png', NULL, true, 1, '2026-10-31 19:42:44', '2026-11-19 10:55:16');
INSERT INTO public.vehicle_images VALUES (263, 41, 'images/vehicles/raize/slide_raizehome.jpg', NULL, false, 2, '2026-10-31 19:42:43', '2026-10-31 19:42:43');
INSERT INTO public.vehicle_images VALUES (264, 41, 'images/vehicles/raize/raize1.jpg', NULL, false, 3, '2026-10-31 19:42:43', '2026-10-31 19:42:43');
INSERT INTO public.vehicle_images VALUES (265, 41, 'images/vehicles/raize/raize2.jpg', NULL, false, 4, '2026-10-31 19:42:43', '2026-10-31 19:42:43');
INSERT INTO public.vehicle_images VALUES (266, 41, 'images/vehicles/raize/raize3.jpg', NULL, false, 5, '2026-10-31 19:42:43', '2026-10-31 19:42:43');
INSERT INTO public.vehicle_images VALUES (268, 42, 'images/vehicles/rush/slider_rush.jpg', NULL, false, 2, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (269, 42, 'images/vehicles/rush/rush-1.jpg', NULL, false, 3, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (270, 42, 'images/vehicles/rush/rush-2.jpg', NULL, false, 4, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (271, 42, 'images/vehicles/rush/rush-3.jpg', NULL, false, 5, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (273, 43, 'images/vehicles/corolla/slider_corolla.jpg', NULL, false, 2, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (274, 43, 'images/vehicles/corolla/gli1.jpg', NULL, false, 3, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (275, 43, 'images/vehicles/corolla/gli2.jpg', NULL, false, 4, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (276, 43, 'images/vehicles/corolla/gli3.jpg', NULL, false, 5, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (278, 44, 'images/vehicles/corolla-cross/slidecorollacross2025_1.jpg', NULL, false, 2, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (279, 44, 'images/vehicles/corolla-cross/CorollaCrossHybrid-20.jpg', NULL, false, 3, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (280, 44, 'images/vehicles/corolla-cross/CorollaCrossHybrid-33.jpg', NULL, false, 4, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (281, 44, 'images/vehicles/corolla-cross/CorollaCross-25.jpg', NULL, false, 5, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (283, 45, 'images/vehicles/agya/agyaslide3.jpg', NULL, false, 2, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (284, 45, 'images/vehicles/agya/TOYOTA-AGYA-23.jpg', NULL, false, 3, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (285, 45, 'images/vehicles/agya/TOYOTA-AGYA-22.jpg', NULL, false, 4, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (286, 45, 'images/vehicles/agya/TOYOTA-AGYA-29.jpg', NULL, false, 5, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (282, 45, 'images/vehicles/agya/agya.png', NULL, true, 1, '2026-10-31 19:42:44', '2026-11-19 10:55:16');
INSERT INTO public.vehicle_images VALUES (262, 41, 'images/vehicles/raize/raize-sport.png', NULL, true, 1, '2026-10-31 19:42:43', '2026-11-19 10:55:16');
INSERT INTO public.vehicle_images VALUES (293, 47, 'images/vehicles/yaris-cross/SlideYariscross.jpg', NULL, false, 2, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (294, 47, 'images/vehicles/yaris-cross/cvt1.jpg', NULL, false, 3, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (295, 47, 'images/vehicles/yaris-cross/hybrid1.jpg', NULL, false, 4, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (296, 47, 'images/vehicles/yaris-cross/yariscross-01.jpg', NULL, false, 5, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (298, 48, 'images/vehicles/land-cruiser-300/slide_vx300.jpg', NULL, false, 2, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (299, 48, 'images/vehicles/land-cruiser-300/1.jpg', NULL, false, 3, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (300, 48, 'images/vehicles/land-cruiser-300/2.jpg', NULL, false, 4, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (301, 48, 'images/vehicles/land-cruiser-300/3.jpg', NULL, false, 5, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (303, 49, 'images/vehicles/hilux-cabina-simple/slide_hiluxcabsimple.jpg', NULL, false, 2, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (304, 49, 'images/vehicles/hilux-cabina-simple/dest_hiluxsimple.jpg', NULL, false, 3, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (305, 49, 'images/vehicles/hilux-cabina-simple/hiluxsimple.jpg', NULL, false, 4, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (306, 49, 'images/vehicles/hilux-cabina-simple/simple1.jpg', NULL, false, 5, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (313, 51, 'images/vehicles/hiace/slider_hiace.jpg', NULL, false, 2, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (314, 51, 'images/vehicles/hiace/hiace-1.jpg', NULL, false, 3, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (315, 51, 'images/vehicles/hiace/hiace-2.jpg', NULL, false, 4, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (316, 51, 'images/vehicles/hiace/hiace-3.jpg', NULL, false, 5, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (323, 53, 'images/vehicles/hilux/slider_hilux.jpg', NULL, false, 2, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (324, 53, 'images/vehicles/hilux/hilux-1.jpg', NULL, false, 3, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (325, 53, 'images/vehicles/hilux/hilux-2.jpg', NULL, false, 4, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (326, 53, 'images/vehicles/hilux/hilux-3.jpg', NULL, false, 5, '2026-10-31 19:42:44', '2026-10-31 19:42:44');
INSERT INTO public.vehicle_images VALUES (343, 46, 'images/vehicles/rav4/Toyota-RAV4-TEASER-1.jpg', NULL, false, 2, '2026-11-11 14:52:56', '2026-11-11 14:52:56');
INSERT INTO public.vehicle_images VALUES (344, 46, 'images/vehicles/rav4/TOYOTA-RAV4-13.jpg', NULL, false, 3, '2026-11-11 14:52:56', '2026-11-11 14:52:56');
INSERT INTO public.vehicle_images VALUES (345, 46, 'images/vehicles/rav4/TOYOTA-RAV4-35.jpg', NULL, false, 4, '2026-11-11 14:52:56', '2026-11-11 14:52:56');
INSERT INTO public.vehicle_images VALUES (346, 46, 'images/vehicles/rav4/rav4-1.png', NULL, false, 5, '2026-11-11 14:52:56', '2026-11-11 14:52:56');
INSERT INTO public.vehicle_images VALUES (348, 52, 'images/vehicles/fortuner/slider_fortuner.jpg', NULL, false, 2, '2026-11-11 14:52:56', '2026-11-11 14:52:56');
INSERT INTO public.vehicle_images VALUES (349, 52, 'images/vehicles/fortuner/fortuner1.jpg', NULL, false, 3, '2026-11-11 14:52:56', '2026-11-11 14:52:56');
INSERT INTO public.vehicle_images VALUES (350, 52, 'images/vehicles/fortuner/fortuner2.jpg', NULL, false, 4, '2026-11-11 14:52:56', '2026-11-11 14:52:56');
INSERT INTO public.vehicle_images VALUES (351, 52, 'images/vehicles/fortuner/fortuner3.jpg', NULL, false, 5, '2026-11-11 14:52:56', '2026-11-11 14:52:56');
INSERT INTO public.vehicle_images VALUES (353, 50, 'images/vehicles/land-cruiser-prado/slideprado2025_1.jpg', NULL, false, 2, '2026-11-11 14:52:56', '2026-11-11 14:52:56');
INSERT INTO public.vehicle_images VALUES (354, 50, 'images/vehicles/land-cruiser-prado/BBY0830.jpg', NULL, false, 3, '2026-11-11 14:52:56', '2026-11-11 14:52:56');
INSERT INTO public.vehicle_images VALUES (355, 50, 'images/vehicles/land-cruiser-prado/BBY1100.jpg', NULL, false, 4, '2026-11-11 14:52:56', '2026-11-11 14:52:56');
INSERT INTO public.vehicle_images VALUES (356, 50, 'images/vehicles/land-cruiser-prado/prado02.jpg', NULL, false, 5, '2026-11-11 14:52:56', '2026-11-11 14:52:56');
INSERT INTO public.vehicle_images VALUES (399, 33, 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_12.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2020 - Foto 12', false, 12, '2026-11-11 16:43:07', '2026-11-11 16:43:07');
INSERT INTO public.vehicle_images VALUES (400, 33, 'vehicles/usados/toyota-rav4-hv-2020-hibrida-aut/foto_13.jpeg', 'Toyota RAV4 2.5 HV HÃ­brida AutomÃ¡tica 4x2 2020 - Foto 13', false, 13, '2026-11-11 16:43:08', '2026-11-11 16:43:08');
INSERT INTO public.vehicle_images VALUES (401, 34, 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_01.jpeg', 'Volkswagen T-Cross 1.0 TSI Turbo AutomÃ¡tica 2021 - Foto 1', true, 1, '2026-11-11 16:43:08', '2026-11-11 16:43:08');
INSERT INTO public.vehicle_images VALUES (402, 34, 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_02.jpeg', 'Volkswagen T-Cross 1.0 TSI Turbo AutomÃ¡tica 2021 - Foto 2', false, 2, '2026-11-11 16:43:08', '2026-11-11 16:43:08');
INSERT INTO public.vehicle_images VALUES (403, 34, 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_03.jpeg', 'Volkswagen T-Cross 1.0 TSI Turbo AutomÃ¡tica 2021 - Foto 3', false, 3, '2026-11-11 16:43:08', '2026-11-11 16:43:08');
INSERT INTO public.vehicle_images VALUES (404, 34, 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_04.jpeg', 'Volkswagen T-Cross 1.0 TSI Turbo AutomÃ¡tica 2021 - Foto 4', false, 4, '2026-11-11 16:43:08', '2026-11-11 16:43:08');
INSERT INTO public.vehicle_images VALUES (405, 34, 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_05.jpeg', 'Volkswagen T-Cross 1.0 TSI Turbo AutomÃ¡tica 2021 - Foto 5', false, 5, '2026-11-11 16:43:08', '2026-11-11 16:43:08');
INSERT INTO public.vehicle_images VALUES (406, 34, 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_06.jpeg', 'Volkswagen T-Cross 1.0 TSI Turbo AutomÃ¡tica 2021 - Foto 6', false, 6, '2026-11-11 16:43:08', '2026-11-11 16:43:08');
INSERT INTO public.vehicle_images VALUES (407, 34, 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_07.jpeg', 'Volkswagen T-Cross 1.0 TSI Turbo AutomÃ¡tica 2021 - Foto 7', false, 7, '2026-11-11 16:43:08', '2026-11-11 16:43:08');
INSERT INTO public.vehicle_images VALUES (408, 34, 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_08.jpeg', 'Volkswagen T-Cross 1.0 TSI Turbo AutomÃ¡tica 2021 - Foto 8', false, 8, '2026-11-11 16:43:08', '2026-11-11 16:43:08');
INSERT INTO public.vehicle_images VALUES (409, 34, 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_09.jpeg', 'Volkswagen T-Cross 1.0 TSI Turbo AutomÃ¡tica 2021 - Foto 9', false, 9, '2026-11-11 16:43:10', '2026-11-11 16:43:10');
INSERT INTO public.vehicle_images VALUES (410, 34, 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_10.jpeg', 'Volkswagen T-Cross 1.0 TSI Turbo AutomÃ¡tica 2021 - Foto 10', false, 10, '2026-11-11 16:43:12', '2026-11-11 16:43:12');
INSERT INTO public.vehicle_images VALUES (411, 34, 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_11.jpeg', 'Volkswagen T-Cross 1.0 TSI Turbo AutomÃ¡tica 2021 - Foto 11', false, 11, '2026-11-11 16:43:13', '2026-11-11 16:43:13');
INSERT INTO public.vehicle_images VALUES (412, 34, 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_12.jpeg', 'Volkswagen T-Cross 1.0 TSI Turbo AutomÃ¡tica 2021 - Foto 12', false, 12, '2026-11-11 16:43:15', '2026-11-11 16:43:15');
INSERT INTO public.vehicle_images VALUES (413, 34, 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_13.jpeg', 'Volkswagen T-Cross 1.0 TSI Turbo AutomÃ¡tica 2021 - Foto 13', false, 13, '2026-11-11 16:43:17', '2026-11-11 16:43:17');
INSERT INTO public.vehicle_images VALUES (414, 34, 'vehicles/usados/volkswagen-t-cross-2021-tsi-aut/foto_14.jpeg', 'Volkswagen T-Cross 1.0 TSI Turbo AutomÃ¡tica 2021 - Foto 14', false, 14, '2026-11-11 16:43:18', '2026-11-11 16:43:18');
INSERT INTO public.vehicle_images VALUES (415, 35, 'vehicles/usados/toyota-etios-2017-aut/foto_01.jpeg', 'Toyota Etios 1.5 Nafta AutomÃ¡tica 2017 - Foto 1', true, 1, '2026-11-11 16:43:18', '2026-11-11 16:43:18');
INSERT INTO public.vehicle_images VALUES (416, 35, 'vehicles/usados/toyota-etios-2017-aut/foto_02.jpeg', 'Toyota Etios 1.5 Nafta AutomÃ¡tica 2017 - Foto 2', false, 2, '2026-11-11 16:43:18', '2026-11-11 16:43:18');
INSERT INTO public.vehicle_images VALUES (417, 35, 'vehicles/usados/toyota-etios-2017-aut/foto_03.jpeg', 'Toyota Etios 1.5 Nafta AutomÃ¡tica 2017 - Foto 3', false, 3, '2026-11-11 16:43:18', '2026-11-11 16:43:18');
INSERT INTO public.vehicle_images VALUES (418, 35, 'vehicles/usados/toyota-etios-2017-aut/foto_04.jpeg', 'Toyota Etios 1.5 Nafta AutomÃ¡tica 2017 - Foto 4', false, 4, '2026-11-11 16:43:18', '2026-11-11 16:43:18');
INSERT INTO public.vehicle_images VALUES (419, 35, 'vehicles/usados/toyota-etios-2017-aut/foto_05.jpeg', 'Toyota Etios 1.5 Nafta AutomÃ¡tica 2017 - Foto 5', false, 5, '2026-11-11 16:43:18', '2026-11-11 16:43:18');
INSERT INTO public.vehicle_images VALUES (420, 35, 'vehicles/usados/toyota-etios-2017-aut/foto_06.jpeg', 'Toyota Etios 1.5 Nafta AutomÃ¡tica 2017 - Foto 6', false, 6, '2026-11-11 16:43:18', '2026-11-11 16:43:18');
INSERT INTO public.vehicle_images VALUES (421, 35, 'vehicles/usados/toyota-etios-2017-aut/foto_07.jpeg', 'Toyota Etios 1.5 Nafta AutomÃ¡tica 2017 - Foto 7', false, 7, '2026-11-11 16:43:18', '2026-11-11 16:43:18');
INSERT INTO public.vehicle_images VALUES (422, 35, 'vehicles/usados/toyota-etios-2017-aut/foto_08.jpeg', 'Toyota Etios 1.5 Nafta AutomÃ¡tica 2017 - Foto 8', false, 8, '2026-11-11 16:43:18', '2026-11-11 16:43:18');
INSERT INTO public.vehicle_images VALUES (423, 35, 'vehicles/usados/toyota-etios-2017-aut/foto_09.jpeg', 'Toyota Etios 1.5 Nafta AutomÃ¡tica 2017 - Foto 9', false, 9, '2026-11-11 16:43:19', '2026-11-11 16:43:19');
INSERT INTO public.vehicle_images VALUES (424, 35, 'vehicles/usados/toyota-etios-2017-aut/foto_10.jpeg', 'Toyota Etios 1.5 Nafta AutomÃ¡tica 2017 - Foto 10', false, 10, '2026-11-11 16:43:21', '2026-11-11 16:43:21');
INSERT INTO public.vehicle_images VALUES (425, 35, 'vehicles/usados/toyota-etios-2017-aut/foto_11.jpeg', 'Toyota Etios 1.5 Nafta AutomÃ¡tica 2017 - Foto 11', false, 11, '2026-11-11 16:43:22', '2026-11-11 16:43:22');
INSERT INTO public.vehicle_images VALUES (426, 35, 'vehicles/usados/toyota-etios-2017-aut/foto_12.jpeg', 'Toyota Etios 1.5 Nafta AutomÃ¡tica 2017 - Foto 12', false, 12, '2026-11-11 16:43:24', '2026-11-11 16:43:24');
INSERT INTO public.vehicle_images VALUES (427, 35, 'vehicles/usados/toyota-etios-2017-aut/foto_13.jpeg', 'Toyota Etios 1.5 Nafta AutomÃ¡tica 2017 - Foto 13', false, 13, '2026-11-11 16:43:26', '2026-11-11 16:43:26');
INSERT INTO public.vehicle_images VALUES (428, 35, 'vehicles/usados/toyota-etios-2017-aut/foto_14.jpeg', 'Toyota Etios 1.5 Nafta AutomÃ¡tica 2017 - Foto 14', false, 14, '2026-11-11 16:43:27', '2026-11-11 16:43:27');
INSERT INTO public.vehicle_images VALUES (429, 36, 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_01.jpeg', 'Toyota Allion 2.0 Nafta AutomÃ¡tica 2008 - Foto 1', true, 1, '2026-11-11 16:43:27', '2026-11-11 16:43:27');
INSERT INTO public.vehicle_images VALUES (430, 36, 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_02.jpeg', 'Toyota Allion 2.0 Nafta AutomÃ¡tica 2008 - Foto 2', false, 2, '2026-11-11 16:43:27', '2026-11-11 16:43:27');
INSERT INTO public.vehicle_images VALUES (431, 36, 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_03.jpeg', 'Toyota Allion 2.0 Nafta AutomÃ¡tica 2008 - Foto 3', false, 3, '2026-11-11 16:43:27', '2026-11-11 16:43:27');
INSERT INTO public.vehicle_images VALUES (432, 36, 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_04.jpeg', 'Toyota Allion 2.0 Nafta AutomÃ¡tica 2008 - Foto 4', false, 4, '2026-11-11 16:43:27', '2026-11-11 16:43:27');
INSERT INTO public.vehicle_images VALUES (433, 36, 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_05.jpeg', 'Toyota Allion 2.0 Nafta AutomÃ¡tica 2008 - Foto 5', false, 5, '2026-11-11 16:43:27', '2026-11-11 16:43:27');
INSERT INTO public.vehicle_images VALUES (434, 36, 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_06.jpeg', 'Toyota Allion 2.0 Nafta AutomÃ¡tica 2008 - Foto 6', false, 6, '2026-11-11 16:43:27', '2026-11-11 16:43:27');
INSERT INTO public.vehicle_images VALUES (435, 36, 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_07.jpeg', 'Toyota Allion 2.0 Nafta AutomÃ¡tica 2008 - Foto 7', false, 7, '2026-11-11 16:43:27', '2026-11-11 16:43:27');
INSERT INTO public.vehicle_images VALUES (436, 36, 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_08.jpeg', 'Toyota Allion 2.0 Nafta AutomÃ¡tica 2008 - Foto 8', false, 8, '2026-11-11 16:43:28', '2026-11-11 16:43:28');
INSERT INTO public.vehicle_images VALUES (437, 36, 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_09.jpeg', 'Toyota Allion 2.0 Nafta AutomÃ¡tica 2008 - Foto 9', false, 9, '2026-11-11 16:43:30', '2026-11-11 16:43:30');
INSERT INTO public.vehicle_images VALUES (438, 36, 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_10.jpeg', 'Toyota Allion 2.0 Nafta AutomÃ¡tica 2008 - Foto 10', false, 10, '2026-11-11 16:43:31', '2026-11-11 16:43:31');
INSERT INTO public.vehicle_images VALUES (439, 36, 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_11.jpeg', 'Toyota Allion 2.0 Nafta AutomÃ¡tica 2008 - Foto 11', false, 11, '2026-11-11 16:43:34', '2026-11-11 16:43:34');
INSERT INTO public.vehicle_images VALUES (440, 36, 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_12.jpeg', 'Toyota Allion 2.0 Nafta AutomÃ¡tica 2008 - Foto 12', false, 12, '2026-11-11 16:43:35', '2026-11-11 16:43:35');
INSERT INTO public.vehicle_images VALUES (441, 36, 'vehicles/usados/toyota-allion-2008-sedan-aut/foto_13.jpeg', 'Toyota Allion 2.0 Nafta AutomÃ¡tica 2008 - Foto 13', false, 13, '2026-11-11 16:43:36', '2026-11-11 16:43:36');
INSERT INTO public.vehicle_images VALUES (442, 37, 'vehicles/usados/hyundai-tucson-2016-aut/foto_01.jpeg', 'Hyundai Tucson 2.0 Nafta AutomÃ¡tica 4x2 2016 - Foto 1', true, 1, '2026-11-11 16:43:36', '2026-11-11 16:43:36');
INSERT INTO public.vehicle_images VALUES (443, 37, 'vehicles/usados/hyundai-tucson-2016-aut/foto_02.jpeg', 'Hyundai Tucson 2.0 Nafta AutomÃ¡tica 4x2 2016 - Foto 2', false, 2, '2026-11-11 16:43:36', '2026-11-11 16:43:36');
INSERT INTO public.vehicle_images VALUES (444, 37, 'vehicles/usados/hyundai-tucson-2016-aut/foto_03.jpeg', 'Hyundai Tucson 2.0 Nafta AutomÃ¡tica 4x2 2016 - Foto 3', false, 3, '2026-11-11 16:43:36', '2026-11-11 16:43:36');
INSERT INTO public.vehicle_images VALUES (445, 37, 'vehicles/usados/hyundai-tucson-2016-aut/foto_04.jpeg', 'Hyundai Tucson 2.0 Nafta AutomÃ¡tica 4x2 2016 - Foto 4', false, 4, '2026-11-11 16:43:36', '2026-11-11 16:43:36');
INSERT INTO public.vehicle_images VALUES (446, 37, 'vehicles/usados/hyundai-tucson-2016-aut/foto_05.jpeg', 'Hyundai Tucson 2.0 Nafta AutomÃ¡tica 4x2 2016 - Foto 5', false, 5, '2026-11-11 16:43:36', '2026-11-11 16:43:36');
INSERT INTO public.vehicle_images VALUES (447, 37, 'vehicles/usados/hyundai-tucson-2016-aut/foto_06.jpeg', 'Hyundai Tucson 2.0 Nafta AutomÃ¡tica 4x2 2016 - Foto 6', false, 6, '2026-11-11 16:43:36', '2026-11-11 16:43:36');
INSERT INTO public.vehicle_images VALUES (448, 37, 'vehicles/usados/hyundai-tucson-2016-aut/foto_07.jpeg', 'Hyundai Tucson 2.0 Nafta AutomÃ¡tica 4x2 2016 - Foto 7', false, 7, '2026-11-11 16:43:36', '2026-11-11 16:43:36');
INSERT INTO public.vehicle_images VALUES (449, 37, 'vehicles/usados/hyundai-tucson-2016-aut/foto_08.jpeg', 'Hyundai Tucson 2.0 Nafta AutomÃ¡tica 4x2 2016 - Foto 8', false, 8, '2026-11-11 16:43:36', '2026-11-11 16:43:36');
INSERT INTO public.vehicle_images VALUES (450, 37, 'vehicles/usados/hyundai-tucson-2016-aut/foto_09.jpeg', 'Hyundai Tucson 2.0 Nafta AutomÃ¡tica 4x2 2016 - Foto 9', false, 9, '2026-11-11 16:43:38', '2026-11-11 16:43:38');
INSERT INTO public.vehicle_images VALUES (451, 37, 'vehicles/usados/hyundai-tucson-2016-aut/foto_10.jpeg', 'Hyundai Tucson 2.0 Nafta AutomÃ¡tica 4x2 2016 - Foto 10', false, 10, '2026-11-11 16:43:40', '2026-11-11 16:43:40');
INSERT INTO public.vehicle_images VALUES (452, 37, 'vehicles/usados/hyundai-tucson-2016-aut/foto_11.jpeg', 'Hyundai Tucson 2.0 Nafta AutomÃ¡tica 4x2 2016 - Foto 11', false, 11, '2026-11-11 16:43:41', '2026-11-11 16:43:41');
INSERT INTO public.vehicle_images VALUES (453, 37, 'vehicles/usados/hyundai-tucson-2016-aut/foto_12.jpeg', 'Hyundai Tucson 2.0 Nafta AutomÃ¡tica 4x2 2016 - Foto 12', false, 12, '2026-11-11 16:43:43', '2026-11-11 16:43:43');
INSERT INTO public.vehicle_images VALUES (454, 37, 'vehicles/usados/hyundai-tucson-2016-aut/foto_13.jpeg', 'Hyundai Tucson 2.0 Nafta AutomÃ¡tica 4x2 2016 - Foto 13', false, 13, '2026-11-11 16:43:45', '2026-11-11 16:43:45');
INSERT INTO public.vehicle_images VALUES (455, 37, 'vehicles/usados/hyundai-tucson-2016-aut/foto_14.jpeg', 'Hyundai Tucson 2.0 Nafta AutomÃ¡tica 4x2 2016 - Foto 14', false, 14, '2026-11-11 16:43:46', '2026-11-11 16:43:46');
INSERT INTO public.vehicle_images VALUES (456, 38, 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_01.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 1', true, 1, '2026-11-11 16:43:46', '2026-11-11 16:43:46');
INSERT INTO public.vehicle_images VALUES (457, 38, 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_02.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 2', false, 2, '2026-11-11 16:43:46', '2026-11-11 16:43:46');
INSERT INTO public.vehicle_images VALUES (458, 38, 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_03.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 3', false, 3, '2026-11-11 16:43:46', '2026-11-11 16:43:46');
INSERT INTO public.vehicle_images VALUES (459, 38, 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_04.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 4', false, 4, '2026-11-11 16:43:46', '2026-11-11 16:43:46');
INSERT INTO public.vehicle_images VALUES (460, 38, 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_05.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 5', false, 5, '2026-11-11 16:43:46', '2026-11-11 16:43:46');
INSERT INTO public.vehicle_images VALUES (461, 38, 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_06.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 6', false, 6, '2026-11-11 16:43:46', '2026-11-11 16:43:46');
INSERT INTO public.vehicle_images VALUES (462, 38, 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_07.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 7', false, 7, '2026-11-11 16:43:46', '2026-11-11 16:43:46');
INSERT INTO public.vehicle_images VALUES (463, 38, 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_08.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 8', false, 8, '2026-11-11 16:43:46', '2026-11-11 16:43:46');
INSERT INTO public.vehicle_images VALUES (464, 38, 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_09.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 9', false, 9, '2026-11-11 16:43:46', '2026-11-11 16:43:46');
INSERT INTO public.vehicle_images VALUES (465, 38, 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_10.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 10', false, 10, '2026-11-11 16:43:48', '2026-11-11 16:43:48');
INSERT INTO public.vehicle_images VALUES (466, 38, 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_11.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 11', false, 11, '2026-11-11 16:43:49', '2026-11-11 16:43:49');
INSERT INTO public.vehicle_images VALUES (467, 38, 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_12.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 12', false, 12, '2026-11-11 16:43:51', '2026-11-11 16:43:51');
INSERT INTO public.vehicle_images VALUES (468, 38, 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_13.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 13', false, 13, '2026-11-11 16:43:52', '2026-11-11 16:43:52');
INSERT INTO public.vehicle_images VALUES (469, 38, 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_14.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 14', false, 14, '2026-11-11 16:43:54', '2026-11-11 16:43:54');
INSERT INTO public.vehicle_images VALUES (470, 38, 'vehicles/usados/toyota-fortuner-2018-bordo-4x4-aut/foto_15.jpeg', 'Toyota Fortuner 2.8 Turbo Diesel AutomÃ¡tica 4x4 2018 - Foto 15', false, 15, '2026-11-11 16:43:55', '2026-11-11 16:43:55');
INSERT INTO public.vehicle_images VALUES (471, 39, 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_01.jpeg', 'Toyota Corona Premio 1.8 Nafta AutomÃ¡tica 2011 - Foto 1', true, 1, '2026-11-11 16:43:55', '2026-11-11 16:43:55');
INSERT INTO public.vehicle_images VALUES (472, 39, 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_02.jpeg', 'Toyota Corona Premio 1.8 Nafta AutomÃ¡tica 2011 - Foto 2', false, 2, '2026-11-11 16:43:55', '2026-11-11 16:43:55');
INSERT INTO public.vehicle_images VALUES (473, 39, 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_03.jpeg', 'Toyota Corona Premio 1.8 Nafta AutomÃ¡tica 2011 - Foto 3', false, 3, '2026-11-11 16:43:55', '2026-11-11 16:43:55');
INSERT INTO public.vehicle_images VALUES (474, 39, 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_04.jpeg', 'Toyota Corona Premio 1.8 Nafta AutomÃ¡tica 2011 - Foto 4', false, 4, '2026-11-11 16:43:55', '2026-11-11 16:43:55');
INSERT INTO public.vehicle_images VALUES (475, 39, 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_05.jpeg', 'Toyota Corona Premio 1.8 Nafta AutomÃ¡tica 2011 - Foto 5', false, 5, '2026-11-11 16:43:55', '2026-11-11 16:43:55');
INSERT INTO public.vehicle_images VALUES (476, 39, 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_06.jpeg', 'Toyota Corona Premio 1.8 Nafta AutomÃ¡tica 2011 - Foto 6', false, 6, '2026-11-11 16:43:55', '2026-11-11 16:43:55');
INSERT INTO public.vehicle_images VALUES (477, 39, 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_07.jpeg', 'Toyota Corona Premio 1.8 Nafta AutomÃ¡tica 2011 - Foto 7', false, 7, '2026-11-11 16:43:57', '2026-11-11 16:43:57');
INSERT INTO public.vehicle_images VALUES (478, 39, 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_08.jpeg', 'Toyota Corona Premio 1.8 Nafta AutomÃ¡tica 2011 - Foto 8', false, 8, '2026-11-11 16:43:58', '2026-11-11 16:43:58');
INSERT INTO public.vehicle_images VALUES (479, 39, 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_09.jpeg', 'Toyota Corona Premio 1.8 Nafta AutomÃ¡tica 2011 - Foto 9', false, 9, '2026-11-11 16:44:00', '2026-11-11 16:44:00');
INSERT INTO public.vehicle_images VALUES (480, 39, 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_10.jpeg', 'Toyota Corona Premio 1.8 Nafta AutomÃ¡tica 2011 - Foto 10', false, 10, '2026-11-11 16:44:02', '2026-11-11 16:44:02');
INSERT INTO public.vehicle_images VALUES (481, 39, 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_11.jpeg', 'Toyota Corona Premio 1.8 Nafta AutomÃ¡tica 2011 - Foto 11', false, 11, '2026-11-11 16:44:03', '2026-11-11 16:44:03');
INSERT INTO public.vehicle_images VALUES (482, 39, 'vehicles/usados/toyota-corona-premio-2011-bordo-aut/foto_12.jpeg', 'Toyota Corona Premio 1.8 Nafta AutomÃ¡tica 2011 - Foto 12', false, 12, '2026-11-11 16:44:04', '2026-11-11 16:44:04');
INSERT INTO public.vehicle_images VALUES (483, 40, 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_01.jpeg', 'Toyota Auris 1.8 Nafta AutomÃ¡tica 2009 - Foto 1', true, 1, '2026-11-11 16:44:04', '2026-11-11 16:44:04');
INSERT INTO public.vehicle_images VALUES (484, 40, 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_02.jpeg', 'Toyota Auris 1.8 Nafta AutomÃ¡tica 2009 - Foto 2', false, 2, '2026-11-11 16:44:04', '2026-11-11 16:44:04');
INSERT INTO public.vehicle_images VALUES (485, 40, 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_03.jpeg', 'Toyota Auris 1.8 Nafta AutomÃ¡tica 2009 - Foto 3', false, 3, '2026-11-11 16:44:04', '2026-11-11 16:44:04');
INSERT INTO public.vehicle_images VALUES (486, 40, 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_04.jpeg', 'Toyota Auris 1.8 Nafta AutomÃ¡tica 2009 - Foto 4', false, 4, '2026-11-11 16:44:04', '2026-11-11 16:44:04');
INSERT INTO public.vehicle_images VALUES (487, 40, 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_05.jpeg', 'Toyota Auris 1.8 Nafta AutomÃ¡tica 2009 - Foto 5', false, 5, '2026-11-11 16:44:04', '2026-11-11 16:44:04');
INSERT INTO public.vehicle_images VALUES (488, 40, 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_06.jpeg', 'Toyota Auris 1.8 Nafta AutomÃ¡tica 2009 - Foto 6', false, 6, '2026-11-11 16:44:04', '2026-11-11 16:44:04');
INSERT INTO public.vehicle_images VALUES (489, 40, 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_07.jpeg', 'Toyota Auris 1.8 Nafta AutomÃ¡tica 2009 - Foto 7', false, 7, '2026-11-11 16:44:04', '2026-11-11 16:44:04');
INSERT INTO public.vehicle_images VALUES (490, 40, 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_08.jpeg', 'Toyota Auris 1.8 Nafta AutomÃ¡tica 2009 - Foto 8', false, 8, '2026-11-11 16:44:04', '2026-11-11 16:44:04');
INSERT INTO public.vehicle_images VALUES (491, 40, 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_09.jpeg', 'Toyota Auris 1.8 Nafta AutomÃ¡tica 2009 - Foto 9', false, 9, '2026-11-11 16:44:04', '2026-11-11 16:44:04');
INSERT INTO public.vehicle_images VALUES (492, 40, 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_10.jpeg', 'Toyota Auris 1.8 Nafta AutomÃ¡tica 2009 - Foto 10', false, 10, '2026-11-11 16:44:06', '2026-11-11 16:44:06');
INSERT INTO public.vehicle_images VALUES (493, 40, 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_11.jpeg', 'Toyota Auris 1.8 Nafta AutomÃ¡tica 2009 - Foto 11', false, 11, '2026-11-11 16:44:07', '2026-11-11 16:44:07');
INSERT INTO public.vehicle_images VALUES (494, 40, 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_12.jpeg', 'Toyota Auris 1.8 Nafta AutomÃ¡tica 2009 - Foto 12', false, 12, '2026-11-11 16:44:09', '2026-11-11 16:44:09');
INSERT INTO public.vehicle_images VALUES (495, 40, 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_13.jpeg', 'Toyota Auris 1.8 Nafta AutomÃ¡tica 2009 - Foto 13', false, 13, '2026-11-11 16:44:11', '2026-11-11 16:44:11');
INSERT INTO public.vehicle_images VALUES (496, 40, 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_14.jpeg', 'Toyota Auris 1.8 Nafta AutomÃ¡tica 2009 - Foto 14', false, 14, '2026-11-11 16:44:13', '2026-11-11 16:44:13');
INSERT INTO public.vehicle_images VALUES (497, 40, 'vehicles/usados/toyota-auris-2009-blanco-aut/foto_15.jpeg', 'Toyota Auris 1.8 Nafta AutomÃ¡tica 2009 - Foto 15', false, 15, '2026-11-11 16:44:14', '2026-11-11 16:44:14');


--
-- Data for Name: vehicles; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.vehicles VALUES (11, '8b710554-e813-48cc-9937-39d1989e56fc', '0km', 1, 1, 1, 'Agya', '1.0 MT / AT', 'toyota-agya-2025', 2025, 14900.00, 116965000, true, NULL, 0, 'Nafta', 'AutomÃ¡tica / Manual', '4x2 Delantera', '1.0L 3 Cilindros Dual VVT-i', 5, NULL, NULL, NULL, 'Tu auto, tu estilo', 'Tu primer 0 Km Toyota. Confort, conectividad y economÃ­a sobresaliente para tu dÃ­a a dÃ­a en la ciudad.', NULL, NULL, false, true, false, 'disponible', 3, '2026-10-27 20:46:54', '2026-10-31 18:56:13', '2026-10-31 18:56:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (9, '6160a366-69e9-43f7-80ad-b78170e63440', '0km', 1, 1, 1, 'Yaris Hatchback', '1.5 XLS CVT', 'toyota-yaris-hatchback-2025', 2025, 21900.00, 171915000, true, NULL, 0, 'Nafta', 'CVT de 7 marchas', '4x2 Delantera', '1.5L Dual VVT-i 107 HP', 5, NULL, NULL, NULL, 'Divertido, Ã¡gil y con mÃ¡xima seguridad', 'El Toyota Yaris Hatchback combina diseÃ±o moderno, confort superior y el mejor equipamiento de seguridad activa y pasiva.', NULL, NULL, false, true, false, 'disponible', 1, '2026-10-27 20:46:54', '2026-10-31 18:58:34', '2026-10-31 18:58:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (5, 'd4faf6bc-a8be-46fa-82e1-cc3dbdc8034f', 'usado', 1, 2, 1, 'RAV4', 'HIBRID Aut.', 'toyota-rav4-hibrid-aut-2021-usado', 2021, 38500.00, 302225000, true, 'Entrega 20% y saldo en 36 cuotas fijas', 45000, 'HÃ­brido', 'AutomÃ¡tica e-CVT', '4x2 Delantera', '2.5L VVT-i + Sistema HÃ­brido ElÃ©ctrico', 5, 'Gris Plata Metalizado', 'Cuero Negro', NULL, 'Inspeccionado y certificado por Consur S.A.', 'Unidad en estado inmaculado, Ãºnico dueÃ±o, ficha tÃ©cnica 100% en taller oficial Consur. Incluye certificado de baterÃ­a hÃ­brida con garantÃ­a vigente, cubiertas nuevas y polarizado premium.', '{"Color": "Gris Plata", "Placa": "Paraguaya (Transferencia directa)", "Puertas": "5 Puertas", "GarantÃ­a": "1 AÃ±o de GarantÃ­a Certificada Consur", "Combustible": "HÃ­brido (Nafta + ElÃ©ctrico autorrecargable)", "Kilometraje": "45.000 Km reales comprobables", "TransmisiÃ³n": "AutomÃ¡tica e-CVT con modo Sport/EV"}', '["Climatizador AutomÃ¡tico Bi-Zona con salidas traseras", "Pantalla TÃ¡ctil HD con Android Auto y Apple CarPlay", "CÃ¡mara de VisiÃ³n Trasera con GuÃ­as DinÃ¡micas", "Encendido por BotÃ³n (Smart Key / Start-Stop)", "Control de Velocidad Crucero Adaptativo", "7 Airbags y Control de Estabilidad (VSC)", "Llantas de AleaciÃ³n 18\" Originales Toyota"]', true, true, true, 'disponible', 1, '2026-10-05 02:20:26', '2026-11-11 16:44:42', '2026-11-11 16:44:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (6, '13ab7427-3371-49ea-b6f8-add157c88cf3', 'usado', 1, 3, 1, 'Hilux', 'D/C SRV 4x4 AutomÃ¡tica', 'toyota-hilux-srv-4x4-2022-usado', 2022, 46900.00, 368165000, true, NULL, 62000, 'Diesel', 'AutomÃ¡tica de 6 Velocidades', '4x4 con Alta y Baja', '2.8L Turbo Diesel 204 HP', 4, 'Blanco Puro', 'Cuero Negro', NULL, NULL, 'Hilux SRV equipada con barra antivuelco, carpa marÃ­tima, estribos de fÃ¡brica, protector de carrocerÃ­a y luces full LED. Mantenimiento al dÃ­a.', '{"Motor": "2.8L D-4D 204 HP", "Seguridad": "Toyota Safety Sense + 7 Airbags", "TracciÃ³n": "4x4 con bloqueo electrÃ³nico"}', '["Cuero", "Audio JBL", "Carpa MarÃ­tima", "Sensores Del/Tras", "CÃ¡mara Trasera"]', true, true, false, 'disponible', 2, '2026-10-05 02:20:26', '2026-11-11 16:44:42', '2026-11-11 16:44:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (7, '1a03db41-f456-4d78-90d8-89570cfe44e1', 'usado', 1, 1, 2, 'Corolla', 'GLI 2.0 AutomÃ¡tico', 'toyota-corolla-gli-2020-usado', 2020, 21500.00, 168775000, true, NULL, 58000, 'Nafta', 'AutomÃ¡tica Direct Shift CVT', '4x2', '2.0L Dynamic Force 170 HP', 4, 'Negro Mica', 'Gris', NULL, NULL, 'SedÃ¡n de referencia por durabilidad y confort. Equipado con llantas de aleaciÃ³n, control crucero y pantalla tÃ¡ctil.', '{"Motor": "2.0L 170 HP", "Airbags": "7", "Consumo": "6.2 L / 100 Km"}', '["CÃ¡mara de Reversa", "Bluetooth", "Pantalla Multimedia", "Volante MultifunciÃ³n"]', true, true, false, 'disponible', 3, '2026-10-05 02:20:26', '2026-11-11 16:44:42', '2026-11-11 16:44:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (8, '5373bb23-bdbb-4d37-a330-0032cbfa72ea', 'usado', 3, 2, 1, 'Renegade', 'Longitude 1.8 AT6', 'jeep-renegade-longitude-2021-usado', 2021, 19800.00, 155430000, true, NULL, 51000, 'Nafta / Flex', 'AutomÃ¡tica de 6 Marchas', '4x2', '1.8L 16V E-TorQ', 5, 'Rojo Colorado', NULL, NULL, NULL, 'SUV compacto con estilo aventurero Ãºnico, llantas de 18 pulgadas diamantadas, tapizado en cuero e instrumental digital.', '{"Motor": "1.8L 130 HP", "TransmisiÃ³n": "AutomÃ¡tica 6 Vel"}', '["Tapizado en Cuero", "Llantas 18\"", "Sensor de Lluvia y Luces", "Climatizador Bi-zona"]', false, true, false, 'disponible', 4, '2026-10-05 02:20:26', '2026-11-11 16:44:42', '2026-11-11 16:44:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (29, '5fa1f2bf-df46-4181-b9fb-9542318bbcf4', 'usado', 1, 2, 1, 'Fortuner', '2.8 Turbo Diesel AutomÃ¡tica 4x4', 'toyota-fortuner-2018-plata-4x4-aut', 2018, 41500.00, 325775000, true, 'Consulte planes de entrega y financiaciÃ³n propia', 96200, 'Diesel', 'AutomÃ¡tica', '4x4', '2.8', 5, 'Plata', 'Cuero / Tela de alta calidad', NULL, 'VehÃ­culo usado inspeccionado y garantizado por Consur S.A.', 'T. Fortuner Aut 2018 aÃ±o 2018 en excelente estado general y mecÃ¡nica certificada. Equipado con motor 2.8L Diesel, transmisiÃ³n AutomÃ¡tica y tracciÃ³n 4x4. Cuenta con Asientos ElÃ©ctricos, Bloqueo Central, DirecciÃ³n HidrÃ¡ulica, Frenos ABS. VehÃ­culo usado seleccionado e inspeccionado minuciosamente por el equipo tÃ©cnico de CONSUR S.A.', '{"AÃ±o": "2018", "Sede": "Casa Central - EncarnaciÃ³n", "Color": "Plata", "Marca": "Toyota", "Motor": "2.8", "Estado": "Excelente", "Volante": "Original", "TracciÃ³n": "4x4", "Combustible": "Diesel", "Kilometraje": "96.200 km", "TransmisiÃ³n": "AutomÃ¡tica", "Disponibilidad": "Inmediata", "Tipo de vehÃ­culo": "SUV"}', '["Asientos ElÃ©ctricos", "Bloqueo Central", "DirecciÃ³n HidrÃ¡ulica", "Frenos ABS", "Stereo", "Vidrios ElÃ©ctricos"]', true, true, false, 'disponible', 1, '2026-10-24 10:00:00', '2026-11-12 19:25:39', NULL, 865.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (20, 'd3deab34-c547-49d1-a32b-697c0e83ce5f', '0km', 1, 7, 1, 'Hiace FurgÃ³n', '2.8 TDI L2H2 Techo Alto', 'toyota-hiace-furgon-2025', 2025, 43500.00, 341475000, true, NULL, 0, 'Diesel', 'Manual / AutomÃ¡tica de 6 velocidades', '4x2 Trasera', '2.8L 1GD-FTV 177 HP', 5, NULL, NULL, NULL, 'El socio ideal para hacer crecer tu negocio', 'Gran volumen de carga Ãºtil de 9.3 mÂ³, durabilidad comprobada Toyota y bajo costo de mantenimiento.', NULL, NULL, false, true, false, 'disponible', 1, '2026-10-27 20:46:54', '2026-10-31 18:58:34', '2026-10-31 18:58:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (30, '185added-fd6e-4bc5-8173-bea11868644f', 'usado', 1, 2, 1, 'Fortuner', '2.8 Turbo Diesel AutomÃ¡tica 4x4', 'toyota-fortuner-2024-blanco-4x4-aut', 2024, 57500.00, 451375000, true, 'Consulte planes de entrega y financiaciÃ³n propia', 23500, 'Diesel', 'AutomÃ¡tica', '4x4', '2.8L Diesel', 5, 'Blanco', 'Cuero / Tela de alta calidad', NULL, 'VehÃ­culo usado inspeccionado y garantizado por Consur S.A.', 'T. Fortuner Aut 2024 aÃ±o 2024 en excelente estado general y mecÃ¡nica certificada. Equipado con motor 2.8L Diesel, transmisiÃ³n AutomÃ¡tica y tracciÃ³n 4x4. Cuenta con Asientos ElÃ©ctricos, Bloqueo Central, DirecciÃ³n HidrÃ¡ulica, Frenos ABS. VehÃ­culo usado seleccionado e inspeccionado minuciosamente por el equipo tÃ©cnico de Consur S.A.', '{"AÃ±o": 2024, "Color": "Blanco", "Motor": "2.8L Diesel", "Estado": "Excelente", "Volante": "Original", "GarantÃ­a": "InspecciÃ³n tÃ©cnica oficial Consur S.A.", "TracciÃ³n": "4x4", "UbicaciÃ³n": "Casa Matriz EncarnaciÃ³n", "Combustible": "Diesel", "Kilometraje": "23.500 Km", "TransmisiÃ³n": "AutomÃ¡tica"}', '["Asientos ElÃ©ctricos", "Bloqueo Central", "DirecciÃ³n HidrÃ¡ulica", "Frenos ABS", "Stereo", "Vidrios ElÃ©ctricos"]', true, true, false, 'disponible', 2, '2026-10-23 10:00:00', '2026-11-11 16:44:42', '2026-11-11 16:44:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (31, 'dd6caf5f-f714-4706-aa57-1a972559aac5', 'usado', 1, 2, 1, 'Fortuner', '2.8 Turbo Diesel AutomÃ¡tica 4x4', 'toyota-fortuner-2025-plata-4x4-aut', 2025, 60000.00, 471000000, true, 'Consulte planes de entrega y financiaciÃ³n propia', 27000, 'Diesel', 'AutomÃ¡tica', '4x4', '2.8L Diesel', 5, 'Plata', 'Cuero / Tela de alta calidad', NULL, 'VehÃ­culo usado inspeccionado y garantizado por Consur S.A.', 'T. Fortuner Aut 2025 aÃ±o 2025 en excelente estado general y mecÃ¡nica certificada. Equipado con motor 2.8L Diesel, transmisiÃ³n AutomÃ¡tica y tracciÃ³n 4x4. Cuenta con Asientos ElÃ©ctricos, Bloqueo Central, DirecciÃ³n HidrÃ¡ulica, Frenos ABS. VehÃ­culo usado seleccionado e inspeccionado minuciosamente por el equipo tÃ©cnico de Consur S.A.', '{"AÃ±o": 2025, "Color": "Plata", "Motor": "2.8L Diesel", "Estado": "Excelente", "Volante": "Original", "GarantÃ­a": "InspecciÃ³n tÃ©cnica oficial Consur S.A.", "TracciÃ³n": "4x4", "UbicaciÃ³n": "Casa Matriz EncarnaciÃ³n", "Combustible": "Diesel", "Kilometraje": "27.000 Km", "TransmisiÃ³n": "AutomÃ¡tica"}', '["Asientos ElÃ©ctricos", "Bloqueo Central", "DirecciÃ³n HidrÃ¡ulica", "Frenos ABS", "Stereo", "Vidrios ElÃ©ctricos"]', true, true, false, 'disponible', 3, '2026-10-21 10:00:00', '2026-11-11 16:44:42', '2026-11-11 16:44:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (33, '8d05cb70-d78c-4cf6-a5b8-d8e06d9a73a0', 'usado', 1, 2, 1, 'RAV4', '2.5 HV HÃ­brida AutomÃ¡tica 4x2', 'toyota-rav4-hv-2020-hibrida-aut', 2020, 30500.00, 239425000, true, 'Consulte planes de entrega y financiaciÃ³n propia', 160000, 'HÃ­brido', 'AutomÃ¡tica', '4x2', '2.5', 5, 'Blanco', 'Cuero / Tela de alta calidad', NULL, 'VehÃ­culo usado inspeccionado y garantizado por Consur S.A.', 'T. Rav4 HV 2020 aÃ±o 2020 en excelente estado general y mecÃ¡nica certificada. Equipado con motor 2.5L HÃ­brido, transmisiÃ³n AutomÃ¡tica y tracciÃ³n 4x2. Cuenta con Asientos ElÃ©ctricos, Bloqueo Central, DirecciÃ³n HidrÃ¡ulica, Frenos ABS. VehÃ­culo usado seleccionado e inspeccionado minuciosamente por el equipo tÃ©cnico de CONSUR S.A.', '{"AÃ±o": "2020", "Sede": "Casa Central - EncarnaciÃ³n", "Color": "Blanco", "Marca": "Toyota", "Motor": "2.5", "Estado": "Excelente", "Volante": "Original", "TracciÃ³n": "4x2", "Combustible": "HÃ­brido", "Kilometraje": "160.000 km", "TransmisiÃ³n": "AutomÃ¡tica", "Disponibilidad": "Inmediata", "Tipo de vehÃ­culo": "SUV"}', '["Asientos ElÃ©ctricos", "Bloqueo Central", "DirecciÃ³n HidrÃ¡ulica", "Frenos ABS", "Stereo", "Techo Corredizo", "Vidrios ElÃ©ctricos"]', true, false, true, 'disponible', 5, '2026-10-02 10:00:00', '2026-11-12 19:25:39', NULL, 635.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (28, 'cea66037-94d4-47f7-84e4-432b75abadaa', '0km', 1, 9, 1, 'Yaris Cross Hybrid', '1.5 e-CVT HÃ­brido', 'toyota-yaris-cross-hybrid-2025', 2025, 29900.00, 234715000, true, NULL, 0, 'HÃ­brido (Nafta + ElÃ©ctrico)', 'e-CVT AutomÃ¡tica', '4x2 Delantera', '1.5L HÃ­brido Autorrecargable 116 HP', 5, NULL, NULL, NULL, 'Tu SUV compacto con consumo rÃ©cord en ciudad', 'Hasta 80% del tiempo de conducciÃ³n urbana en modo 100% elÃ©ctrico con emisiÃ³n cero.', NULL, NULL, false, true, true, 'disponible', 4, '2026-10-27 20:46:54', '2026-10-31 18:58:34', '2026-10-31 18:58:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (34, 'a7b9dcf6-7dbf-4506-9c6a-60a9f98a81d3', 'usado', 6, 2, 1, 'T-Cross', '1.0 TSI Turbo AutomÃ¡tica', 'volkswagen-t-cross-2021-tsi-aut', 2021, 16000.00, 125600000, true, 'Consulte planes de entrega y financiaciÃ³n propia', 147000, 'Naftero', 'AutomÃ¡tica', '4x2', '1.0', 5, 'Gris', 'Cuero / Tela de alta calidad', NULL, 'VehÃ­culo usado inspeccionado y garantizado por Consur S.A.', 'Volkswagen T-Cross aÃ±o 2021 en excelente estado general y mecÃ¡nica certificada. Equipado con motor 1.0L Nafta, transmisiÃ³n AutomÃ¡tica y tracciÃ³n 4x2. Cuenta con Bloqueo Central, DirecciÃ³n HidrÃ¡ulica, Frenos ABS, Stereo. VehÃ­culo usado seleccionado e inspeccionado minuciosamente por el equipo tÃ©cnico de CONSUR S.A.', '{"AÃ±o": "2021", "Sede": "Casa Central - EncarnaciÃ³n", "Color": "Gris", "Marca": "Volkswagen", "Motor": "1.0", "Estado": "Excelente", "Volante": "Original", "TracciÃ³n": "4x2", "Combustible": "Naftero", "Kilometraje": "147.000 km", "TransmisiÃ³n": "AutomÃ¡tica", "Disponibilidad": "Inmediata", "Tipo de vehÃ­culo": "SUV"}', '["Bloqueo Central", "DirecciÃ³n HidrÃ¡ulica", "Frenos ABS", "Stereo", "Vidrios ElÃ©ctricos"]', true, false, false, 'disponible', 6, '2026-08-01 10:00:00', '2026-11-12 19:25:39', NULL, 333.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (35, 'b55e1ee2-020a-4294-b542-afe00e985bd8', 'usado', 1, 4, 1, 'Etios', '1.5 Nafta AutomÃ¡tica', 'toyota-etios-2017-aut', 2017, 12000.00, 94200000, true, 'Consulte planes de entrega y financiaciÃ³n propia', 231500, 'Naftero', 'AutomÃ¡tica', '4x2', '1.5', 5, 'Rojo', 'Cuero / Tela de alta calidad', NULL, 'VehÃ­culo usado inspeccionado y garantizado por Consur S.A.', 'T. Etios Aut aÃ±o 2017 en excelente estado general y mecÃ¡nica certificada. Equipado con motor 1.5L Nafta, transmisiÃ³n AutomÃ¡tica y tracciÃ³n 4x2. Cuenta con Bloqueo Central, DirecciÃ³n HidrÃ¡ulica, Frenos ABS, Stereo. VehÃ­culo usado seleccionado e inspeccionado minuciosamente por el equipo tÃ©cnico de CONSUR S.A.', '{"AÃ±o": "2017", "Sede": "Casa Central - EncarnaciÃ³n", "Color": "Rojo", "Marca": "Toyota", "Motor": "1.5", "Estado": "Excelente", "Volante": "Original", "TracciÃ³n": "4x2", "Combustible": "Naftero", "Kilometraje": "231.500 km", "TransmisiÃ³n": "AutomÃ¡tica", "Disponibilidad": "Inmediata", "Tipo de vehÃ­culo": "Hatchback"}', '["Bloqueo Central", "DirecciÃ³n HidrÃ¡ulica", "Frenos ABS", "Stereo", "Vidrios ElÃ©ctricos"]', true, false, false, 'disponible', 7, '2026-07-29 10:00:00', '2026-11-12 19:25:39', NULL, 250.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (36, '3f40e5cc-c404-4b67-8400-0c00be605682', 'usado', 1, 1, 1, 'Allion', '2.0 Nafta AutomÃ¡tica', 'toyota-allion-2008-sedan-aut', 2008, 8471.34, 66500000, true, 'Consulte planes de entrega y financiaciÃ³n propia', 88200, 'Naftero', 'AutomÃ¡tica', '4x2', '2.0', 4, 'Azul', 'Cuero / Tela de alta calidad', NULL, 'VehÃ­culo usado inspeccionado y garantizado por Consur S.A.', 'T. Allion aÃ±o 2008 en excelente estado general y mecÃ¡nica certificada. Equipado con motor 2.0L Nafta, transmisiÃ³n AutomÃ¡tica y tracciÃ³n 4x2. Cuenta con Bloqueo Central, DirecciÃ³n HidrÃ¡ulica, Frenos ABS, Stereo. VehÃ­culo usado seleccionado e inspeccionado minuciosamente por el equipo tÃ©cnico de CONSUR S.A.', '{"AÃ±o": "2008", "Sede": "Casa Central - EncarnaciÃ³n", "Color": "Azul", "Marca": "Toyota", "Motor": "2.0", "Estado": "Excelente", "Volante": "Original", "TracciÃ³n": "4x2", "Combustible": "Naftero", "Kilometraje": "88.200 km", "TransmisiÃ³n": "AutomÃ¡tica", "Disponibilidad": "Inmediata", "Tipo de vehÃ­culo": "SedÃ¡n"}', '["Bloqueo Central", "DirecciÃ³n HidrÃ¡ulica", "Frenos ABS", "Stereo", "Vidrios ElÃ©ctricos"]', true, false, false, 'disponible', 8, '2026-07-29 10:00:00', '2026-11-12 19:25:39', NULL, 176.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (37, '4aa96b7a-c4c5-44b5-9190-5dc35c93a3ee', 'usado', 5, 2, 1, 'Tucson', '2.0 Nafta AutomÃ¡tica 4x2', 'hyundai-tucson-2016-aut', 2016, 16500.00, 129525000, true, 'Consulte planes de entrega y financiaciÃ³n propia', 85000, 'Naftero', 'AutomÃ¡tica', '4x2', '2.0', 5, 'Negro', 'Cuero / Tela de alta calidad', NULL, 'VehÃ­culo usado inspeccionado y garantizado por Consur S.A.', 'Hyundai Tucson aÃ±o 2016 en excelente estado general y mecÃ¡nica certificada. Equipado con motor 2.0L Nafta, transmisiÃ³n AutomÃ¡tica y tracciÃ³n 4x2. Cuenta con Asientos ElÃ©ctricos, Bloqueo Central, DirecciÃ³n HidrÃ¡ulica, Frenos ABS. VehÃ­culo usado seleccionado e inspeccionado minuciosamente por el equipo tÃ©cnico de CONSUR S.A.', '{"AÃ±o": "2016", "Sede": "Casa Central - EncarnaciÃ³n", "Color": "Negro", "Marca": "Hyundai", "Motor": "2.0", "Estado": "Excelente", "Volante": "Original", "TracciÃ³n": "4x2", "Combustible": "Naftero", "Kilometraje": "85.000 km", "TransmisiÃ³n": "AutomÃ¡tica", "Disponibilidad": "Inmediata", "Tipo de vehÃ­culo": "SUV"}', '["Asientos ElÃ©ctricos", "Bloqueo Central", "DirecciÃ³n HidrÃ¡ulica", "Frenos ABS", "Stereo", "Vidrios ElÃ©ctricos"]', true, false, false, 'disponible', 9, '2026-07-29 10:00:00', '2026-11-12 19:25:39', NULL, 344.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (38, 'c3a4d803-d218-4f76-afb1-94b10a54e150', 'usado', 1, 2, 1, 'Fortuner', '2.8 Turbo Diesel AutomÃ¡tica 4x4', 'toyota-fortuner-2018-bordo-4x4-aut', 2018, 40000.00, 314000000, true, 'Consulte planes de entrega y financiaciÃ³n propia', 234200, 'Diesel', 'AutomÃ¡tica', '4x4', '2.8', 5, 'Bordo', 'Cuero / Tela de alta calidad', NULL, 'VehÃ­culo usado inspeccionado y garantizado por Consur S.A.', 'T. Fortuner Aut 2018 aÃ±o 2018 en excelente estado general y mecÃ¡nica certificada. Equipado con motor 2.8L Diesel, transmisiÃ³n AutomÃ¡tica y tracciÃ³n 4x4. Cuenta con Asientos ElÃ©ctricos, Bloqueo Central, DirecciÃ³n HidrÃ¡ulica, Frenos ABS. VehÃ­culo usado seleccionado e inspeccionado minuciosamente por el equipo tÃ©cnico de CONSUR S.A.', '{"AÃ±o": "2018", "Sede": "Casa Central - EncarnaciÃ³n", "Color": "Bordo", "Marca": "Toyota", "Motor": "2.8", "Estado": "Excelente", "Volante": "Original", "TracciÃ³n": "4x4", "Combustible": "Diesel", "Kilometraje": "234.200 km", "TransmisiÃ³n": "AutomÃ¡tica", "Disponibilidad": "Inmediata", "Tipo de vehÃ­culo": "SUV"}', '["Asientos ElÃ©ctricos", "Bloqueo Central", "DirecciÃ³n HidrÃ¡ulica", "Frenos ABS", "Stereo", "Vidrios ElÃ©ctricos"]', true, false, false, 'disponible', 10, '2026-05-08 10:00:00', '2026-11-12 19:25:39', NULL, 833.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (39, '52a629e2-d2ae-46a0-b419-6faeb974d4d2', 'usado', 1, 1, 1, 'Corona Premio', '1.8 Nafta AutomÃ¡tica', 'toyota-corona-premio-2011-bordo-aut', 2011, 9936.31, 78000000, true, 'Consulte planes de entrega y financiaciÃ³n propia', 72000, 'Naftero', 'AutomÃ¡tica', '4x2', '1.8', 4, 'Bordo', 'Cuero / Tela de alta calidad', NULL, 'VehÃ­culo usado inspeccionado y garantizado por Consur S.A.', 'T. Corona Premio Bordo aÃ±o 2011 en excelente estado general y mecÃ¡nica certificada. Equipado con motor 1.8L Nafta, transmisiÃ³n AutomÃ¡tica y tracciÃ³n 4x2. Cuenta con Bloqueo Central, DirecciÃ³n HidrÃ¡ulica, Frenos ABS, Stereo. VehÃ­culo usado seleccionado e inspeccionado minuciosamente por el equipo tÃ©cnico de CONSUR S.A.', '{"AÃ±o": "2011", "Sede": "Casa Central - EncarnaciÃ³n", "Color": "Bordo", "Marca": "Toyota", "Motor": "1.8", "Estado": "Excelente", "Volante": "VÃ­a chile", "TracciÃ³n": "4x2", "Combustible": "Naftero", "Kilometraje": "72.000 km", "TransmisiÃ³n": "AutomÃ¡tica", "Disponibilidad": "Inmediata", "Tipo de vehÃ­culo": "SedÃ¡n"}', '["Bloqueo Central", "DirecciÃ³n HidrÃ¡ulica", "Frenos ABS", "Stereo", "Vidrios ElÃ©ctricos"]', true, false, false, 'disponible', 11, '2026-05-06 10:00:00', '2026-11-12 19:25:39', NULL, 207.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (40, '15a0a39e-707c-445d-8a5d-a06d963aaf0f', 'usado', 1, 4, 1, 'Auris', '1.8 Nafta AutomÃ¡tica', 'toyota-auris-2009-blanco-aut', 2009, 8152.87, 64000000, true, 'Consulte planes de entrega y financiaciÃ³n propia', 97700, 'Naftero', 'AutomÃ¡tica', '4x2', '1.8', 5, 'Blanco', 'Cuero / Tela de alta calidad', NULL, 'VehÃ­culo usado inspeccionado y garantizado por Consur S.A.', 'T. Auris 2009 aÃ±o 2009 en excelente estado general y mecÃ¡nica certificada. Equipado con motor 1.8L Nafta, transmisiÃ³n AutomÃ¡tica y tracciÃ³n 4x2. Cuenta con Bloqueo Central, DirecciÃ³n HidrÃ¡ulica, Frenos ABS, Stereo. VehÃ­culo usado seleccionado e inspeccionado minuciosamente por el equipo tÃ©cnico de CONSUR S.A.', '{"AÃ±o": "2009", "Sede": "Casa Central - EncarnaciÃ³n", "Color": "Blanco", "Marca": "Toyota", "Motor": "1.8", "Estado": "Excelente", "Volante": "VÃ­a chile", "TracciÃ³n": "4x2", "Combustible": "Naftero", "Kilometraje": "97.700 km", "TransmisiÃ³n": "AutomÃ¡tica", "Disponibilidad": "Inmediata", "Tipo de vehÃ­culo": "Hatchback"}', '["Bloqueo Central", "DirecciÃ³n HidrÃ¡ulica", "Frenos ABS", "Stereo", "Vidrios ElÃ©ctricos"]', true, false, false, 'disponible', 12, '2026-05-06 10:00:00', '2026-11-12 19:25:39', NULL, 170.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (10, 'b51e7f45-2ac5-423c-984f-53696d714d28', '0km', 1, 1, 1, 'Corolla', '2.0 XEi Direct Shift CVT', 'toyota-corolla-2025', 2025, 28500.00, 223725000, true, NULL, 0, 'Nafta', 'Direct Shift CVT (10 vel)', '4x2 Delantera', '2.0L Dynamic Force 171 HP', 4, NULL, NULL, NULL, 'El sedÃ¡n mÃ¡s vendido del mundo', 'Elegancia, confiabilidad legendaria, tecnologÃ­a Toyota Safety Sense y una experiencia de conducciÃ³n inigualable.', NULL, NULL, false, true, false, 'disponible', 2, '2026-10-27 20:46:54', '2026-10-31 18:58:34', '2026-10-31 18:58:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (13, 'bed6ca95-88fb-45b8-9fbc-25f3dcde7e65', '0km', 1, 6, 1, 'Hilux Cabina Simple', 'DX 4x4 2.8 TDI Manual', 'toyota-hilux-cabina-simple-2025', 2025, 38900.00, 305365000, true, NULL, 0, 'Diesel', 'Manual de 6 velocidades', '4x4 con reductora', '2.8L Turbo Diesel 204 HP', 2, NULL, NULL, NULL, 'MÃ¡xima capacidad para el trabajo pesado', 'Chasis reforzado, gran caja de carga y la robustez que el campo y la industria exigen.', NULL, NULL, false, true, false, 'disponible', 2, '2026-10-27 20:46:54', '2026-10-31 18:58:34', '2026-10-31 18:58:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (14, 'fb7d3b83-9f59-41f1-bb1d-1694fba6d734', '0km', 1, 6, 1, 'Hilux GR-Sport', 'GR-S 4x4 2.8 TDI 224 HP', 'toyota-hilux-gr-sport-2025', 2025, 69900.00, 548715000, true, NULL, 0, 'Diesel', 'AutomÃ¡tica de 6 marchas con levas', '4x4 deportiva', '2.8L GR-Tuned 224 HP / 550 Nm', 4, NULL, NULL, NULL, 'ADN Gazoo Racing sobre cualquier terreno', 'Trochas ensanchadas, amortiguadores monotubo Fox, diseÃ±o exclusivo y potencia incrementada.', NULL, NULL, false, true, false, 'disponible', 3, '2026-10-27 20:46:54', '2026-10-31 18:58:34', '2026-10-31 18:58:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (15, '0b70c196-8b57-488e-91ac-ae72715936f6', '0km', 1, 2, 1, 'Corolla Cross', 'XRE 2.0 Direct Shift CVT', 'toyota-corolla-cross-2025', 2025, 33900.00, 266115000, true, NULL, 0, 'Nafta', 'CVT de 10 marchas simuladas', '4x2 Delantera', '2.0L Dynamic Force 170 HP', 5, NULL, NULL, NULL, 'El SUV familiar definitivo', 'Gran habitabilidad, baÃºl espacioso, techo solar y la seguridad integral de la plataforma TNGA.', NULL, NULL, false, true, false, 'disponible', 1, '2026-10-27 20:46:54', '2026-10-31 18:58:34', '2026-10-31 18:58:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (16, 'ab73b0ff-e1ce-4ae7-b5c9-2a5a2eced41d', '0km', 1, 2, 1, 'Fortuner / SW4', 'SRX 4x4 2.8 TDI 7 Asientos', 'toyota-fortuner-sw4-2025', 2025, 74500.00, 584825000, true, NULL, 0, 'Diesel', 'AutomÃ¡tica de 6 velocidades', '4x4 Integral con Reductora', '2.8L Turbo Diesel 204 HP', 5, NULL, NULL, NULL, 'Lujo, confort y capacidad todoterreno para 7 pasajeros', 'La combinaciÃ³n perfecta entre la robustez del chasis Hilux y el refinamiento de un SUV de alta gama.', NULL, NULL, false, true, false, 'disponible', 2, '2026-10-27 20:46:54', '2026-10-31 18:58:34', '2026-10-31 18:58:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (17, '838b06c0-88f2-4a34-ac09-a04936a4562a', '0km', 1, 2, 1, 'Yaris Cross', '1.5 XLS CVT', 'toyota-yaris-cross-2025', 2025, 26900.00, 211165000, true, NULL, 0, 'Nafta', 'AutomÃ¡tica CVT', '4x2 Delantera', '1.5L Dual VVT-i', 5, NULL, NULL, NULL, 'Estilo crossover dinÃ¡mico y versÃ¡til', 'Compacto por fuera, espacioso por dentro y con excelente despeje del suelo para la ciudad y el viaje.', NULL, NULL, false, true, false, 'disponible', 3, '2026-10-27 20:46:54', '2026-10-31 18:58:34', '2026-10-31 18:58:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (18, '2446fcbf-595b-46ab-9a2c-516f434436b9', '0km', 1, 2, 1, 'Land Cruiser Prado', 'TX-L 2.8 TDI 4x4 7 Pasajeros', 'toyota-land-cruiser-prado-2025', 2025, 98900.00, 776365000, true, NULL, 0, 'Diesel', 'AutomÃ¡tica de 8 velocidades', '4x4 Permanente con Torsen', '2.8L Turbo Diesel Intercooler', 5, NULL, NULL, NULL, 'El rey del todoterreno renovado', 'Nueva generaciÃ³n de la legendaria Prado. DiseÃ±o neo-retro, capacidades off-road inalcanzables y lujo supremo.', NULL, NULL, false, true, false, 'disponible', 4, '2026-10-27 20:46:54', '2026-10-31 18:58:34', '2026-10-31 18:58:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (19, 'c1dc3d70-3bca-4d81-8ae8-27d6832b285c', '0km', 1, 2, 1, 'Raize Sport', '1.0 Turbo CVT', 'toyota-raize-sport-2025', 2025, 21500.00, 168775000, true, NULL, 0, 'Nafta', 'AutomÃ¡tica CVT', '4x2 Delantera', '1.0L Turbo 98 HP', 5, NULL, NULL, NULL, 'El SUV compacto mÃ¡s Ã¡gil de la ciudad', 'Eficiente motor turbo, diseÃ±o juvenil y moderno equipamiento de infoentretenimiento.', NULL, NULL, false, true, false, 'disponible', 5, '2026-10-27 20:46:54', '2026-10-31 18:58:34', '2026-10-31 18:58:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (21, '47fd8872-74fa-4ec6-a72b-5f27b2516765', '0km', 1, 7, 1, 'Hiace Commuter', '2.8 TDI 14+1 Pasajeros', 'toyota-hiace-commuter-2025', 2025, 51900.00, 407415000, true, NULL, 0, 'Diesel', 'AutomÃ¡tica de 6 velocidades', '4x2 Trasera', '2.8L Turbo Diesel 177 HP', 4, NULL, NULL, NULL, 'Transporte ejecutivo y de pasajeros con mÃ¡xima comodidad', 'Capacidad para 14 pasajeros mÃ¡s conductor, aire acondicionado independiente y confort superior.', NULL, NULL, false, true, false, 'disponible', 2, '2026-10-27 20:46:54', '2026-10-31 18:58:34', '2026-10-31 18:58:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (22, '7bdecc12-5d56-4dfb-a886-0102ef9e245f', '0km', 1, 8, 1, 'GR Yaris', '1.6 Turbo GR-Four 261 HP', 'toyota-gr-yaris-2025', 2025, 64900.00, 509465000, true, NULL, 0, 'Nafta', 'Manual de 6 marchas iMT', 'GR-Four TracciÃ³n Integral Permanente', '1.6L 3 Cilindros Turbo 261 HP', 3, NULL, NULL, NULL, 'Pura sangre del Campeonato Mundial de Rally (WRC)', 'Desarrollado directamente por el equipo Toyota Gazoo Racing World Rally Team.', NULL, NULL, false, true, false, 'disponible', 1, '2026-10-27 20:46:54', '2026-10-31 18:58:34', '2026-10-31 18:58:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (23, '3638326f-0d11-4d50-a5d3-c587e93768ea', '0km', 1, 8, 1, 'Corolla GR-Sport', '2.0 Dynamic Force GR-S', 'toyota-corolla-gr-sport-2025', 2025, 32900.00, 258265000, true, NULL, 0, 'Nafta', 'Direct Shift CVT con paddle shifts', '4x2 Delantera con suspensiÃ³n deportiva', '2.0L Dynamic Force 171 HP', 4, NULL, NULL, NULL, 'El espÃ­ritu de Gazoo Racing en tu Corolla', 'SuspensiÃ³n calibrada por GR, faldones y alerÃ³n deportivo, asientos de alcÃ¡ntara con costuras rojas.', NULL, NULL, false, true, false, 'disponible', 2, '2026-10-27 20:46:54', '2026-10-31 18:58:34', '2026-10-31 18:58:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (24, '4ff97270-d1bd-43ee-ad2b-8f7f8dc3d7f1', '0km', 1, 8, 1, 'GR86', '2.4 Boxer Manual 235 HP', 'toyota-gr86-2025', 2025, 54900.00, 430965000, true, NULL, 0, 'Nafta', 'Manual de 6 velocidades', 'TracciÃ³n Trasera RWD con Torsen LSD', '2.4L Boxer AtmosfÃ©rico 235 HP', 2, NULL, NULL, NULL, 'AutÃ©ntica pasiÃ³n por la conducciÃ³n deportiva pura', 'Bajo centro de gravedad, distribuciÃ³n de pesos perfecta 50:50 y tracciÃ³n trasera pura.', NULL, NULL, false, true, false, 'disponible', 3, '2026-10-27 20:46:54', '2026-10-31 18:58:34', '2026-10-31 18:58:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (25, '8ffa57ad-6438-44e3-bd24-a40a65bccfe7', '0km', 1, 9, 1, 'Corolla Hybrid', '1.8 SEG e-CVT HÃ­brido', 'toyota-corolla-hybrid-2025', 2025, 31900.00, 250415000, true, NULL, 0, 'HÃ­brido (Nafta + ElÃ©ctrico)', 'e-CVT AutomÃ¡tica', '4x2 Delantera', '1.8L Atkinson + Motor ElÃ©ctrico (122 HP combinado)', 4, NULL, NULL, NULL, 'MÃ¡xima eficiencia sin necesidad de enchufar', 'BaterÃ­a autorrecargable, silencio absoluto en modo EV y consumos de menos de 4 litros cada 100 Km.', NULL, NULL, false, true, true, 'disponible', 1, '2026-10-27 20:46:54', '2026-10-31 18:58:34', '2026-10-31 18:58:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (27, '0815a326-bc11-4c50-9144-78323f1394f1', '0km', 1, 9, 1, 'RAV4 Hybrid', 'Limited AWD e-CVT 222 HP', 'toyota-rav4-hybrid-2025', 2025, 52900.00, 415265000, true, NULL, 0, 'HÃ­brido (Nafta + ElÃ©ctrico)', 'e-CVT con modo secuencial', 'AWD-i TracciÃ³n Inteligente ElÃ©ctrica', '2.5L Dynamic Force + Motores ElÃ©ctricos (222 HP)', 5, NULL, NULL, NULL, 'Potencia inteligente con tracciÃ³n electrÃ³nica en las 4 ruedas', 'Equipamiento de lujo Limited, techo panorÃ¡mico, audio JBL y aceleraciÃ³n instantÃ¡nea con tracciÃ³n inteligente AWD-i.', NULL, NULL, false, true, true, 'disponible', 3, '2026-10-27 20:46:54', '2026-10-31 18:58:34', '2026-10-31 18:58:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (12, '1f57e6f5-e5ee-4d2c-a1b6-cec6302e1368', '0km', 1, 6, 1, 'Hilux Cabina Doble', 'SRV 4x4 2.8 TDI AutomÃ¡tica', 'toyota-hilux-cabina-doble-2025', 2025, 58500.00, 459225000, true, NULL, 0, 'Diesel', 'AutomÃ¡tica de 6 velocidades', '4x4 con reductora y bloqueo', '2.8L Turbo Diesel 204 HP', 4, NULL, NULL, NULL, 'La pickup lÃ­der absoluta de Paraguay', 'Potencia, durabilidad inquebrantable, confort premium interior y seguridad Toyota Safety Sense.', '{"motor": {"power": "204 CV @ 3.400 rpm", "torque": "500 Nm @ 1.600 - 2.800 rpm", "cylinders": "4 en lÃ­nea, 16 vÃ¡lvulas DOHC con Turbo de GeometrÃ­a Variable (VGT) e Intercooler", "fuel_tank": "80 L", "engine_code": "1GD-FTV", "displacement": "2.755 cc", "fuel_consumption": "Aprox. 11,8 km/L combinado"}, "garantia": {"warranty": "5 aÃ±os o 150.000 km con respaldo oficial", "service_interval": "Cada 10.000 km en talleres oficiales Consur"}, "dimensiones": {"seats": "5 plazas", "trunk": "Capacidad de carga 1.000 kg / Capacidad de remolque 3.500 kg", "width": "1.855 mm", "height": "1.815 mm", "length": "5.325 mm", "weight": "2.090 kg en orden de marcha", "wheelbase": "3.085 mm", "ground_clearance": "286 mm"}, "transmision": {"tires": "265/60 R18 con llantas de aleaciÃ³n diamantadas", "brakes": "Delanteros a disco ventilado / Traseros a tambor con ABS, EBD y BA", "gearbox": "AutomÃ¡tica secuencial de 6 velocidades con funciÃ³n de bloqueo de convertidor", "drive_modes": "Eco Mode / Power Mode", "suspension_rear": "Eje rÃ­gido con elÃ¡sticos longitudinales semi-elÃ­pticos y amortiguadores telescÃ³picos", "suspension_front": "Independiente con doble horquilla, resortes helicoidales y barra estabilizadora"}}', '["Android Auto & Apple CarPlay", "Pantalla tÃ¡ctil multimedia", "Climatizador bi-zona", "Arranque sin llave (Smart Entry)", "Tapizado de cuero", "Asiento del conductor elÃ©ctrico", "Faros Full LED", "Faros antiniebla", "Llantas de aleaciÃ³n", "Estribos laterales", "Bloqueo de diferencial trasero", "TracciÃ³n 4x4 con reductora", "Control de velocidad crucero"]', false, true, false, 'disponible', 1, '2026-10-27 20:46:54', '2026-10-31 18:58:34', '2026-10-31 18:58:34', 573.00, 'https://toyota.com.py/pdf/Hilux-srv-Limited.pdf', 'https://www.youtube.com/watch?v=kYJvMv6k_6s', 7, '[{"hex": "#F5F5F5", "name": "Super Blanco", "image": "images/models/hilux-cabina-doble.webp"}, {"hex": "#B9BCBF", "name": "Gris Plata Metalizado", "image": "images/models/hilux-cabina-doble-hover.webp"}, {"hex": "#55585C", "name": "Gris Oscuro Metalizado", "image": ""}, {"hex": "#141414", "name": "Negro Mica", "image": ""}, {"hex": "#9E1B22", "name": "Rojo Metalizado", "image": ""}]', '[{"name": "DX 4x4 2.8 TDI Manual", "features": "Caja manual de 6ta, 4x4 con reductora, 7 airbags, pantalla tÃ¡ctil 8\", llantas de acero 17\"", "highlight": "Trabajo y robustez pura", "price_usd": "41500", "monthly_fee": "490"}, {"name": "SR 4x4 2.8 TDI AutomÃ¡tica", "features": "Caja automÃ¡tica de 6ta, llantas de aleaciÃ³n 17\", cÃ¡mara de retroceso, faros antiniebla", "highlight": "Equilibrio perfecto campo y ciudad", "price_usd": "51900", "monthly_fee": "540"}, {"name": "SRV 4x4 2.8 TDI AutomÃ¡tica", "features": "Toyota Safety Sense completo, Faros Full LED, climatizador bi-zona, tapizado de cuero, llantas diamantadas 18\"", "highlight": "VersiÃ³n Insignia - MÃ¡ximo Confort", "price_usd": "58500", "monthly_fee": "573"}, {"name": "GR-Sport 4x4 2.8 TDI 224 HP", "features": "Motor potenciado a 224 CV, suspensiÃ³n monotubo GR, trochas ensanchadas 140 mm, estÃ©tica deportiva GR", "highlight": "Desarrollada por TOYOTA GAZOO Racing", "price_usd": "69900", "monthly_fee": "695"}]', '["tss", "pcs", "acc", "lda", "vsc", "trc", "hac", "dac", "abs", "tsc", "camera", "parking", "isofix"]', '[{"desc": "Motor 1GD-FTV 2.8L Turbo DiÃ©sel de 204 CV y 500 Nm de torque. Probada y aclamada en los terrenos mÃ¡s exigentes del Chaco paraguayo.", "image": "", "title": "Potencia y Rendimiento Imparable"}, {"desc": "Tranquilidad total para tu familia con Sistema Pre-ColisiÃ³n frontal (PCS), Control de Crucero Adaptativo (ACC) y Mantenimiento de Carril (LDA).", "image": "", "title": "Toyota Safety Sense Activo"}, {"desc": "Pantalla multimedia tÃ¡ctil con Apple CarPlay y Android Auto, climatizador bi-zona, butacas ergonÃ³micas con ajuste elÃ©ctrico y audio premium.", "image": "", "title": "Confort y Conectividad Superior"}]', NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (26, '1c5e611d-6b05-4268-80e7-01203573e2cf', '0km', 1, 9, 1, 'Corolla Cross Hybrid', '1.8 SEG e-CVT HÃ­brido', 'toyota-corolla-cross-hybrid-2025', 2025, 36900.00, 289665000, true, NULL, 0, 'HÃ­brido (Nafta + ElÃ©ctrico)', 'e-CVT AutomÃ¡tica', '4x2 Delantera', '1.8L Atkinson + Motor ElÃ©ctrico (122 HP combinado)', 5, NULL, NULL, NULL, 'El SUV hÃ­brido favorito para la familia ecolÃ³gica', 'Combina la versatilidad de un SUV moderno con la tecnologÃ­a hÃ­brida lÃ­der mundial de Toyota.', '{"motor": {"power": "Potencia combinada: 122 CV", "torque": "142 Nm motor tÃ©rmico + 163 Nm motor elÃ©ctrico", "cylinders": "4 en lÃ­nea, 16 vÃ¡lvulas DOHC con VVT-i", "fuel_tank": "36 L", "engine_code": "2ZR-FXE 1.8L Atkinson + Motor ElÃ©ctrico de imanes permanentes", "displacement": "1.798 cc", "hybrid_system": "BaterÃ­a de NÃ­quel-Metal Hidruro (Ni-MH) autorecargable de 6.5 Ah", "fuel_consumption": "22.8 km/L en ciclo urbano"}, "garantia": {"warranty": "5 aÃ±os o 150.000 km garantÃ­a de vehÃ­culo", "hybrid_warranty": "8 aÃ±os o 160.000 km para la baterÃ­a y componentes hÃ­bridos", "service_interval": "Cada 10.000 km en red de talleres Consur"}, "dimensiones": {"seats": "5 plazas", "trunk": "440 L de capacidad volumÃ©trica", "width": "1.825 mm", "height": "1.620 mm", "length": "4.460 mm", "weight": "1.430 kg en orden de marcha", "wheelbase": "2.640 mm", "ground_clearance": "161 mm"}, "transmision": {"tires": "225/50 R18 con llantas de aleaciÃ³n diamantadas", "brakes": "Discos ventilados delanteros y sÃ³lidos traseros con regeneraciÃ³n de energÃ­a", "gearbox": "TransmisiÃ³n e-CVT continuamente variable con frenado regenerativo (Modo B)", "drive_modes": "Eco / Normal / Power / EV (Modo 100% ElÃ©ctrico)", "suspension_rear": "Eje de torsiÃ³n con resortes helicoidales y amortiguadores telescÃ³picos", "suspension_front": "Independiente tipo MacPherson con resortes helicoidales y barra estabilizadora"}}', '["Android Auto & Apple CarPlay", "Conectividad inalÃ¡mbrica", "Pantalla tÃ¡ctil multimedia", "Panel de instrumentos digital", "Climatizador bi-zona", "Salidas de A/C traseras", "Arranque sin llave (Smart Entry)", "Cargador inalÃ¡mbrico", "Tapizado de cuero", "Asiento del conductor elÃ©ctrico", "Techo solar", "Faros Full LED", "Faros antiniebla", "Llantas de aleaciÃ³n", "Control de velocidad crucero"]', false, true, true, 'disponible', 2, '2026-10-27 20:46:54', '2026-10-31 18:58:34', '2026-10-31 18:58:34', 465.00, 'https://toyota.com.py/pdf/Corolla-Cross-seg.pdf', 'https://www.youtube.com/watch?v=mHwZ3k65uG8', 7, '[{"hex": "#EDEBE4", "name": "Blanco Perlado", "image": "images/models/corolla-cross-hybrid.webp"}, {"hex": "#55585C", "name": "Gris Oscuro Metalizado", "image": "images/models/corolla-cross-hybrid-hover.webp"}, {"hex": "#B9BCBF", "name": "Plata Metalizado", "image": ""}, {"hex": "#10253F", "name": "Azul Eclipse", "image": ""}, {"hex": "#141414", "name": "Negro Mica", "image": ""}]', '[{"name": "XLi 2.0 Nafta Direct Shift", "features": "Motor 2.0 Dynamic Force 170 CV, 7 airbags, pantalla tÃ¡ctil 8\", llantas aleaciÃ³n 17\"", "highlight": "Entrada de gama con mÃ¡xima seguridad", "price_usd": "29900", "monthly_fee": "390"}, {"name": "XRE 2.0 Nafta Direct Shift", "features": "Faros Full LED, llantas diamantadas 18\", Smart Entry, climatizador automÃ¡tico, techo solar", "highlight": "Equipamiento completo confort", "price_usd": "33900", "monthly_fee": "425"}, {"name": "SEG Hybrid 1.8 e-CVT HÃ­brido", "features": "Sistema HÃ­brido Auto-recargable, Toyota Safety Sense 3.0, cuadro digital 12.3\", tapizado de cuero, cargador inalÃ¡mbrico", "highlight": "CÃºspide de la gama hÃ­brida auto-recargable", "price_usd": "36900", "monthly_fee": "465"}]', '["tss", "pcs", "acc", "lda", "ahb", "bsm", "rcta", "vsc", "trc", "hac", "abs", "camera", "parking", "isofix"]', '[{"desc": "Sin cables ni enchufes. Su baterÃ­a de autorecarga aprovecha el frenado y la inercia, alcanzando mÃ¡s de 22 km por litro y reduciendo emisiones drÃ¡sticamente.", "image": "", "title": "TecnologÃ­a HÃ­brida Auto-recargable"}, {"desc": "Asistencias a la conducciÃ³n de Ãºltima generaciÃ³n: Control de Crucero Adaptativo Inteligente, Detector de Punto Ciego (BSM) y Alerta de TrÃ¡fico Cruzado (RCTA).", "image": "", "title": "Toyota Safety Sense 3.0"}, {"desc": "InsonorizaciÃ³n acÃºstica de primera clase, 440 litros de baÃºl para el viaje familiar y un cockpit 100% digital con panel de 12.3 pulgadas.", "image": "", "title": "Espacio, Silencio y Confort"}]', NULL, NULL, NULL);
INSERT INTO public.vehicles VALUES (53, '04f33168-4d79-42b1-a30d-744c16576073', '0km', 1, 6, 1, 'Hilux', 'Doble Cabina DX / SR / SRV', 'hilux', 2026, NULL, NULL, false, NULL, 0, 'Diesel', 'AutomÃ¡tica / MecÃ¡nica 6 vel.', '4x4', '2.8L 1GD (201 CV / 500 Nm) & 2.4L 2GD (150 CV)', 4, NULL, NULL, NULL, 'La expectativa hecha realidad: lo mejor en el mundo Pick Up', 'La nueva Hilux Doble Cabina con diseÃ±o renovado, motores 2.8L (201 CV / 500 Nm) y 2.4L (150 CV), pantalla de 8" con CarPlay/Android Auto y 7 airbags de serie.', NULL, NULL, false, true, false, 'disponible', 1, '2026-10-31 19:26:10', '2026-11-11 15:18:57', NULL, NULL, 'https://toyota.com.py/pdf/Hilux-srv-Limited.pdf', 'https://www.youtube.com/watch?v=84y1TC0Cq7M', 7, NULL, NULL, NULL, NULL, '["images/vehicles/hilux/slider_hilux.jpg"]', '<!-- ================= 1. LA EXPECTATIVA HECHA REALIDAD & NOVEDADES ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <div class="max-w-3xl mx-auto text-center space-y-3">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">LÃ­der Indiscutida en Pick Ups</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                La expectativa hecha realidad
            </h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                La nueva <strong>Hilux</strong> con un diseÃ±o renovado, mayor confort, mÃ¡s tecnologÃ­a, mejor performance y mÃ¡s seguridad, ha llegado a Paraguay para ofrecerte lo mejor en el mundo pick up.
            </p>
        </div>

        <!-- QuÃ© novedades nos presenta -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50 p-4">
                    <img src="/images/vehicles/hilux/Swash-03.png" alt="QuÃ© novedades nos presenta Toyota Hilux" class="w-full h-full object-contain hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Fortaleza y Robustez
                </span>
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    QuÃ© novedades nos presenta
                </h3>
                <p class="text-base text-slate-600 leading-relaxed">
                    En las versiones <strong>SRV y SR</strong> se presenta un nuevo diseÃ±o frontal mÃ¡s moderno, con cambios en sus Ã³pticas, parrilla y paragolpes, que en su conjunto le otorgan una imagen de fortaleza y robustez. La versiÃ³n SRV suma ademÃ¡s <strong>faros Bi-LED</strong>, que le dan una mayor impronta visual y tecnolÃ³gica.
                </p>
                <p class="text-base text-slate-600 leading-relaxed">
                    Con respecto a la vista lateral se destacan las nuevas llantas de aleaciÃ³n para las versiones SRV automÃ¡tica (<strong>265/60R18â€³</strong>), SRV y SR mecÃ¡nica (<strong>265/65R17â€³</strong>). En la vista trasera, la Hilux SRV incorpora los nuevos faros con luces LED de moderno diseÃ±o interno.
                </p>
            </div>
        </div>

        <!-- DiseÃ±o Interior -->
        <div id="interior" class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Cabina Renovada
                </span>
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    DiseÃ±o Interior
                </h3>
                <p class="text-base text-slate-600 leading-relaxed">
                    En su interior, la nueva Hilux combina dinamismo y modernidad, integrÃ¡ndose el equipo de audio de manera mÃ¡s fluida al panel de instrumentos. El nuevo diseÃ±o y combinaciÃ³n de colores de los relojes de velocÃ­metro y tacÃ³metro, donde predomina el gris, negro y blanco, contribuyen a renovar la atmÃ³sfera interior.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50 p-4">
                    <img src="/images/vehicles/hilux/Swash-04.png" alt="DiseÃ±o Interior Toyota Hilux" class="w-full h-full object-contain hover:scale-105 transition duration-500">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. TECNOLOGÃA, AUDIO Y EQUIPAMIENTO ================= -->
<section id="tecnologia" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <!-- Audio -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-200/80 bg-white p-4">
                    <img src="/images/vehicles/hilux/Swash-01.png" alt="Audio Toyota Hilux" class="w-full h-full object-contain">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full">Conectividad Total</span>
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    Audio
                </h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Las versiones SRV y SR de la nueva Hilux estÃ¡n equipadas con un sistema de audio con <strong>pantalla tÃ¡ctil de 8â€³</strong> con conectividad <strong>Android AutoÂ® &amp; Apple CarPlayÂ®</strong>, manteniendo ademÃ¡s la funciÃ³n de BluetoothÂ®.
                </p>
            </div>
        </div>

        <!-- Equipamiento -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full">Asistencias al Conductor</span>
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    Equipamiento
                </h3>
                <p class="text-base text-slate-600 leading-relaxed">
                    Las versiones SRV AutomÃ¡tica y 4Ã—2 incorporan ademÃ¡s <strong>sensores de estacionamiento delanteros y traseros</strong> que facilitan las maniobras en espacios reducidos y contribuyen a la seguridad del entorno.
                </p>
                <p class="text-base text-slate-600 leading-relaxed">
                    El display de informaciÃ³n mÃºltiple de <strong>4,2â€³ con pantalla a color TFT</strong> (versiones SRV y SR) incorpora dos funciones adicionales: el indicador de velocidad digital y el indicador de posiciÃ³n de las ruedas delanteras con 3 Ã¡ngulos distintos.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-200/80 bg-white p-4">
                    <img src="/images/vehicles/hilux/Swash-02.png" alt="Equipamiento Toyota Hilux" class="w-full h-full object-contain">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. PERFORMANCE & SEGURIDAD ================= -->
<section id="desempeno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <!-- Performance -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50 p-4">
                    <img src="/images/vehicles/hilux/Swash-07.png" alt="Performance Toyota Hilux" class="w-full h-full object-contain">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full">Motores 1GD 2.8L &amp; 2GD 2.4L</span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                    Performance
                </h2>
                <p class="text-base text-slate-600 leading-relaxed">
                    Las versiones de Hilux con motor <strong>1GD (2.8L) entregan 201 CV</strong>, incrementando su potencia en un 15%. Las versiones con este motor y transmisiÃ³n automÃ¡tica alcanzan <strong>500 Nm de torque</strong> (y 420 Nm entre 1.400 y 3.400 rpm en transmisiÃ³n manual), gracias a un turbo con aspas un 25% mayores.
                </p>
                <p class="text-base text-slate-600 leading-relaxed">
                    AdemÃ¡s, incorpora una electrovÃ¡lvula en la direcciÃ³n que permite una asistencia mÃ¡s liviana a baja velocidad y mÃ¡s firme al incrementarse la marcha. El motor <strong>2GD (2.4L) con 150 CV y 400 Nm de torque</strong> mantiene su caracterÃ­stico balance entre performance y economÃ­a de combustible.
                </p>
            </div>
        </div>

        <!-- Seguridad -->
        <div id="seguridad" class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full">7 Airbags de Serie</span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                    Seguridad
                </h2>
                <p class="text-base text-slate-600 leading-relaxed">
                    Hilux se destaca por ofrecer <strong>bloqueo de diferencial trasero</strong> como estÃ¡ndar en todas las versiones con tracciÃ³n 4Ã—4, y respecto al equipamiento de seguridad pasiva, <strong>todas las versiones de Hilux cuentan con 7 airbags</strong>.
                </p>
                <p class="text-base text-slate-600 leading-relaxed">
                    Cuenta ademÃ¡s con Control de Estabilidad (<strong>VSC</strong>), Asistente de arranque en pendientes (<strong>HAC</strong>), Control de balanceo de trÃ¡iler (<strong>TSC</strong>), frenos <strong>ABS</strong> con DistribuciÃ³n ElectrÃ³nica de la Fuerza de Frenado (<strong>EBD</strong>), Asistente de frenado de emergencia (<strong>BA</strong>), Luces de frenado de emergencia (<strong>EBS</strong>), cinturones de 3 puntos en todas las plazas y anclajes <strong>ISOFIX</strong>.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/hilux/Swash-06.jpg" alt="Seguridad Toyota Hilux" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. VIDEOS OFICIALES ================= -->
<section id="video" class="py-16 md:py-20 bg-slate-950 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        <div class="text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-500">Multimedia Oficial</span>
            <h2 class="text-3xl sm:text-4xl font-light uppercase font-heading text-white">
                Videos
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="space-y-3">
                <h3 class="text-lg font-medium text-slate-200 text-center">Hilux SRV</h3>
                <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
                    <iframe loading="lazy" title="Video Hilux SRV" src="https://www.youtube.com/embed/84y1TC0Cq7M?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
            <div class="space-y-3">
                <h3 class="text-lg font-medium text-slate-200 text-center">Hilux Limited SRV</h3>
                <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
                    <iframe loading="lazy" title="Video Hilux Limited SRV" src="https://www.youtube.com/embed/UTxy2Uleuec?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 5. MODELOS (DX, SR, SRV) ================= -->
<section id="modelos" class="py-16 md:py-24 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Versiones Doble Cabina</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                Modelos
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- DX -->
            <div class="bg-white rounded-3xl p-7 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col justify-between space-y-6">
                <div class="space-y-5">
                    <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100 flex items-center justify-center aspect-[16/10]">
                        <img src="/images/vehicles/hilux/DXBlanca.png" alt="Toyota Hilux DX" class="max-h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading text-center">DX</h3>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li>â€¢ <strong>Motor 2,4 litros</strong> 4 cilindros 16v con 147 CV. Manual de 6 velocidades.</li>
                        <li>â€¢ Audio con pantalla tÃ¡ctil de 8â€³, BluetoothÂ®, Android AutoÂ® y Apple CarPlayÂ®</li>
                        <li>â€¢ <strong>7 airbags</strong>: frontales (x2), rodilla (conductor), laterales (x2) y cortina (x2)</li>
                        <li>â€¢ Control de estabilidad (VSC) y Control de tracciÃ³n (TRC)</li>
                        <li>â€¢ Asistente de arranque en pendientes (HAC) y Control de balanceo de trÃ¡iler (TSC)</li>
                        <li>â€¢ Protector de cÃ¡rter Â«Heavy DutyÂ» y de tanque de combustible</li>
                        <li>â€¢ Cierre centralizado a distancia, levantacristales y espejos elÃ©ctricos</li>
                        <li>â€¢ Volante regulable en altura y profundidad e inmovilizador de motor</li>
                    </ul>
                </div>
                <a href="https://toyota.com.py/pdf/Toyota-Hilux-DX-Diptico.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-5 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure DX</span>
                </a>
            </div>

            <!-- SR -->
            <div class="bg-white rounded-3xl p-7 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col justify-between space-y-6">
                <div class="space-y-5">
                    <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100 flex items-center justify-center aspect-[16/10]">
                        <img src="/images/vehicles/hilux/model_sr.png" alt="Toyota Hilux SR" class="max-h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading text-center">SR</h3>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li>â€¢ <strong>Motor 2,4 litros</strong> 4 cilindros 16v con 147 CV. Manual de 6 velocidades.</li>
                        <li>â€¢ Guardabarros extendidos</li>
                        <li>â€¢ <strong>Llantas de aleaciÃ³n 17â€³</strong> con neumÃ¡ticos 265/65 R17 AT</li>
                        <li>â€¢ Faros antiniebla delanteros</li>
                        <li>â€¢ Display de informaciÃ³n mÃºltiple con pantalla a color de <strong>4,2â€³ (TFT)</strong></li>
                        <li>â€¢ Volante forrado en cuero natural</li>
                        <li>â€¢ Paragolpes trasero cromado y manijas color carrocerÃ­a</li>
                        <li>â€¢ Modos de conducciÃ³n <strong>ECO y Power Mode</strong></li>
                        <li>â€¢ Sistema de alarma antirrobo</li>
                    </ul>
                </div>
                <a href="https://toyota.com.py/pdf/Toyota-Hilux-SR-Diptico.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-5 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure SR</span>
                </a>
            </div>

            <!-- SRV -->
            <div class="bg-white rounded-3xl p-7 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col justify-between space-y-6">
                <div class="space-y-5">
                    <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100 flex items-center justify-center aspect-[16/10]">
                        <img src="/images/vehicles/hilux/model_srv.png" alt="Toyota Hilux SRV" class="max-h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading text-center">SRV</h3>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li>â€¢ <strong>Motor 2,8 litros</strong> 4 cilindros 16v con <strong>201 CV</strong> de potencia mÃ¡xima. AutomÃ¡tico de 6 velocidades.</li>
                        <li>â€¢ <strong>Faros delanteros Bi-LED</strong></li>
                        <li>â€¢ <strong>Faros traseros de LED</strong></li>
                        <li>â€¢ Sensores de estacionamiento delanteros (x2) y traseros (x4)</li>
                        <li>â€¢ Estribos laterales</li>
                        <li>â€¢ Aire acondicionado con <strong>climatizador automÃ¡tico digital</strong> y salidas para plazas traseras</li>
                        <li>â€¢ Control de velocidad crucero</li>
                    </ul>
                </div>
                <a href="https://toyota.com.py/pdf/Hilux-srv-Limited.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-5 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure SRV</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ================= 6. GALERÃA ================= -->
<!-- ================= GALERÃA FOTOGRÃFICA (ESTILO LEXUS) ================= -->
<script>
window.toyotaGallery_hilux = function() {
    return {
        activeTab: ''todos'',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/hilux/hilux-1.jpg","category":"exterior"},{"image":"/images/vehicles/hilux/hilux-2.jpg","category":"exterior"},{"image":"/images/vehicles/hilux/hilux-6.jpg","category":"exterior"},{"image":"/images/vehicles/hilux/hilux-7.jpg","category":"exterior"},{"image":"/images/vehicles/hilux/hilux-3.jpg","category":"interior"},{"image":"/images/vehicles/hilux/hilux-4.jpg","category":"interior"},{"image":"/images/vehicles/hilux/hilux-5.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === ''todos'') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '''').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '''', caption: '''', category: '''' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById(''toyota_thumb_hilux_'' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: ''smooth'', block: ''nearest'', inline: ''center'' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_hilux()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con tÃ­tulo y pestaÃ±as interactivas estilo Lexus UX -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    GalerÃ­a
                </h2>
            </div>

            <!-- PestaÃ±as de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab(''todos'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''todos'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab(''exterior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''exterior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab(''interior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''interior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato CinemÃ¡tico) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de ImÃ¡genes con transiciÃ³n suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + ''_'' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? ''opacity-100 z-10'' : ''opacity-0 z-0 pointer-events-none''"
                    >
                        <img 
                            :src="item.image" 
                            :alt="''Foto '' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- BotÃ³n Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de CategorÃ­a -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''TOYOTA'')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, ''0'')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, ''0'')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de NavegaciÃ³n Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="''thumb_'' + idx">
                    <button 
                        type="button"
                        :id="''toyota_thumb_hilux_'' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? ''border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md'' 
                            : ''border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400''"
                        :title="''Foto '' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="''Foto '' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Hilux Doble Cabina Â· <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''GALERÃA'')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en ProporciÃ³n Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="''Foto '' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + '' / '' + filteredItems.length"></span>
            <span class="hidden sm:inline">NavegÃ¡ con las flechas &larr; &rarr; o deslizÃ¡ con el dedo</span>
        </div>
    </div>
</section>', '[{"name": "Hero Slide Hilux", "path": "images/vehicles/hilux/slider_hilux.jpg"}, {"name": "Portada CatÃ¡logo Hilux", "path": "images/vehicles/hilux/home_hilux.png"}, {"name": "Novedades Exterior Hilux", "path": "images/vehicles/hilux/Swash-03.png"}, {"name": "DiseÃ±o Interior Hilux", "path": "images/vehicles/hilux/Swash-04.png"}, {"name": "Sistema de Audio 8\"", "path": "images/vehicles/hilux/Swash-01.png"}, {"name": "Equipamiento y Display TFT", "path": "images/vehicles/hilux/Swash-02.png"}, {"name": "Performance Motor 2.8L / 2.4L", "path": "images/vehicles/hilux/Swash-07.png"}, {"name": "Seguridad 7 Airbags", "path": "images/vehicles/hilux/Swash-06.jpg"}, {"name": "Modelo Hilux DX", "path": "images/vehicles/hilux/DXBlanca.png"}, {"name": "Modelo Hilux SR", "path": "images/vehicles/hilux/model_sr.png"}, {"name": "Modelo Hilux SRV", "path": "images/vehicles/hilux/model_srv.png"}, {"name": "GalerÃ­a Hilux 1", "path": "images/vehicles/hilux/hilux-1.jpg"}, {"name": "GalerÃ­a Hilux 2", "path": "images/vehicles/hilux/hilux-2.jpg"}, {"name": "GalerÃ­a Hilux 3", "path": "images/vehicles/hilux/hilux-3.jpg"}, {"name": "GalerÃ­a Hilux 4", "path": "images/vehicles/hilux/hilux-4.jpg"}, {"name": "GalerÃ­a Hilux 5", "path": "images/vehicles/hilux/hilux-5.jpg"}, {"name": "GalerÃ­a Hilux 6", "path": "images/vehicles/hilux/hilux-6.jpg"}, {"name": "GalerÃ­a Hilux 7", "path": "images/vehicles/hilux/hilux-7.jpg"}]');
INSERT INTO public.vehicles VALUES (44, '484174af-638c-4efe-b695-665925990b08', '0km', 1, 2, 1, 'Corolla Cross', 'Naftero 2.0 / HÃ­brido 1.8', 'corolla-cross', 2026, NULL, NULL, false, NULL, 0, 'HÃ­brido', 'AutomÃ¡tica CVT', '4x2', '2.0L 177 HP / 1.8L Hybrid Flex', 5, NULL, NULL, NULL, 'Fuerte identidad, robustez y eficiencia hÃ­brida', 'El nuevo Corolla Cross ofrece el mÃ¡ximo confort con maletero de 440L, paquete de seguridad Toyota Safety Sense con 7 airbags y versiones 2.0L o HÃ­brida 1.8L.', NULL, NULL, false, true, true, 'disponible', 2, '2026-10-31 19:26:10', '2026-11-11 15:18:57', NULL, NULL, 'https://www.toyota.com.py/vehiculo/new-corolla-cross/brochure/Catalogo_digital_Corolla_Cross_2025_240624_.pdf', 'https://www.youtube.com/watch?v=X1R9sMmLxck', 7, NULL, NULL, NULL, NULL, '["images/vehicles/corolla-cross/slidecorollacross2025_1.jpg"]', '<!-- ================= 1. MODELOS ================= -->
<section id="modelos" class="py-16 md:py-24 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Motorizaciones Disponibles</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading uppercase">
                Modelos
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <!-- Naftero 2.0 -->
            <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col items-center text-center justify-between space-y-6">
                <div class="space-y-4 w-full">
                    <span class="inline-block text-xs font-medium uppercase tracking-widest text-slate-600 bg-slate-100 px-3 py-1 rounded-full">Dynamic Force 177 HP</span>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                        Naftero 2.0
                    </h3>
                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 flex items-center justify-center aspect-[16/9]">
                        <img src="/images/vehicles/corolla-cross/4936238e-16de-4d37-a078-27ac872bff1a.png" alt="Toyota Corolla Cross Naftero 2.0" class="max-h-full max-w-full object-contain">
                    </div>
                </div>
                <a href="https://www.toyota.com.py/vehiculo/new-corolla-cross/brochure/Catalogo_digital_Corolla_Cross_2025_240624_.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure</span>
                </a>
            </div>

            <!-- HÃ­brido 1.8 -->
            <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col items-center text-center justify-between space-y-6">
                <div class="space-y-4 w-full">
                    <span class="inline-block text-xs font-medium uppercase tracking-widest text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">Hybrid Synergy Drive</span>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                        HÃ­brido 1.8
                    </h3>
                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 flex items-center justify-center aspect-[16/9]">
                        <img src="/images/vehicles/corolla-cross/Corolla-Cross-SEG_plata-1.png" alt="Toyota Corolla Cross HÃ­brido 1.8" class="max-h-full max-w-full object-contain">
                    </div>
                </div>
                <a href="https://www.toyota.com.py/vehiculo/new-corolla-cross/brochure/Catalogo_digital_Corolla_Cross_2025_240624_.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. DISEÃ‘O ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/corolla-cross/2024_05_22_10_57_IMG_1915.jpg" alt="DiseÃ±o Toyota Corolla Cross" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Postura Imponente
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading uppercase tracking-tight leading-tight">
                    DiseÃ±o
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    La parrilla delantera trapezoidal se combina armoniosamente con los faros LED con luces de circulaciÃ³n diurna (DRL), que confieren al SUV una fuerte identidad y robustez. Las lÃ­neas laterales continuas conectan el frontal con las luces traseras LED de forma fluida, dando dinamismo. Las formas sÃ³lidas de los guardabarros se fusionan con el vehÃ­culo, que tiene una cintura alta y ancha, expresando una postura imponente.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    El Corolla Cross estÃ¡ diseÃ±ado para manejar con facilidad las carreteras urbanas en mal estado. Con un <strong>Ã¡ngulo de aproximaciÃ³n de 21Â°</strong>, los usuarios pueden esperar una mayor capacidad y la consiguiente confianza en caminos irregulares, grandes baches o cunetas pronunciadas en comparaciÃ³n con un sedÃ¡n.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. MOTOR & DESEMPEÃ‘O ================= -->
<section id="desempeno" class="py-16 md:py-24 bg-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-5 lg:order-1 order-2">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-400 bg-red-950/60 px-3 py-1 rounded-full border border-red-800/60">
                    Eficiencia &amp; Potencia
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-white font-heading uppercase tracking-tight">
                    Motor
                </h2>
                <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                    <strong>Hybrid Flex System</strong> con 101 caballos de fuerza en el motor de combustiÃ³n y 72 HP en el motor elÃ©ctrico, con un par de 14,5 Kgf.m en el motor de combustiÃ³n y 16,6 Kgf.m en el elÃ©ctrico.
                </p>
                <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                    El excelente manejo del Corolla Cross estÃ¡ garantizado por sus motorizaciones: la tecnologÃ­a hÃ­brida garantiza la mÃ¡xima eficiencia de combustible y, para la versiÃ³n a combustiÃ³n, el nuevo motor <strong>2.0L Dynamic Force que produce 177 caballos de fuerza</strong> ofrece un desempeÃ±o superior.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-2xl border border-slate-700 bg-slate-800">
                    <img src="/images/vehicles/corolla-cross/motorcross.jpg" alt="Motor Toyota Corolla Cross" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. CONFORT Y SEGURIDAD ================= -->
<section id="seguridad" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/corolla-cross/confort.png" alt="Confort y Seguridad Corolla Cross" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Toyota Safety Sense (TSS)
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading uppercase tracking-tight leading-tight">
                    Confort y Seguridad
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    El nuevo Corolla Cross fue diseÃ±ado para ofrecer el mÃ¡ximo confort a sus ocupantes y facilitar sus actividades diarias. Con un amplio espacio interno en la cabina y un <strong>maletero de 440 litros</strong>, no tendrÃ¡ que preocuparse por nada.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    El nuevo Corolla Cross Hybrid viene equipado con el paquete de seguridad <strong>Toyota Safety Sense (TSS)</strong>: asistente de pre-colisiÃ³n, control de velocidad crucero adaptativo, sistema de asistencia de carril y luces altas automÃ¡ticas que brindan tranquilidad a todos a bordo. AdemÃ¡s, su conjunto de <strong>7 airbags</strong> (2 delanteros, 2 laterales, 2 de cortina y 1 de rodilla para el conductor), sumado a la carrocerÃ­a con deformaciÃ³n progresiva, alerta de trÃ¡fico cruzado trasero y monitor de punto ciego, protege integralmente a los ocupantes.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 5. VIDEOS ================= -->
<section id="video" class="py-16 md:py-20 bg-slate-950 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        <div class="text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-500">Multimedia Oficial</span>
            <h2 class="text-3xl sm:text-4xl font-light uppercase font-heading text-white">
                Videos
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="space-y-3">
                <h3 class="text-lg font-medium text-slate-200 text-center">Corolla Cross HÃ­brido</h3>
                <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
                    <iframe loading="lazy" title="Video Corolla Cross HÃ­brido" src="https://www.youtube.com/embed/X1R9sMmLxck?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
            <div class="space-y-3">
                <h3 class="text-lg font-medium text-slate-200 text-center">Corolla Cross XLI</h3>
                <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
                    <iframe loading="lazy" title="Video Corolla Cross XLI" src="https://www.youtube.com/embed/J4WoMlykF-8?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 6. GALERÃA INTERIOR ================= -->
<!-- ================= 7. GALERÃA EXTERIOR ================= -->
<!-- ================= GALERÃA FOTOGRÃFICA (ESTILO LEXUS) ================= -->
<script>
window.toyotaGallery_corolla_cross = function() {
    return {
        activeTab: ''todos'',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-20.jpg","category":"exterior"},{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-23.jpg","category":"exterior"},{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-24.jpg","category":"exterior"},{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-25.jpg","category":"exterior"},{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-26.jpg","category":"exterior"},{"image":"/images/vehicles/corolla-cross/CorollaCross-25.jpg","category":"exterior"},{"image":"/images/vehicles/corolla-cross/CorollaCross-26.jpg","category":"exterior"},{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-33.jpg","category":"interior"},{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-35.jpg","category":"interior"},{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-36.jpg","category":"interior"},{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-41.jpg","category":"interior"},{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-42.jpg","category":"interior"},{"image":"/images/vehicles/corolla-cross/CorollaCrossHybrid-43.jpg","category":"interior"},{"image":"/images/vehicles/corolla-cross/CorollaCross-27.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === ''todos'') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '''').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '''', caption: '''', category: '''' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById(''toyota_thumb_corolla_cross_'' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: ''smooth'', block: ''nearest'', inline: ''center'' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_corolla_cross()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con tÃ­tulo y pestaÃ±as interactivas estilo Lexus UX -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    GalerÃ­a
                </h2>
            </div>

            <!-- PestaÃ±as de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab(''todos'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''todos'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab(''exterior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''exterior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab(''interior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''interior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato CinemÃ¡tico) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de ImÃ¡genes con transiciÃ³n suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + ''_'' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? ''opacity-100 z-10'' : ''opacity-0 z-0 pointer-events-none''"
                    >
                        <img 
                            :src="item.image" 
                            :alt="''Foto '' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- BotÃ³n Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de CategorÃ­a -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''TOYOTA'')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, ''0'')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, ''0'')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de NavegaciÃ³n Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="''thumb_'' + idx">
                    <button 
                        type="button"
                        :id="''toyota_thumb_corolla_cross_'' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? ''border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md'' 
                            : ''border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400''"
                        :title="''Foto '' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="''Foto '' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Corolla Cross Â· <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''GALERÃA'')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en ProporciÃ³n Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="''Foto '' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + '' / '' + filteredItems.length"></span>
            <span class="hidden sm:inline">NavegÃ¡ con las flechas &larr; &rarr; o deslizÃ¡ con el dedo</span>
        </div>
    </div>
</section>', '[{"name": "Hero Slide Corolla Cross 2025", "path": "images/vehicles/corolla-cross/slidecorollacross2025_1.jpg"}, {"name": "Modelo Naftero 2.0", "path": "images/vehicles/corolla-cross/4936238e-16de-4d37-a078-27ac872bff1a.png"}, {"name": "Modelo HÃ­brido 1.8", "path": "images/vehicles/corolla-cross/Corolla-Cross-SEG_plata-1.png"}, {"name": "DiseÃ±o Corolla Cross", "path": "images/vehicles/corolla-cross/2024_05_22_10_57_IMG_1915.jpg"}, {"name": "Motor Corolla Cross", "path": "images/vehicles/corolla-cross/motorcross.jpg"}, {"name": "Confort y Seguridad", "path": "images/vehicles/corolla-cross/confort.png"}, {"name": "Interior 1", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-33.jpg"}, {"name": "Interior 2", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-35.jpg"}, {"name": "Interior 3", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-36.jpg"}, {"name": "Interior 4", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-41.jpg"}, {"name": "Interior 5", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-42.jpg"}, {"name": "Interior 6", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-43.jpg"}, {"name": "Interior 7", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-44.jpg"}, {"name": "Interior 8", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-45.jpg"}, {"name": "Interior 9", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-50.jpg"}, {"name": "Interior 10", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-51.jpg"}, {"name": "Interior 11", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-52.jpg"}, {"name": "Interior 12", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-58.jpg"}, {"name": "Exterior 1", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-20.jpg"}, {"name": "Exterior 2", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-23.jpg"}, {"name": "Exterior 3", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-24.jpg"}, {"name": "Exterior 4", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-25.jpg"}, {"name": "Exterior 5", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-26.jpg"}, {"name": "Exterior 6", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-28.jpg"}, {"name": "Exterior 7", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-29.jpg"}, {"name": "Exterior 8", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-30.jpg"}, {"name": "Exterior 9", "path": "images/vehicles/corolla-cross/CorollaCrossHybrid-31.jpg"}, {"name": "Exterior 10", "path": "images/vehicles/corolla-cross/CorollaCross-25.jpg"}, {"name": "Exterior 11", "path": "images/vehicles/corolla-cross/CorollaCross-26.jpg"}, {"name": "Exterior 12", "path": "images/vehicles/corolla-cross/CorollaCross-27.jpg"}]');
INSERT INTO public.vehicles VALUES (43, '11bc1f4f-2974-4ba0-8221-5d0e4a6f9561', '0km', 1, 1, 1, 'Corolla', 'GLi / Altis Hybrid', 'corolla', 2026, NULL, NULL, false, NULL, 0, 'HÃ­brido', 'AutomÃ¡tica CVT', '4x2', '2.0L Dynamic Force / 1.8L Hybrid', 4, NULL, NULL, NULL, 'El sedÃ¡n mÃ¡s vendido del mundo, tambiÃ©n en versiÃ³n HÃ­brida', 'El diseÃ±o, dinamismo, confort y calidad de Corolla se fusionan perfectamente con la tecnologÃ­a de Toyota para darte mayor desempeÃ±o y eficiencia al manejar.', NULL, NULL, false, true, true, 'disponible', 5, '2026-10-31 19:26:10', '2026-11-11 15:18:57', NULL, NULL, 'https://www.toyota.com.py/pdf/corolla.pdf', 'https://www.youtube.com/watch?v=932UCVgdWGY', 7, NULL, NULL, NULL, NULL, '["images/vehicles/corolla/slider_corolla.jpg"]', '<!-- ================= 1. DISEÃ‘O FANTÃSTICO & TECNOLOGÃA HÃBRIDA ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <!-- Bloque 1 -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    El SedÃ¡n MÃ¡s Vendido del Mundo
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    FantÃ¡stico en cada detalle
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    El mundo avanza y Toyota lo sabe, por eso ahora nuestro vehÃ­culo mÃ¡s vendido en todo el mundo tambiÃ©n estÃ¡ disponible en versiÃ³n hÃ­brida. El diseÃ±o, dinamismo, confort y calidad de <strong>Corolla</strong> se fusionan perfectamente con la tecnologÃ­a hÃ­brida de Toyota, que te darÃ¡ mayor desempeÃ±o y eficiencia al manejar. Este Corolla es un automÃ³vil completamente renovado desde su estructura, electrÃ³nica y chasis, hasta su acabado, equipamiento estÃ¡ndar y motorizaciÃ³n.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    El <strong>Nuevo Corolla GLi</strong>, con su dinÃ¡mico, moderno y sofisticado diseÃ±o, crea esa sensaciÃ³n de alta calidad y continÃºa ganÃ¡ndose el corazÃ³n y la mente del mundo entero.
                </p>
            </div>
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/corolla/frente-corolla.jpg" alt="Frente Toyota Corolla" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
        </div>

        <!-- Bloque 2: Motor y Confort Interior -->
        <div id="interior" class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/corolla/interior-corolla.jpg" alt="Interior Toyota Corolla" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Eficiencia &amp; HabitÃ¡culo
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    Potencia HÃ­brida y Confort Superior
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    No es solo en diseÃ±o que el Corolla brilla: su versiÃ³n hÃ­brida estÃ¡ compuesta por un motor de combustiÃ³n de <strong>1.8 litros</strong> (101 HP en etanol y 98 HP en gasolina) y dos motores elÃ©ctricos de 72 HP. Acoplados a una transmisiÃ³n automÃ¡tica CVT y frenos regenerativos que recargan automÃ¡ticamente la baterÃ­a, entregan una potencia combinada de <strong>122 HP</strong> con una extraordinaria autonomÃ­a por tanque.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    En su dÃ©cima segunda generaciÃ³n, el nuevo Toyota Corolla eleva todo lo que siempre te ha encantado de este emblemÃ¡tico modelo: diseÃ±o, dinamismo, confort, calidad y ahora mÃ¡s seguro que nunca.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. VIDEOS OFICIALES ================= -->
<section id="video" class="py-16 md:py-20 bg-slate-950 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        <div class="text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-500">Multimedia Oficial</span>
            <h2 class="text-3xl sm:text-4xl font-light uppercase font-heading text-white">
                Videos
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="space-y-3">
                <h3 class="text-lg font-medium text-slate-200 text-center">Corolla GLi</h3>
                <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
                    <iframe loading="lazy" title="Video Corolla GLi" src="https://www.youtube.com/embed/932UCVgdWGY?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
            <div class="space-y-3">
                <h3 class="text-lg font-medium text-slate-200 text-center">Corolla Hybrid</h3>
                <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
                    <iframe loading="lazy" title="Video Corolla Hybrid" src="https://www.youtube.com/embed/d9_I0sVBClo?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. GALERÃA ================= -->
<!-- ================= GALERÃA FOTOGRÃFICA (ESTILO LEXUS) ================= -->
<script>
window.toyotaGallery_corolla = function() {
    return {
        activeTab: ''todos'',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/corolla/gli1.jpg","category":"exterior"},{"image":"/images/vehicles/corolla/gli2.jpg","category":"exterior"},{"image":"/images/vehicles/corolla/gli3.jpg","category":"exterior"},{"image":"/images/vehicles/corolla/gli4.jpg","category":"interior"},{"image":"/images/vehicles/corolla/gli5.jpg","category":"interior"},{"image":"/images/vehicles/corolla/gli6.jpg","category":"interior"},{"image":"/images/vehicles/corolla/gli7.jpg","category":"interior"},{"image":"/images/vehicles/corolla/gli8.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === ''todos'') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '''').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '''', caption: '''', category: '''' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById(''toyota_thumb_corolla_'' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: ''smooth'', block: ''nearest'', inline: ''center'' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_corolla()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con tÃ­tulo y pestaÃ±as interactivas estilo Lexus UX -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    GalerÃ­a
                </h2>
            </div>

            <!-- PestaÃ±as de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab(''todos'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''todos'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab(''exterior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''exterior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab(''interior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''interior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato CinemÃ¡tico) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de ImÃ¡genes con transiciÃ³n suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + ''_'' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? ''opacity-100 z-10'' : ''opacity-0 z-0 pointer-events-none''"
                    >
                        <img 
                            :src="item.image" 
                            :alt="''Foto '' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- BotÃ³n Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de CategorÃ­a -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''TOYOTA'')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, ''0'')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, ''0'')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de NavegaciÃ³n Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="''thumb_'' + idx">
                    <button 
                        type="button"
                        :id="''toyota_thumb_corolla_'' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? ''border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md'' 
                            : ''border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400''"
                        :title="''Foto '' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="''Foto '' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Corolla SedÃ¡n Â· <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''GALERÃA'')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en ProporciÃ³n Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="''Foto '' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + '' / '' + filteredItems.length"></span>
            <span class="hidden sm:inline">NavegÃ¡ con las flechas &larr; &rarr; o deslizÃ¡ con el dedo</span>
        </div>
    </div>
</section>

<!-- ================= 4. MODELOS ================= -->
<section id="modelos" class="py-16 md:py-24 bg-slate-50 border-t border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Versiones Oficiales</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                Modelos
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <!-- Corolla GLi -->
            <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col justify-between space-y-6">
                <div class="space-y-5">
                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 flex items-center justify-center aspect-[16/9]">
                        <img src="/images/vehicles/corolla/corollagris.png" alt="Toyota Corolla GLi" class="max-h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                        Corolla GLi
                    </h3>
                    <ul class="space-y-2.5 text-sm sm:text-base text-slate-600">
                        <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>TransmisiÃ³n automÃ¡tica con <strong>Direct Shift CVT de 10 velocidades</strong>.</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Tapizado en <strong>cuero sintÃ©tico</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Pantalla de informaciÃ³n de <strong>4,2 pulgadas</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Espejo rebatible manual</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Llantas <strong>205/55R16 Alloy</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Faros HalÃ³genos</span></li>
                    </ul>
                </div>
                <a href="https://www.toyota.com.py/pdf/corolla.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure</span>
                </a>
            </div>

            <!-- Corolla Altis Hybrid -->
            <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col justify-between space-y-6">
                <div class="space-y-5">
                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 flex items-center justify-center aspect-[16/9]">
                        <img src="/images/vehicles/corolla/corolla-cobalto.png" alt="Toyota Corolla Altis Hybrid" class="max-h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                        Corolla Altis Hybrid
                    </h3>
                    <ul class="space-y-2.5 text-sm sm:text-base text-slate-600">
                        <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>TransmisiÃ³n automÃ¡tica <strong>Hybrid Transaxle CVT</strong> con 4 modos de conducciÃ³n: Normal, Eco, Power y EV (ElÃ©ctrico).</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Tapizado en <strong>cuero genuino</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Pantalla de informaciÃ³n de <strong>7â€³</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Espejo rebatible electrÃ³nico</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Llantas <strong>225/45R17 Alloy</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Faros <strong>Full LED</strong> y <strong>Techo Solar</strong></span></li>
                    </ul>
                </div>
                <a href="https://www.toyota.com.py/pdf/corolla.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure</span>
                </a>
            </div>
        </div>
    </div>
</section>', '[{"name": "Hero Slide Corolla", "path": "images/vehicles/corolla/slider_corolla.jpg"}, {"name": "Portada CatÃ¡logo Corolla", "path": "images/vehicles/corolla/home_corolla1.png"}, {"name": "Frente Corolla", "path": "images/vehicles/corolla/frente-corolla.jpg"}, {"name": "Interior Corolla", "path": "images/vehicles/corolla/interior-corolla.jpg"}, {"name": "Modelo Corolla GLi", "path": "images/vehicles/corolla/corollagris.png"}, {"name": "Modelo Corolla Altis Hybrid", "path": "images/vehicles/corolla/corolla-cobalto.png"}, {"name": "GalerÃ­a Corolla 1", "path": "images/vehicles/corolla/gli1.jpg"}, {"name": "GalerÃ­a Corolla 2", "path": "images/vehicles/corolla/gli2.jpg"}, {"name": "GalerÃ­a Corolla 3", "path": "images/vehicles/corolla/gli3.jpg"}, {"name": "GalerÃ­a Corolla 4", "path": "images/vehicles/corolla/gli4.jpg"}, {"name": "GalerÃ­a Corolla 5", "path": "images/vehicles/corolla/gli5.jpg"}, {"name": "GalerÃ­a Corolla 6", "path": "images/vehicles/corolla/gli6.jpg"}, {"name": "GalerÃ­a Corolla 7", "path": "images/vehicles/corolla/gli7.jpg"}, {"name": "GalerÃ­a Corolla 8", "path": "images/vehicles/corolla/gli8.jpg"}]');
INSERT INTO public.vehicles VALUES (49, '9ef7bea3-a1c3-4b39-b6d1-44593762c7eb', '0km', 1, 6, 1, 'Hilux Cabina Simple', '2.4L Diesel 4x4 / 4x2', 'hilux-cabina-simple', 2026, NULL, NULL, false, NULL, 0, 'Diesel', 'MecÃ¡nica 6 velocidades', '4x4', '2.4L Diesel 4 Cilindros Twin Cam 16v (147 HP)', 2, NULL, NULL, NULL, 'La Pick Up emblema de Toyota para el trabajo mÃ¡s exigente', 'La 8va. generaciÃ³n de la Pick Up emblema de la marca con motor 2.4 Diesel de 147 HP, mÃ¡ximo rendimiento y capacidad de carga.', NULL, NULL, false, true, false, 'disponible', 7, '2026-10-31 19:26:10', '2026-11-11 15:18:57', NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, '["images/vehicles/hilux-cabina-simple/slide_hiluxcabsimple.jpg"]', '<!-- ================= 1. CARACTERÃSTICAS & ESPECIFICACIONES ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/hilux-cabina-simple/dest_hiluxsimple.jpg" alt="Toyota Hilux Cabina Simple" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div id="especificaciones" class="lg:col-span-6 space-y-6">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Fuerza Indestructible para el Trabajo
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    CaracterÃ­sticas
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Le presentamos la 8va. generaciÃ³n de la Pick Up emblema de la marca. Esta nueva versiÃ³n tiene un aspecto totalmente renovado y mÃ¡s moderno, mayor rendimiento y gran confort, para todo tipo de uso, tanto para la ciudad como para el trabajo pesado y uso Off-Road.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Motor</span>
                        <strong class="text-lg font-semibold text-slate-900">2.4 Diesel</strong>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Tipo CC</span>
                        <strong class="text-lg font-semibold text-slate-900">4 Cil. Twin Cam 16v</strong>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Potencia MÃ¡xima</span>
                        <strong class="text-lg font-semibold text-slate-900">110 kW (147 HP) / 3400</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. GALERÃA ================= -->
<!-- ================= GALERÃA FOTOGRÃFICA (ESTILO LEXUS) ================= -->
<script>
window.toyotaGallery_hilux_cabina_simple = function() {
    return {
        activeTab: ''todos'',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/hilux-cabina-simple/hiluxsimple.jpg","category":"exterior"},{"image":"/images/vehicles/hilux-cabina-simple/simple1.jpg","category":"exterior"},{"image":"/images/vehicles/hilux-cabina-simple/simple3.jpg","category":"exterior"},{"image":"/images/vehicles/hilux-cabina-simple/simple2.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === ''todos'') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '''').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '''', caption: '''', category: '''' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById(''toyota_thumb_hilux_cabina_simple_'' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: ''smooth'', block: ''nearest'', inline: ''center'' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_hilux_cabina_simple()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con tÃ­tulo y pestaÃ±as interactivas estilo Lexus UX -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    GalerÃ­a
                </h2>
            </div>

            <!-- PestaÃ±as de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab(''todos'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''todos'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab(''exterior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''exterior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab(''interior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''interior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato CinemÃ¡tico) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de ImÃ¡genes con transiciÃ³n suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + ''_'' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? ''opacity-100 z-10'' : ''opacity-0 z-0 pointer-events-none''"
                    >
                        <img 
                            :src="item.image" 
                            :alt="''Foto '' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- BotÃ³n Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de CategorÃ­a -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''TOYOTA'')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, ''0'')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, ''0'')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de NavegaciÃ³n Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="''thumb_'' + idx">
                    <button 
                        type="button"
                        :id="''toyota_thumb_hilux_cabina_simple_'' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? ''border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md'' 
                            : ''border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400''"
                        :title="''Foto '' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="''Foto '' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Hilux Cabina Simple Â· <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''GALERÃA'')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en ProporciÃ³n Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="''Foto '' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + '' / '' + filteredItems.length"></span>
            <span class="hidden sm:inline">NavegÃ¡ con las flechas &larr; &rarr; o deslizÃ¡ con el dedo</span>
        </div>
    </div>
</section>', '[{"name": "Hero Slide Hilux Cabina Simple", "path": "images/vehicles/hilux-cabina-simple/slide_hiluxcabsimple.jpg"}, {"name": "Portada CatÃ¡logo Hilux Simple", "path": "images/vehicles/hilux-cabina-simple/home_simple.png"}, {"name": "Destacado Hilux Cabina Simple", "path": "images/vehicles/hilux-cabina-simple/dest_hiluxsimple.jpg"}, {"name": "GalerÃ­a Hilux Simple 1", "path": "images/vehicles/hilux-cabina-simple/hiluxsimple.jpg"}, {"name": "GalerÃ­a Hilux Simple 2", "path": "images/vehicles/hilux-cabina-simple/simple1.jpg"}, {"name": "GalerÃ­a Hilux Simple 3", "path": "images/vehicles/hilux-cabina-simple/simple2.jpg"}, {"name": "GalerÃ­a Hilux Simple 4", "path": "images/vehicles/hilux-cabina-simple/simple3.jpg"}]');
INSERT INTO public.vehicles VALUES (46, 'c924a618-2867-4b4d-a0d0-dfbfe669ad29', '0km', 1, 2, 1, 'RAV4', 'Limited 2.5L Hybrid 236 HP', 'rav4', 2026, NULL, NULL, false, NULL, 0, 'HÃ­brido', 'AutomÃ¡tica eCVT', 'AWD', '2.5L 4 cilindros (236 HP)', 5, NULL, NULL, NULL, 'La SUV que te impulsa a descubrir mÃ¡s', 'La nueva Toyota RAV4 combina diseÃ±o sofisticado, pantalla multimedia de 12,9", Toyota Safety Sense y un motor 2.5L de 236 HP.', NULL, NULL, false, true, true, 'disponible', 6, '2026-10-31 19:26:10', '2026-11-11 15:18:57', NULL, NULL, 'https://consur.com.py/wp-content/uploads/2026/07/Rav4-2026-CONSUR2026.pdf', 'https://www.youtube.com/watch?v=E2t_HL0UgGQ', 7, NULL, NULL, NULL, NULL, '["images/vehicles/rav4/Toyota-RAV4-TEASER-1.jpg", "images/vehicles/rav4/TOYOTA-RAV4-13.jpg"]', '<!-- ================= 1. LA SUV QUE TE IMPULSA A DESCUBRIR MÃS & TECNOLOGÃA ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <!-- Bloque 1 -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Nueva GeneraciÃ³n 2026
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    La SUV que te impulsa a descubrir mÃ¡s
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    La nueva <strong>Toyota RAV4</strong> combina diseÃ±o sofisticado, tecnologÃ­a inteligente y un desempeÃ±o excepcional para acompaÃ±arte en cada desafÃ­o.
                </p>
            </div>
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/rav4/rav4-1.png" alt="Toyota RAV4 Limited" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
        </div>

        <!-- Bloque 2: TecnologÃ­a -->
        <div id="tecnologia" class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/rav4/rav4-2.png" alt="TecnologÃ­a Toyota RAV4" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Conectividad Inteligente
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    TecnologÃ­a que simplifica cada viaje
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    La experiencia a bordo incorpora avanzadas soluciones de conectividad y entretenimiento, permitiendo mantenerte siempre conectado. Su intuitivo sistema multimedia de <strong>12,9â€³</strong> con Apple CarPlayÂ® y Android AutoÂ® inalÃ¡mbricos, junto con mÃºltiples asistencias al conductor, hacen que cada recorrido sea mÃ¡s cÃ³modo y placentero.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. DISEÃ‘O EXTERIOR & INTERIOR ================= -->
<!-- ================= GALERÃA FOTOGRÃFICA (ESTILO LEXUS) ================= -->
<script>
window.toyotaGallery_rav4 = function() {
    return {
        activeTab: ''todos'',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/rav4/TOYOTA-RAV4-13.jpg","category":"exterior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-14.jpg","category":"exterior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-15.jpg","category":"exterior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-16.jpg","category":"exterior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-17.jpg","category":"exterior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-18.jpg","category":"exterior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-35.jpg","category":"interior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-36.jpg","category":"interior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-37.jpg","category":"interior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-38.jpg","category":"interior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-39.jpg","category":"interior"},{"image":"/images/vehicles/rav4/TOYOTA-RAV4-40.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === ''todos'') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '''').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '''', caption: '''', category: '''' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById(''toyota_thumb_rav4_'' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: ''smooth'', block: ''nearest'', inline: ''center'' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_rav4()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con tÃ­tulo y pestaÃ±as interactivas estilo Lexus UX -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    GalerÃ­a
                </h2>
            </div>

            <!-- PestaÃ±as de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab(''todos'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''todos'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab(''exterior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''exterior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab(''interior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''interior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato CinemÃ¡tico) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de ImÃ¡genes con transiciÃ³n suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + ''_'' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? ''opacity-100 z-10'' : ''opacity-0 z-0 pointer-events-none''"
                    >
                        <img 
                            :src="item.image" 
                            :alt="''Foto '' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- BotÃ³n Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de CategorÃ­a -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''TOYOTA'')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, ''0'')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, ''0'')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de NavegaciÃ³n Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="''thumb_'' + idx">
                    <button 
                        type="button"
                        :id="''toyota_thumb_rav4_'' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? ''border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md'' 
                            : ''border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400''"
                        :title="''Foto '' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="''Foto '' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota RAV4 Limited Hybrid Â· <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''GALERÃA'')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en ProporciÃ³n Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="''Foto '' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + '' / '' + filteredItems.length"></span>
            <span class="hidden sm:inline">NavegÃ¡ con las flechas &larr; &rarr; o deslizÃ¡ con el dedo</span>
        </div>
    </div>
</section>

<!-- ================= 3. SEGURIDAD TOYOTA SAFETY SENSE ================= -->
<section id="seguridad" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="max-w-3xl mx-auto text-center space-y-3">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Toyota Safety Sense</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                Seguridad
            </h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                Toyota Safety Sense asiste a la conducciÃ³n de modo a prevenir o mitigar los peligros aÃºn en situaciones de visibilidad complicada.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 text-center space-y-4 hover:shadow-lg transition">
                <img src="/images/vehicles/rav4/rav4-seguridad-1.png" alt="PCS Alerta de prevenciÃ³n de colisiÃ³n" class="w-full h-44 object-contain mx-auto rounded-2xl bg-white p-2 border border-slate-100">
                <h3 class="text-lg font-medium text-slate-900">PCS: Alerta de prevenciÃ³n de colisiÃ³n</h3>
            </div>
            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 text-center space-y-4 hover:shadow-lg transition">
                <img src="/images/vehicles/rav4/rav4-seguridad-2.png" alt="7 Airbags" class="w-full h-44 object-contain mx-auto rounded-2xl bg-white p-2 border border-slate-100">
                <h3 class="text-lg font-medium text-slate-900">7 Airbags</h3>
            </div>
            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 text-center space-y-4 hover:shadow-lg transition">
                <img src="/images/vehicles/rav4/rav4-seguridad-3.png" alt="ABS con EBD" class="w-full h-44 object-contain mx-auto rounded-2xl bg-white p-2 border border-slate-100">
                <h3 class="text-lg font-medium text-slate-900">ABS con EBD</h3>
            </div>
            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 text-center space-y-4 hover:shadow-lg transition">
                <img src="/images/vehicles/rav4/rav4-seguridad-3.png" alt="BSM Monitor de punto ciego" class="w-full h-44 object-contain mx-auto rounded-2xl bg-white p-2 border border-slate-100">
                <h3 class="text-lg font-medium text-slate-900">BSM: Monitor de punto ciego</h3>
            </div>
            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 text-center space-y-4 hover:shadow-lg transition">
                <img src="/images/vehicles/rav4/rav4-seguridad-5.png" alt="LDA Alerta de cambio de carril" class="w-full h-44 object-contain mx-auto rounded-2xl bg-white p-2 border border-slate-100">
                <h3 class="text-lg font-medium text-slate-900">LDA: Alerta de cambio de carril</h3>
            </div>
            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 text-center space-y-4 hover:shadow-lg transition">
                <img src="/images/vehicles/rav4/rav4-seguridad-6.png" alt="AHB Luces altas adaptativas" class="w-full h-44 object-contain mx-auto rounded-2xl bg-white p-2 border border-slate-100">
                <h3 class="text-lg font-medium text-slate-900">AHB: Luces altas adaptativas</h3>
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. PERFORMANCE & VIDEO ================= -->
<section id="desempeno" class="py-16 md:py-24 bg-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-500">Potencia HÃ­brida 236 HP</span>
            <h2 class="text-3xl sm:text-4xl font-light text-white font-heading">
                Performance
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="bg-slate-800/80 rounded-3xl p-6 sm:p-8 border border-slate-700 space-y-5">
                <img src="/images/vehicles/rav4/rav4-performance-1.png" alt="Performance Toyota RAV4" class="w-full h-64 object-cover rounded-2xl">
                <p class="text-base text-slate-300 leading-relaxed">
                    <strong>Performance preparado para cualquier desafÃ­o.</strong> La nueva Toyota RAV4 2026 combina potencia, eficiencia y respuesta inmediata para ofrecer una conducciÃ³n Ã¡gil y segura en todo tipo de caminos.
                </p>
            </div>
            <div class="bg-slate-800/80 rounded-3xl p-6 sm:p-8 border border-slate-700 space-y-5">
                <img src="/images/vehicles/rav4/rav4-performance-2.png" alt="Motor 2.5L 236 HP RAV4" class="w-full h-64 object-cover rounded-2xl">
                <p class="text-base text-slate-300 leading-relaxed">
                    Su motor <strong>2.5 litros de 4 cilindros entrega 236 HP</strong>, proporcionando una aceleraciÃ³n contundente y una excelente capacidad de respuesta tanto en ciudad como en ruta. Potencia inteligente para llegar mÃ¡s lejos, con la eficiencia y calidad que distinguen a Toyota.
                </p>
            </div>
        </div>

        <div id="video" class="max-w-5xl mx-auto pt-4 space-y-6 text-center">
            <h3 class="text-2xl font-medium uppercase font-heading text-white">Video Oficial</h3>
            <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-700 bg-black">
                <iframe loading="lazy" title="Video Toyota RAV4 2026" src="https://www.youtube.com/embed/E2t_HL0UgGQ" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

<!-- ================= 5. ESPECIFICACIONES ================= -->
<section id="especificaciones" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-slate-50 rounded-3xl p-6 sm:p-12 border border-slate-200/80">
            <div class="lg:col-span-6 space-y-6">
                <div class="space-y-2">
                    <span class="text-xs font-medium uppercase tracking-widest text-red-600">Ficha Destacada</span>
                    <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                        Especificaciones RAV4 2026
                    </h2>
                </div>

                <ul class="space-y-3 text-sm sm:text-base text-slate-700">
                    <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span><strong>Motor 2.5L de 236 HP</strong> con transmisiÃ³n automÃ¡tica eCVT.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Modos de conducciÃ³n: <strong>NORMAL, ECO, SPORT, SNOW, TRAIL y EV</strong>.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Pantalla multimedia de <strong>12,9â€³</strong> con Apple CarPlayÂ® y Android AutoÂ® inalÃ¡mbricos.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Tablero digital de <strong>12,3â€³</strong> y climatizador automÃ¡tico bi-zona.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Faros delanteros y traseros <strong>Full LED</strong> de nuevo diseÃ±o.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Sensores de estacionamiento delanteros y traseros.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Apertura elÃ©ctrica de baulera con <strong>Kick Sensor</strong>.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Plataforma <strong>TNGA</strong> para mayor estabilidad, confort y eficiencia.</span></li>
                </ul>

                <div class="pt-2">
                    <a href="https://consur.com.py/wp-content/uploads/2026/07/Rav4-2026-CONSUR2026.pdf" target="_blank"
                       class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                        <i class="fas fa-file-pdf"></i>
                        <span>Descargar Brochure</span>
                    </a>
                </div>
            </div>
            <div class="lg:col-span-6">
                <img src="/images/vehicles/rav4/especificaciones.png" alt="Dimensiones y Especificaciones RAV4" class="w-full h-auto rounded-2xl object-contain mx-auto bg-white p-4 border border-slate-200/80 shadow-xs">
            </div>
        </div>
    </div>
</section>', '[{"name": "Hero RAV4 Limited", "path": "images/vehicles/rav4/Toyota-RAV4-TEASER-1.jpg"}, {"name": "Portada CatÃ¡logo RAV4", "path": "images/vehicles/rav4/home_rav4limited.png"}, {"name": "DiseÃ±o RAV4 1", "path": "images/vehicles/rav4/rav4-1.png"}, {"name": "TecnologÃ­a RAV4 2", "path": "images/vehicles/rav4/rav4-2.png"}, {"name": "PCS Alerta Pre-ColisiÃ³n", "path": "images/vehicles/rav4/rav4-seguridad-1.png"}, {"name": "7 Airbags", "path": "images/vehicles/rav4/rav4-seguridad-2.png"}, {"name": "ABS con EBD / BSM", "path": "images/vehicles/rav4/rav4-seguridad-3.png"}, {"name": "LDA Alerta Cambio Carril", "path": "images/vehicles/rav4/rav4-seguridad-5.png"}, {"name": "AHB Luces Altas Adaptativas", "path": "images/vehicles/rav4/rav4-seguridad-6.png"}, {"name": "Performance 1", "path": "images/vehicles/rav4/rav4-performance-1.png"}, {"name": "Performance 2", "path": "images/vehicles/rav4/rav4-performance-2.png"}, {"name": "Especificaciones RAV4", "path": "images/vehicles/rav4/especificaciones.png"}, {"name": "Exterior RAV4 1", "path": "images/vehicles/rav4/TOYOTA-RAV4-13.jpg"}, {"name": "Exterior RAV4 2", "path": "images/vehicles/rav4/TOYOTA-RAV4-14.jpg"}, {"name": "Exterior RAV4 3", "path": "images/vehicles/rav4/TOYOTA-RAV4-15.jpg"}, {"name": "Exterior RAV4 4", "path": "images/vehicles/rav4/TOYOTA-RAV4-16.jpg"}, {"name": "Exterior RAV4 5", "path": "images/vehicles/rav4/TOYOTA-RAV4-17.jpg"}, {"name": "Exterior RAV4 6", "path": "images/vehicles/rav4/TOYOTA-RAV4-18.jpg"}, {"name": "Interior RAV4 1", "path": "images/vehicles/rav4/TOYOTA-RAV4-35.jpg"}, {"name": "Interior RAV4 2", "path": "images/vehicles/rav4/TOYOTA-RAV4-36.jpg"}, {"name": "Interior RAV4 3", "path": "images/vehicles/rav4/TOYOTA-RAV4-37.jpg"}, {"name": "Interior RAV4 4", "path": "images/vehicles/rav4/TOYOTA-RAV4-38.jpg"}, {"name": "Interior RAV4 5", "path": "images/vehicles/rav4/TOYOTA-RAV4-39.jpg"}, {"name": "Interior RAV4 6", "path": "images/vehicles/rav4/TOYOTA-RAV4-40.jpg"}]');
INSERT INTO public.vehicles VALUES (51, '5775412e-4620-42c2-a602-dde9aa36b376', '0km', 1, 10, 1, 'Hiace', 'AutomÃ¡tico Diesel', 'hiace', 2026, NULL, NULL, false, NULL, 0, 'Diesel', 'AutomÃ¡tica', '4x2', 'Diesel 4 cilindros en lÃ­nea', 5, NULL, NULL, NULL, 'El mejor aliado para evolucionar tu negocio', 'El nuevo Toyota Hiace es un vehÃ­culo amplio, sumamente versÃ¡til y de una alta funcionalidad diseÃ±ado para emprendedores.', NULL, NULL, false, true, false, 'disponible', 13, '2026-10-31 19:26:10', '2026-11-11 15:18:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '["images/vehicles/hiace/slider_hiace.jpg"]', '<!-- ================= 1. EL MEJOR ALIADO PARA EVOLUCIONAR ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50 p-6 flex items-center justify-center">
                    <img src="/images/vehicles/hiace/hiace1.png" alt="Toyota Hiace El mejor aliado para evolucionar" class="w-full h-full object-contain hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    PotenciÃ¡ tu Negocio
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    El mejor aliado para evolucionar
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    El nuevo <strong>Toyota Hiace</strong> es un vehÃ­culo amplio, sumamente versÃ¡til y de una alta funcionalidad. DiseÃ±ado para emprendedores y empresas que necesitan una mÃ¡quina de transporte confiable, perfecta para alcanzar los objetivos de su negocio.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. MODELOS ================= -->
<section id="modelos" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">VersiÃ³n Disponible</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                Modelos
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center bg-white rounded-3xl p-8 sm:p-12 border border-slate-200/90 shadow-xs">
            <div class="lg:col-span-6 bg-slate-50 rounded-2xl p-6 border border-slate-100 flex items-center justify-center">
                <img src="/images/vehicles/hiace/hiaceblanco.png" alt="Toyota Hiace AutomÃ¡tico" class="w-full max-w-md object-contain">
            </div>
            <div class="lg:col-span-6 space-y-5">
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    Hiace AutomÃ¡tico
                </h3>
                <ul class="space-y-3 text-base text-slate-700">
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Motor de <strong>4 cilindros en lÃ­nea</strong></span></li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Combustible <strong>Diesel</strong> de alto rendimiento</span></li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Frenos a <strong>disco ventilado delantero</strong></span></li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-[#b31f26]"></i><span><strong>SuspensiÃ³n MacPherson delantera</strong> para mÃ¡ximo confort de marcha</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. GALERÃA ================= -->
<!-- ================= GALERÃA FOTOGRÃFICA (ESTILO LEXUS) ================= -->
<script>
window.toyotaGallery_hiace = function() {
    return {
        activeTab: ''todos'',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/hiace/hiace-1.jpg","category":"exterior"},{"image":"/images/vehicles/hiace/hiace-2.jpg","category":"exterior"},{"image":"/images/vehicles/hiace/hiace-3.jpg","category":"exterior"},{"image":"/images/vehicles/hiace/hiace-4.jpg","category":"exterior"},{"image":"/images/vehicles/hiace/hiace-5.jpg","category":"interior"},{"image":"/images/vehicles/hiace/hiace-6.jpg","category":"interior"},{"image":"/images/vehicles/hiace/hiace-7.jpg","category":"interior"},{"image":"/images/vehicles/hiace/hiace-8.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === ''todos'') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '''').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '''', caption: '''', category: '''' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById(''toyota_thumb_hiace_'' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: ''smooth'', block: ''nearest'', inline: ''center'' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_hiace()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con tÃ­tulo y pestaÃ±as interactivas estilo Lexus UX -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    GalerÃ­a
                </h2>
            </div>

            <!-- PestaÃ±as de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab(''todos'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''todos'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab(''exterior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''exterior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab(''interior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''interior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato CinemÃ¡tico) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de ImÃ¡genes con transiciÃ³n suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + ''_'' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? ''opacity-100 z-10'' : ''opacity-0 z-0 pointer-events-none''"
                    >
                        <img 
                            :src="item.image" 
                            :alt="''Foto '' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- BotÃ³n Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de CategorÃ­a -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''TOYOTA'')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, ''0'')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, ''0'')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de NavegaciÃ³n Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="''thumb_'' + idx">
                    <button 
                        type="button"
                        :id="''toyota_thumb_hiace_'' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? ''border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md'' 
                            : ''border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400''"
                        :title="''Foto '' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="''Foto '' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Hiace Â· <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''GALERÃA'')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en ProporciÃ³n Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="''Foto '' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + '' / '' + filteredItems.length"></span>
            <span class="hidden sm:inline">NavegÃ¡ con las flechas &larr; &rarr; o deslizÃ¡ con el dedo</span>
        </div>
    </div>
</section>', '[{"name": "Hero Slide Hiace", "path": "images/vehicles/hiace/slider_hiace.jpg"}, {"name": "Portada CatÃ¡logo Hiace", "path": "images/vehicles/hiace/home_hiace.png"}, {"name": "Destacado Hiace", "path": "images/vehicles/hiace/hiace1.png"}, {"name": "Modelo Hiace Blanco", "path": "images/vehicles/hiace/hiaceblanco.png"}, {"name": "GalerÃ­a Hiace 1", "path": "images/vehicles/hiace/hiace-1.jpg"}, {"name": "GalerÃ­a Hiace 2", "path": "images/vehicles/hiace/hiace-2.jpg"}, {"name": "GalerÃ­a Hiace 3", "path": "images/vehicles/hiace/hiace-3.jpg"}, {"name": "GalerÃ­a Hiace 4", "path": "images/vehicles/hiace/hiace-4.jpg"}, {"name": "GalerÃ­a Hiace 5", "path": "images/vehicles/hiace/hiace-5.jpg"}, {"name": "GalerÃ­a Hiace 6", "path": "images/vehicles/hiace/hiace-6.jpg"}, {"name": "GalerÃ­a Hiace 7", "path": "images/vehicles/hiace/hiace-7.jpg"}, {"name": "GalerÃ­a Hiace 8", "path": "images/vehicles/hiace/hiace-8.jpg"}]');
INSERT INTO public.vehicles VALUES (42, 'bd420580-584f-4732-85b2-67e8b6bfd488', '0km', 1, 2, 1, 'Rush', '1.5 Dual VVT-i (MecÃ¡nica / AutomÃ¡tica)', 'rush', 2026, NULL, NULL, false, NULL, 0, 'Nafta', 'AutomÃ¡tica / MecÃ¡nica', '4x2 Trasera', '1.5L Dual VVT-i (2NR-VE)', 5, NULL, NULL, NULL, 'Estilo Ãšnico y Sofisticado', 'La Toyota Rush estÃ¡ preparada para llevarte por cualquier camino con capacidad para 7 pasajeros, tracciÃ³n trasera y 6 bolsas de aire.', NULL, NULL, false, true, false, 'disponible', 11, '2026-10-31 19:26:10', '2026-11-11 19:55:04', NULL, NULL, 'https://toyota.com.py/pdf/rush.pdf', 'https://www.youtube.com/watch?v=lGx3T3CycLU', 6, NULL, NULL, NULL, NULL, '["images/vehicles/rush/slider_rush.jpg"]', '<!-- ================= 1. ESTILO ÃšNICO Y SOFISTICADO ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/rush/rush1.jpg" alt="Estilo Ãšnico y Sofisticado Toyota Rush" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    SUV para 7 Pasajeros
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    Estilo Ãšnico y Sofisticado
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    La <strong>Toyota Rush</strong> estÃ¡ preparada para llevarte por cualquier camino. Ofrece a sus usuarios configuraciones de <strong>7 pasajeros</strong>, asientos abatibles para mayor carga, potente sistema de frenos ABS y asistencia electrÃ³nica completa.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Viene equipada con cierre elÃ©ctrico automÃ¡tico de sus 5 puertas cuando el vehÃ­culo alcanza una velocidad de 20 km/h, ademÃ¡s de un diseÃ±o innovador y moderno que combina una sensaciÃ³n de estabilidad y estilo. DiseÃ±o frontal aventurero sin dejar de lado lo mÃ¡s importante: la seguridad, uno de los pilares fundamentales de la marca.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. DESEMPEÃ‘O Y CONFORT INTERIOR ================= -->
<section id="interior" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Rendimiento &amp; Confort
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    Motor 1.5 Dual VVT-i y Confort para Todos
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Su econÃ³mico motor de <strong>1.5L Dual VVT-i</strong> presenta un sistema que optimiza continuamente el tiempo de operaciÃ³n de la vÃ¡lvula de admisiÃ³n y escape de acuerdo con las condiciones de manejo para proporcionar un alto rendimiento. La disposiciÃ³n de <strong>tracciÃ³n trasera</strong> le permite a la Toyota Rush tener un desempeÃ±o mejorado en las subidas, disponible en dos versiones: mecÃ¡nica y automÃ¡tica.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    En confort encontramos mÃºltiples tomas de 12V para mantener los celulares con carga en cualquier momento, una amplia guantera, mandos al volante, botÃ³n <strong>Push to Start</strong> y acondicionador de aire independiente para los 7 pasajeros.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-white">
                    <img src="/images/vehicles/rush/rush2.jpg" alt="Confort e Interior Toyota Rush" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. SEGURIDAD ================= -->
<section id="seguridad" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-slate-50 rounded-3xl p-6 sm:p-12 border border-slate-200/80">
            <div class="lg:col-span-6">
                <div class="rounded-2xl overflow-hidden shadow-lg">
                    <img src="/images/vehicles/rush/rush3.jpg" alt="Seguridad Toyota Rush" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-5">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    ProtecciÃ³n Integral
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                    Seguridad Completa y VersÃ¡til
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    En cuanto a seguridad, <strong>sonar trasero y cÃ¡mara de retroceso</strong>, control de estabilidad (<strong>VSC</strong>), frenos <strong>ABS</strong>, asistente de arranque en pendientes (<strong>HAC</strong>) y <strong>6 bolsas de aire</strong> hacen de esta SUV la mÃ¡s completa y versÃ¡til de su categorÃ­a.
                </p>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-2">
                    <div class="bg-white p-3.5 rounded-2xl border border-slate-200/80 text-center">
                        <strong class="block text-xl font-semibold text-[#b31f26]">6 Airbags</strong>
                        <span class="text-xs text-slate-500">ProtecciÃ³n total</span>
                    </div>
                    <div class="bg-white p-3.5 rounded-2xl border border-slate-200/80 text-center">
                        <strong class="block text-xl font-semibold text-[#b31f26]">VSC + HAC</strong>
                        <span class="text-xs text-slate-500">Estabilidad activa</span>
                    </div>
                    <div class="bg-white p-3.5 rounded-2xl border border-slate-200/80 text-center col-span-2 sm:col-span-1">
                        <strong class="block text-xl font-semibold text-[#b31f26]">CÃ¡mara + Sonar</strong>
                        <span class="text-xs text-slate-500">Retroceso seguro</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. VIDEO OFICIAL ================= -->
<section id="video" class="py-16 md:py-20 bg-slate-950 text-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
        <div class="space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-500">Multimedia Oficial</span>
            <h2 class="text-3xl sm:text-4xl font-light uppercase font-heading text-white">
                Videos
            </h2>
        </div>
        <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
            <iframe loading="lazy" title="Video Toyota Rush" src="https://www.youtube.com/embed/lGx3T3CycLU?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</section>

<!-- ================= 5. MODELOS ================= -->
<section id="modelos" class="py-16 md:py-24 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Versiones Disponibles</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                Modelos
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <!-- Rush Mec. 1.5 -->
            <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col justify-between space-y-6">
                <div class="space-y-5">
                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 flex items-center justify-center aspect-[16/10]">
                        <img src="/images/vehicles/rush/rush-mec.jpg" alt="Toyota Rush Mec. 1.5" class="max-h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading text-center">
                        Rush Mec. 1.5
                    </h3>
                    <ul class="space-y-2.5 text-sm sm:text-base text-slate-600">
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span><strong>DIS</strong> (Direct Ignition System)</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span><strong>SFI</strong> (Sequential Fuel Injection)</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>TransmisiÃ³n <strong>MecÃ¡nica de 5 velocidades</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span><strong>Motor 2NR-VE</strong> 1.5L Dual VVT-i</span></li>
                    </ul>
                </div>
                <a href="https://toyota.com.py/pdf/rush.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure</span>
                </a>
            </div>

            <!-- Rush AutomÃ¡tica -->
            <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col justify-between space-y-6">
                <div class="space-y-5">
                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 flex items-center justify-center aspect-[16/10]">
                        <img src="/images/vehicles/rush/rush-mec.jpg" alt="Toyota Rush AutomÃ¡tica" class="max-h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading text-center">
                        Rush AutomÃ¡tica
                    </h3>
                    <ul class="space-y-2.5 text-sm sm:text-base text-slate-600">
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span><strong>DIS</strong> (Direct Ignition System)</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span><strong>SFI</strong> (Sequential Fuel Injection)</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>TransmisiÃ³n <strong>AutomÃ¡tica (4 velocidades)</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Combustible <strong>Gasolina / Nafta</strong></span></li>
                    </ul>
                </div>
                <a href="https://toyota.com.py/pdf/rush.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ================= 6. GALERÃA ================= -->
<!-- ================= GALERÃA FOTOGRÃFICA (ESTILO LEXUS) ================= -->
<script>
window.toyotaGallery_rush = function() {
    return {
        activeTab: ''todos'',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/rush/rush-1.jpg","category":"exterior"},{"image":"/images/vehicles/rush/rush-2.jpg","category":"exterior"},{"image":"/images/vehicles/rush/rush-3.jpg","category":"exterior"},{"image":"/images/vehicles/rush/rush-7.jpg","category":"exterior"},{"image":"/images/vehicles/rush/rush-4.jpg","category":"interior"},{"image":"/images/vehicles/rush/rush-5.jpg","category":"interior"},{"image":"/images/vehicles/rush/rush-6.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === ''todos'') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '''').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '''', caption: '''', category: '''' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById(''toyota_thumb_rush_'' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: ''smooth'', block: ''nearest'', inline: ''center'' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_rush()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con tÃ­tulo y pestaÃ±as interactivas estilo Lexus UX -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    GalerÃ­a
                </h2>
            </div>

            <!-- PestaÃ±as de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab(''todos'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''todos'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab(''exterior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''exterior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab(''interior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''interior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato CinemÃ¡tico) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de ImÃ¡genes con transiciÃ³n suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + ''_'' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? ''opacity-100 z-10'' : ''opacity-0 z-0 pointer-events-none''"
                    >
                        <img 
                            :src="item.image" 
                            :alt="''Foto '' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- BotÃ³n Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de CategorÃ­a -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''TOYOTA'')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, ''0'')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, ''0'')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de NavegaciÃ³n Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="''thumb_'' + idx">
                    <button 
                        type="button"
                        :id="''toyota_thumb_rush_'' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? ''border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md'' 
                            : ''border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400''"
                        :title="''Foto '' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="''Foto '' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Rush Â· <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''GALERÃA'')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en ProporciÃ³n Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="''Foto '' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + '' / '' + filteredItems.length"></span>
            <span class="hidden sm:inline">NavegÃ¡ con las flechas &larr; &rarr; o deslizÃ¡ con el dedo</span>
        </div>
    </div>
</section>', '[{"name": "Hero Slide Rush", "path": "images/vehicles/rush/slider_rush.jpg"}, {"name": "Portada CatÃ¡logo Rush", "path": "images/vehicles/rush/home_rush.png"}, {"name": "Estilo Ãšnico Rush 1", "path": "images/vehicles/rush/rush1.jpg"}, {"name": "Confort e Interior Rush 2", "path": "images/vehicles/rush/rush2.jpg"}, {"name": "Seguridad Rush 3", "path": "images/vehicles/rush/rush3.jpg"}, {"name": "Modelo Rush 1.5", "path": "images/vehicles/rush/rush-mec.jpg"}, {"name": "GalerÃ­a Rush 1", "path": "images/vehicles/rush/rush-1.jpg"}, {"name": "GalerÃ­a Rush 2", "path": "images/vehicles/rush/rush-2.jpg"}, {"name": "GalerÃ­a Rush 3", "path": "images/vehicles/rush/rush-3.jpg"}, {"name": "GalerÃ­a Rush 4", "path": "images/vehicles/rush/rush-4.jpg"}, {"name": "GalerÃ­a Rush 5", "path": "images/vehicles/rush/rush-5.jpg"}, {"name": "GalerÃ­a Rush 6", "path": "images/vehicles/rush/rush-6.jpg"}, {"name": "GalerÃ­a Rush 7", "path": "images/vehicles/rush/rush-7.jpg"}]');
INSERT INTO public.vehicles VALUES (50, '98744192-deaa-4e13-ab0c-9a787c93fb44', '0km', 1, 2, 1, 'Land Cruiser Prado', 'Luxury 2.8L AutomÃ¡tica 4x4', 'land-cruiser-prado', 2026, NULL, NULL, false, NULL, 0, 'Diesel', 'AutomÃ¡tica', '4x4', '2.8L Turbo Diesel (201 HP / 500 Nm)', 5, NULL, NULL, NULL, 'Regreso al origen: una leyenda 4x4 mÃ¡s viva que nunca', 'La nueva Land Cruiser Prado combina todo su encanto retro y actitud robusta 4x4 con pantalla de 12.3", Toyota Safety Sense y 8 airbags.', NULL, NULL, false, true, false, 'disponible', 10, '2026-10-31 19:26:10', '2026-11-11 15:18:57', NULL, NULL, 'https://www.toyota.com.py/vehiculo/new-land-cruiser-prado/assets/brochure-new-land-cruiser-prado.pdf', 'https://www.youtube.com/watch?v=XKLlP9gtScY', 8, NULL, NULL, NULL, NULL, '["images/vehicles/land-cruiser-prado/slideprado2025_1.jpg"]', '<!-- ================= 1. REGRESO AL ORIGEN, INTERIOR Y SEGURIDAD ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <!-- Bloque 1: Leyenda 4x4 -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/land-cruiser-prado/prado02.jpg" alt="Land Cruiser Prado Regreso al Origen" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Regreso al Origen
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    Una leyenda que dio la vuelta al mundo
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Cada lugar tiene su propia leyenda, pero solo hay una leyenda que ha dado vuelta al mundo entero: <strong>Land Cruiser Prado</strong>. Hoy su espÃ­ritu estÃ¡ mÃ¡s vivo que nunca en su nueva generaciÃ³n.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Su diseÃ±o moderno logra traer al presente todo su encanto retro y actitud robusta, consolidando su esencia 4Ã—4. Una prueba viviente de que una verdadera leyenda no se estanca en el tiempo. Equipada con <strong>llantas de aleaciÃ³n de 20â€³</strong>, luces altas automÃ¡ticas y adaptativas, y Ã³pticas con tecnologÃ­a Full LED.
                </p>
            </div>
        </div>

        <!-- Bloque 2: DiseÃ±o Interior -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Confort Excepcional
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    DiseÃ±o Interior Totalmente Renovado
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Con un diseÃ±o interior totalmente renovado, la nueva Land Cruiser Prado transmite una fuerte sensaciÃ³n de estabilidad, solidez y maniobrabilidad mientras mantiene un estilo elegante y versÃ¡til.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Adaptando tecnologÃ­as de vanguardia en su funcionalidad y con un diseÃ±o pensado para quienes usan el vehÃ­culo constantemente en su dÃ­a a dÃ­a, la nueva generaciÃ³n ofrece tanto al conductor como a los pasajeros un confort excepcional en todo momento.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/land-cruiser-prado/prado03.jpg" alt="Interior Land Cruiser Prado" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
        </div>

        <!-- Bloque 3: Seguridad -->
        <div id="seguridad" class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/land-cruiser-prado/prado3.jpg" alt="Seguridad Land Cruiser Prado" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Toyota Safety Sense + 8 Airbags
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    Seguridad de Vanguardia
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    En cuanto a seguridad, la Land Cruiser Prado estÃ¡ equipada con el nuevo paquete de seguridad <strong>Toyota Safety Sense</strong>:
                </p>
                <ul class="space-y-2.5 text-sm sm:text-base text-slate-700">
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span><strong>Asistente de pre-colisiÃ³n frontal</strong> y control de crucero adaptativo.</span></li>
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span><strong>Sistema de asistencia al mantenimiento de carril</strong> con correcciÃ³n activa de direcciÃ³n.</span></li>
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span><strong>Luces altas automÃ¡ticas y adaptativas</strong>.</span></li>
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Conjunto de <strong>8 airbags de serie</strong> sumados a la carrocerÃ­a con deformaciÃ³n progresiva.</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. VIDEO OFICIAL ================= -->
<section id="video" class="py-16 md:py-20 bg-slate-950 text-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
        <div class="space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-500">Multimedia Oficial</span>
            <h2 class="text-3xl sm:text-4xl font-light uppercase font-heading text-white">
                Videos
            </h2>
        </div>
        <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
            <iframe loading="lazy" title="Video Land Cruiser Prado" src="https://www.youtube.com/embed/XKLlP9gtScY?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</section>

<!-- ================= 3. MODELO LAND CRUISER PRADO LUXURY ================= -->
<section id="modelos" class="py-16 md:py-24 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-white rounded-3xl p-6 sm:p-12 border border-slate-200/80 shadow-xs">
            <div class="lg:col-span-6 text-center space-y-6">
                <img src="/images/vehicles/land-cruiser-prado/landcruisser2025.jpg" alt="Land Cruiser Prado Luxury" class="w-full h-auto rounded-2xl object-contain mx-auto">
                <a href="https://www.toyota.com.py/vehiculo/new-land-cruiser-prado/assets/brochure-new-land-cruiser-prado.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure</span>
                </a>
            </div>
            <div class="lg:col-span-6 space-y-6">
                <div class="space-y-2">
                    <span class="text-xs font-medium uppercase tracking-widest text-red-600">VersiÃ³n Oficial</span>
                    <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                        Land Cruiser PRADO Luxury
                    </h2>
                </div>

                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm sm:text-base text-slate-700">
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span><strong>Motor 2.8L Turbo Diesel</strong> â€“ AutomÃ¡tico</span></li>
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Potencia <strong>201 HP / 500 Nm</strong></span></li>
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Capacidad para <strong>7 pasajeros</strong></span></li>
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Aire acondicionado digital <strong>bi-zona</strong></span></li>
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Sistema de infoentretenimiento de <strong>12.3â€³</strong></span></li>
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span><strong>8 airbags</strong> de serie</span></li>
                    <li class="flex items-start gap-2.5 sm:col-span-2"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Modos de conducciÃ³n: <strong>SPORT S+ | SPORT S | NORMAL | CONFORT | ECO | A MEDIDA</strong></span></li>
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Velocidad crucero adaptativo y Pre-colisiÃ³n frontal</span></li>
                    <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Controles <strong>VSC / DAC / CRAWL</strong> y Cargador inalÃ¡mbrico</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. GALERÃA INTERIOR & EXTERIOR ================= -->
<!-- ================= GALERÃA FOTOGRÃFICA (ESTILO LEXUS) ================= -->
<script>
window.toyotaGallery_land_cruiser_prado = function() {
    return {
        activeTab: ''todos'',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/land-cruiser-prado/BBY0830.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-prado/BBY0850.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-prado/BBY0865.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-prado/BBY0868.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-prado/BBY0872.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-prado/BBY0880.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-prado/BBY0891.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-prado/BBY0908.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-prado/BBY0931.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-prado/BBY1100.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-prado/BBY1110.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-prado/BBY1117.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-prado/BBY1123.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-prado/BBY1130.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-prado/BBY1132.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-prado/BBY1145.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-prado/BBY1147.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-prado/BBY1159.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === ''todos'') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '''').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '''', caption: '''', category: '''' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById(''toyota_thumb_land_cruiser_prado_'' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: ''smooth'', block: ''nearest'', inline: ''center'' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_land_cruiser_prado()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con tÃ­tulo y pestaÃ±as interactivas estilo Lexus UX -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    GalerÃ­a
                </h2>
            </div>

            <!-- PestaÃ±as de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab(''todos'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''todos'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab(''exterior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''exterior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab(''interior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''interior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato CinemÃ¡tico) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de ImÃ¡genes con transiciÃ³n suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + ''_'' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? ''opacity-100 z-10'' : ''opacity-0 z-0 pointer-events-none''"
                    >
                        <img 
                            :src="item.image" 
                            :alt="''Foto '' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- BotÃ³n Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de CategorÃ­a -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''TOYOTA'')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, ''0'')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, ''0'')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de NavegaciÃ³n Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="''thumb_'' + idx">
                    <button 
                        type="button"
                        :id="''toyota_thumb_land_cruiser_prado_'' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? ''border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md'' 
                            : ''border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400''"
                        :title="''Foto '' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="''Foto '' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Land Cruiser Prado Â· <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''GALERÃA'')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en ProporciÃ³n Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="''Foto '' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + '' / '' + filteredItems.length"></span>
            <span class="hidden sm:inline">NavegÃ¡ con las flechas &larr; &rarr; o deslizÃ¡ con el dedo</span>
        </div>
    </div>
</section>', '[{"name": "Hero Slide Land Cruiser Prado 2025", "path": "images/vehicles/land-cruiser-prado/slideprado2025_1.jpg"}, {"name": "Portada CatÃ¡logo Prado", "path": "images/vehicles/land-cruiser-prado/home_landcruiserprado.png"}, {"name": "Leyenda Prado Exterior", "path": "images/vehicles/land-cruiser-prado/prado02.jpg"}, {"name": "DiseÃ±o Interior Prado", "path": "images/vehicles/land-cruiser-prado/prado03.jpg"}, {"name": "Seguridad Prado", "path": "images/vehicles/land-cruiser-prado/prado3.jpg"}, {"name": "Land Cruiser Prado Luxury", "path": "images/vehicles/land-cruiser-prado/landcruisser2025.jpg"}, {"name": "Interior Prado 1", "path": "images/vehicles/land-cruiser-prado/BBY1100.jpg"}, {"name": "Interior Prado 2", "path": "images/vehicles/land-cruiser-prado/BBY1110.jpg"}, {"name": "Interior Prado 3", "path": "images/vehicles/land-cruiser-prado/BBY1117.jpg"}, {"name": "Interior Prado 4", "path": "images/vehicles/land-cruiser-prado/BBY1123.jpg"}, {"name": "Interior Prado 5", "path": "images/vehicles/land-cruiser-prado/BBY1130.jpg"}, {"name": "Interior Prado 6", "path": "images/vehicles/land-cruiser-prado/BBY1132.jpg"}, {"name": "Interior Prado 7", "path": "images/vehicles/land-cruiser-prado/BBY1145.jpg"}, {"name": "Interior Prado 8", "path": "images/vehicles/land-cruiser-prado/BBY1147.jpg"}, {"name": "Interior Prado 9", "path": "images/vehicles/land-cruiser-prado/BBY1159.jpg"}, {"name": "Exterior Prado 1", "path": "images/vehicles/land-cruiser-prado/BBY0830.jpg"}, {"name": "Exterior Prado 2", "path": "images/vehicles/land-cruiser-prado/BBY0850.jpg"}, {"name": "Exterior Prado 3", "path": "images/vehicles/land-cruiser-prado/BBY0865.jpg"}, {"name": "Exterior Prado 4", "path": "images/vehicles/land-cruiser-prado/BBY0868.jpg"}, {"name": "Exterior Prado 5", "path": "images/vehicles/land-cruiser-prado/BBY0872.jpg"}, {"name": "Exterior Prado 6", "path": "images/vehicles/land-cruiser-prado/BBY0880.jpg"}, {"name": "Exterior Prado 7", "path": "images/vehicles/land-cruiser-prado/BBY0891.jpg"}, {"name": "Exterior Prado 8", "path": "images/vehicles/land-cruiser-prado/BBY0908.jpg"}, {"name": "Exterior Prado 9", "path": "images/vehicles/land-cruiser-prado/BBY0931.jpg"}]');
INSERT INTO public.vehicles VALUES (45, '6fa56bb4-3f18-4421-8ff3-6af20b9a3cee', '0km', 1, 4, 1, 'Agya', '1.0L CVT / MT', 'agya', 2026, NULL, NULL, false, NULL, 0, 'Nafta', 'AutomÃ¡tica CVT', '4x2', '1.0L 3 cilindros en lÃ­nea DOHC', 5, NULL, NULL, NULL, 'Moderno, urbano y eficiente: todo lo que soÃ±Ã¡s para tu primer 0 Km', 'DiseÃ±o moderno y dinÃ¡mico que combina funcionalidad, pantalla tÃ¡ctil de infoentretenimiento y mÃ¡xima eficiencia de combustible.', NULL, NULL, false, true, false, 'disponible', 6, '2026-10-31 19:26:10', '2026-11-11 15:18:57', NULL, NULL, 'https://consur.com.py/wp-content/uploads/2025/10/Agya_brochure.pdf', NULL, 2, NULL, NULL, NULL, NULL, '["images/vehicles/agya/agyaslide3.jpg"]', '<!-- ================= 1. DISEÃ‘O EXTERIOR ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <!-- DiseÃ±o Exterior -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/agya/agya1.jpg" alt="DiseÃ±o Exterior Toyota Agya" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Moderno Â· Urbano Â· Eficiente
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    DiseÃ±o Exterior
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    DiseÃ±o moderno y dinÃ¡mico que combina funcionalidad y estilo. Su estÃ©tica vanguardista estÃ¡ pensada para la vida urbana, destacando por sus lÃ­neas aerodinÃ¡micas que no solo le dan una apariencia deportiva, sino que tambiÃ©n mejoran la eficiencia.
                </p>
            </div>
        </div>

        <!-- Parrilla Frontal y Presencia -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="bg-slate-50 rounded-3xl p-6 sm:p-8 border border-slate-200/80 space-y-5">
                <div class="rounded-2xl overflow-hidden shadow-md aspect-[16/9]">
                    <img src="/images/vehicles/agya/agya2.jpg" alt="Parrilla Frontal Toyota Agya" class="w-full h-full object-cover">
                </div>
                <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Parrilla Frontal</h3>
                <p class="text-base text-slate-600 leading-relaxed">
                    La parrilla frontal robusta, junto con los faros LED afilados, le otorgan una mirada distintiva y audaz.
                </p>
            </div>

            <div class="bg-slate-50 rounded-3xl p-6 sm:p-8 border border-slate-200/80 space-y-5">
                <div class="rounded-2xl overflow-hidden shadow-md aspect-[16/9]">
                    <img src="/images/vehicles/agya/agya3.jpg" alt="Presencia Toyota Agya" class="w-full h-full object-cover">
                </div>
                <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Presencia</h3>
                <p class="text-base text-slate-600 leading-relaxed">
                    AdemÃ¡s, los detalles como las llantas de aleaciÃ³n y los espejos retrovisores con luces direccionales integradas elevan su presencia en la carretera.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. FRANJA OSCURA DE DETALLES EXTERIORES ================= -->
<section class="py-14 bg-[#1e232e] text-white shadow-inner">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
            <div class="flex flex-col items-center space-y-4 group">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/20 shadow-xl bg-white/10 flex items-center justify-center group-hover:scale-105 transition duration-300">
                    <img src="/images/vehicles/agya/agyallantas.jpg" alt="Llantas Toyota Agya" class="w-full h-full object-cover">
                </div>
                <p class="text-lg font-bold text-white">Llantas de AleaciÃ³n</p>
            </div>

            <div class="flex flex-col items-center space-y-4 group">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/20 shadow-xl bg-white/10 flex items-center justify-center group-hover:scale-105 transition duration-300">
                    <img src="/images/vehicles/agya/agyaluces.jpg" alt="Luces delanteras Toyota Agya" class="w-full h-full object-cover">
                </div>
                <p class="text-lg font-bold text-white">Luces delanteras LED</p>
            </div>

            <div class="flex flex-col items-center space-y-4 group">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/20 shadow-xl bg-white/10 flex items-center justify-center group-hover:scale-105 transition duration-300">
                    <img src="/images/vehicles/agya/agyaluces1.jpg" alt="Luces traseras Toyota Agya" class="w-full h-full object-cover">
                </div>
                <p class="text-lg font-bold text-white">Luces traseras</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. DISEÃ‘O INTERIOR & TABLERO ================= -->
<section id="interior" class="py-16 md:py-24 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="max-w-3xl mx-auto text-center space-y-3">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Comodidad Superior</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight">
                DiseÃ±o Interior
            </h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                El Agya te sorprenderÃ¡ con un interior espacioso y bien pensado. El espacio ha sido maximizado para ofrecer una comodidad superior tanto para el conductor como para los pasajeros.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs space-y-4">
                <img src="/images/vehicles/agya/agya-interior-01.jpg" alt="Espacio Interior Toyota Agya" class="w-full h-64 object-cover rounded-2xl">
                <p class="text-base text-slate-600 leading-relaxed">
                    Amplitud optimizada en ambas filas de asientos para disfrutar cada recorrido por la ciudad con total confort.
                </p>
            </div>
            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs space-y-4">
                <img src="/images/vehicles/agya/agya-interior-02.jpg" alt="Asientos ErgonÃ³micos Toyota Agya" class="w-full h-64 object-cover rounded-2xl">
                <p class="text-base text-slate-600 leading-relaxed">
                    Los asientos, con un diseÃ±o ergonÃ³mico, brindan un soporte excelente para los trayectos diarios.
                </p>
            </div>
        </div>

        <!-- Tablero -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-white rounded-3xl p-6 sm:p-10 shadow-xs border border-slate-200/80">
            <div class="lg:col-span-6">
                <img src="/images/vehicles/agya/agya-tablero.jpg" alt="Tablero Toyota Agya" class="w-full h-full object-cover rounded-2xl shadow-md">
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full">Conectividad Intuitiva</span>
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    Tablero y Multimedia
                </h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    El tablero de instrumentos, moderno y fÃ¡cil de leer, estÃ¡ complementado por una pantalla tÃ¡ctil de infoentretenimiento que te mantiene conectado y entretenido. Los materiales utilizados, robustos y con un acabado agradable al tacto, junto con la disposiciÃ³n intuitiva de los controles, hacen que cada viaje sea una experiencia placentera y sin complicaciones.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. SEGURIDAD ================= -->
<section id="seguridad" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-5 lg:order-1 order-2">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Tranquilidad en Todo Momento
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                    Seguridad
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    En el Toyota Agya, tu seguridad y la de tus acompaÃ±antes es una prioridad. Viene equipado con un conjunto de caracterÃ­sticas de seguridad activa y pasiva diseÃ±adas para protegerte en todo momento:
                </p>
                <ul class="space-y-3 text-sm sm:text-base text-slate-600">
                    <li class="flex items-start gap-3"><i class="fas fa-shield-alt text-[#b31f26] mt-1"></i><span><strong>Cinturones de seguridad de 3 puntos</strong> para todos los ocupantes.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-shield-alt text-[#b31f26] mt-1"></i><span><strong>Doble airbag frontal</strong> para conductor y pasajero.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-shield-alt text-[#b31f26] mt-1"></i><span><strong>Sistema de anclaje ISOFIX</strong> para la instalaciÃ³n segura de sillas para niÃ±os.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-shield-alt text-[#b31f26] mt-1"></i><span><strong>EBD (DistribuciÃ³n ElectrÃ³nica de la Fuerza de Frenado)</strong> que optimiza la fuerza de frenado en cada rueda.</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-shield-alt text-[#b31f26] mt-1"></i><span><strong>Frenos ABS (Sistema de Frenos Antibloqueo)</strong> que evitan el bloqueo de las ruedas durante una frenada de emergencia, permitiendo mantener el control.</span></li>
                </ul>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100">
                    <img src="/images/vehicles/agya/agya-seguridad.jpg" alt="Seguridad Toyota Agya" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 5. COLORES Y GALERÃA ================= -->
<!-- ================= GALERÃA FOTOGRÃFICA (ESTILO LEXUS) ================= -->
<script>
window.toyotaGallery_agya = function() {
    return {
        activeTab: ''todos'',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/agya/TOYOTA-AGYA-23.jpg","category":"exterior"},{"image":"/images/vehicles/agya/TOYOTA-AGYA-22.jpg","category":"exterior"},{"image":"/images/vehicles/agya/TOYOTA-AGYA-29.jpg","category":"exterior"},{"image":"/images/vehicles/agya/TOYOTA-AGYA-30.jpg","category":"exterior"},{"image":"/images/vehicles/agya/TOYOTA-AGYA-31.jpg","category":"exterior"},{"image":"/images/vehicles/agya/TOYOTA-AGYA-3.jpg","category":"interior"},{"image":"/images/vehicles/agya/TOYOTA-AGYA-16.jpg","category":"interior"},{"image":"/images/vehicles/agya/TOYOTA-AGYA-26.jpg","category":"interior"},{"image":"/images/vehicles/agya/TOYOTA-AGYA-43.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === ''todos'') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '''').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '''', caption: '''', category: '''' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById(''toyota_thumb_agya_'' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: ''smooth'', block: ''nearest'', inline: ''center'' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_agya()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con tÃ­tulo y pestaÃ±as interactivas estilo Lexus UX -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    GalerÃ­a
                </h2>
            </div>

            <!-- PestaÃ±as de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab(''todos'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''todos'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab(''exterior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''exterior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab(''interior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''interior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato CinemÃ¡tico) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de ImÃ¡genes con transiciÃ³n suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + ''_'' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? ''opacity-100 z-10'' : ''opacity-0 z-0 pointer-events-none''"
                    >
                        <img 
                            :src="item.image" 
                            :alt="''Foto '' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- BotÃ³n Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de CategorÃ­a -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''TOYOTA'')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, ''0'')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, ''0'')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de NavegaciÃ³n Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="''thumb_'' + idx">
                    <button 
                        type="button"
                        :id="''toyota_thumb_agya_'' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? ''border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md'' 
                            : ''border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400''"
                        :title="''Foto '' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="''Foto '' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Agya Â· <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''GALERÃA'')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en ProporciÃ³n Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="''Foto '' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + '' / '' + filteredItems.length"></span>
            <span class="hidden sm:inline">NavegÃ¡ con las flechas &larr; &rarr; o deslizÃ¡ con el dedo</span>
        </div>
    </div>
</section>

<!-- ================= 6. ESPECIFICACIONES ================= -->
<section id="especificaciones" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-slate-50 rounded-3xl p-6 sm:p-12 border border-slate-200/80">
            <div class="lg:col-span-6">
                <img src="/images/vehicles/agya/agyaespecificaciones.png" alt="Especificaciones Toyota Agya" class="w-full h-auto rounded-2xl object-contain mx-auto">
            </div>
            <div class="lg:col-span-6 space-y-6">
                <div class="space-y-2">
                    <span class="text-xs font-medium uppercase tracking-widest text-red-600">Especificaciones TÃ©cnicas</span>
                    <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                        Eficiencia y equilibrio
                    </h2>
                    <p class="text-base text-slate-600 leading-relaxed">
                        El corazÃ³n del Toyota Agya es su motor, diseÃ±ado para ser eficiente y confiable. El motor de 1.0 litro ofrece el equilibrio perfecto entre rendimiento y economÃ­a de combustible, ideal para la movilidad urbana.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="p-4 rounded-2xl bg-white border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Motor</span>
                        <strong class="text-base font-semibold text-slate-900">1.0L 3 cilindros en lÃ­nea DOHC</strong>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Potencia y Torque</span>
                        <strong class="text-base font-semibold text-slate-900">66 CV / 89 Nm a 4.400 rpm</strong>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">TransmisiÃ³n</span>
                        <strong class="text-base font-semibold text-slate-900">AutomÃ¡tica CVT / Manual</strong>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">DirecciÃ³n</span>
                        <strong class="text-base font-semibold text-slate-900">Asistida electrÃ³nicamente</strong>
                    </div>
                </div>

                <div class="pt-2">
                    <a href="https://consur.com.py/wp-content/uploads/2025/10/Agya_brochure.pdf" target="_blank"
                       class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                        <i class="fas fa-file-pdf"></i>
                        <span>Descargar Brochure</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>', '[{"name": "Hero Slide Agya", "path": "images/vehicles/agya/agyaslide3.jpg"}, {"name": "Portada CatÃ¡logo Agya", "path": "images/vehicles/agya/home_agya.png"}, {"name": "DiseÃ±o Exterior Agya", "path": "images/vehicles/agya/agya1.jpg"}, {"name": "Parrilla Frontal Agya", "path": "images/vehicles/agya/agya2.jpg"}, {"name": "Presencia Agya", "path": "images/vehicles/agya/agya3.jpg"}, {"name": "Llantas Agya", "path": "images/vehicles/agya/agyallantas.jpg"}, {"name": "Luces Delanteras", "path": "images/vehicles/agya/agyaluces.jpg"}, {"name": "Luces Traseras", "path": "images/vehicles/agya/agyaluces1.jpg"}, {"name": "Interior Agya 1", "path": "images/vehicles/agya/agya-interior-01.jpg"}, {"name": "Interior Agya 2", "path": "images/vehicles/agya/agya-interior-02.jpg"}, {"name": "Tablero Agya", "path": "images/vehicles/agya/agya-tablero.jpg"}, {"name": "Seguridad Agya", "path": "images/vehicles/agya/agya-seguridad.jpg"}, {"name": "Especificaciones Agya", "path": "images/vehicles/agya/agyaespecificaciones.png"}, {"name": "Color Gris Plata", "path": "images/vehicles/agya/agyagrisplata.png"}, {"name": "Color Naranja", "path": "images/vehicles/agya/agyanaranja.png"}, {"name": "Color Rojo", "path": "images/vehicles/agya/agyarojo.png"}, {"name": "Color Negro", "path": "images/vehicles/agya/agyanegro.png"}, {"name": "Color Gris Oscuro", "path": "images/vehicles/agya/agyagris.png"}, {"name": "Color Blanco", "path": "images/vehicles/agya/agyablanco.png"}, {"name": "GalerÃ­a Agya 1", "path": "images/vehicles/agya/TOYOTA-AGYA-23.jpg"}, {"name": "GalerÃ­a Agya 2", "path": "images/vehicles/agya/TOYOTA-AGYA-22.jpg"}, {"name": "GalerÃ­a Agya 3", "path": "images/vehicles/agya/TOYOTA-AGYA-29.jpg"}, {"name": "GalerÃ­a Agya 4", "path": "images/vehicles/agya/TOYOTA-AGYA-30.jpg"}, {"name": "GalerÃ­a Agya 5", "path": "images/vehicles/agya/TOYOTA-AGYA-31.jpg"}, {"name": "GalerÃ­a Agya 6", "path": "images/vehicles/agya/TOYOTA-AGYA-3.jpg"}, {"name": "GalerÃ­a Agya 7", "path": "images/vehicles/agya/TOYOTA-AGYA-16.jpg"}, {"name": "GalerÃ­a Agya 8", "path": "images/vehicles/agya/TOYOTA-AGYA-26.jpg"}, {"name": "GalerÃ­a Agya 9", "path": "images/vehicles/agya/TOYOTA-AGYA-43.jpg"}]');
INSERT INTO public.vehicles VALUES (48, '354461bf-640a-438b-a43a-f781299b89dc', '0km', 1, 2, 1, 'Land Cruiser 300', 'VX / GR-S 3.3L V6 Twin Turbo', 'land-cruiser-300', 2026, NULL, NULL, false, NULL, 0, 'Diesel', 'AutomÃ¡tica 10 velocidades', '4x4 Permanente TORSEN', '3.3L V6 Twin Turbo Diesel (301 HP)', 5, NULL, NULL, NULL, 'Una leyenda sobre ruedas: conducÃ­ el verdadero lujo de Toyota todos los dÃ­as', 'El Land Cruiser VX 300 supera todas las expectativas con su motor V6 Twin Turbo de 301 HP, transmisiÃ³n de 10 velocidades y paquete Toyota Safety Sense.', NULL, NULL, false, true, false, 'disponible', 12, '2026-10-31 19:26:10', '2026-11-11 15:18:57', NULL, NULL, 'https://www.toyota.com.py/pdf/vx-300.pdf', 'https://www.youtube.com/watch?v=Yna6mvIb_J0', 10, NULL, NULL, NULL, NULL, '["images/vehicles/land-cruiser-300/slide_vx300.jpg"]', '<!-- ================= 1. UNA LEYENDA SOBRE RUEDAS ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <div class="max-w-3xl mx-auto text-center space-y-4">
            <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                ConducÃ­ el verdadero lujo de Toyota todos los dÃ­as
            </span>
            <h2 class="text-3xl sm:text-5xl font-light text-[#b31f26] font-heading uppercase tracking-tight">
                Una Leyenda Sobre Ruedas
            </h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                El <strong>Land Cruiser VX 300</strong> con su nuevo diseÃ±o supera todas las expectativas. Su mayor confort y maniobrabilidad lo convierten en el nÃºmero uno en capacidad y distinciÃ³n, consolidando su estatus de leyenda.
            </p>
        </div>

        <!-- DiseÃ±o Interior -->
        <div id="interior" class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/land-cruiser-300/VX300interior.png" alt="DiseÃ±o Interior Land Cruiser 300" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full">Lujo &amp; Versatilidad</span>
                <h3 class="text-3xl sm:text-4xl font-medium text-[#b31f26] font-heading uppercase">
                    DiseÃ±o Interior
                </h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Elegante y acogedor, con materiales de la mÃ¡s alta calidad, el nuevo Land Cruiser ofrece mayor comodidad gracias a sus versÃ¡tiles configuraciones de asientos.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Viaje con estilo y lujo con hasta <strong>7 pasajeros</strong> y todo su equipaje.
                </p>
            </div>
        </div>

        <!-- DiseÃ±o Exterior -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full">Robustez Superior</span>
                <h3 class="text-3xl sm:text-4xl font-medium text-[#b31f26] font-heading uppercase">
                    DiseÃ±o Exterior
                </h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Cuenta con un sofisticado diseÃ±o exterior que representa robustez y durabilidad en un nivel superior.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Los faros delanteros <strong>Full LED</strong> y la parrilla se han elevado estratÃ©gicamente para reducir el riesgo de posibles daÃ±os en el manejo off-road.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/land-cruiser-300/VX300exterior.png" alt="DiseÃ±o Exterior Land Cruiser 300" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. MEJOR PERFORMANCE & VIDEOS ================= -->
<section id="desempeno" class="py-16 md:py-24 bg-slate-950 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-14">
        <div class="max-w-3xl mx-auto text-center space-y-4">
            <span class="text-xs font-medium uppercase tracking-widest text-red-500">V6 Twin Turbo Diesel Â· 301 HP</span>
            <h2 class="text-3xl sm:text-4xl font-light uppercase font-heading text-white">
                Mejor Performance
            </h2>
            <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                La nueva Land Cruiser 300 viene completamente renovada, con mejoras destinadas a optimizar por completo la performance de la camioneta logrando <strong>301 caballos de fuerza con un motor de 3.300 cc V6 Twin Turbo</strong>, optimizando su relaciÃ³n peso/potencia de manera extraordinaria.
            </p>
            <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                El nombre Â«Crucero en TierraÂ» no le fue dado en vano: en capacidades off-road cuenta con diferenciales delantero y trasero de tipo <strong>TORSEN</strong> tiempo completo, bloqueo de diferencial delantero, central y trasero, asistente de descenso en pendientes (<strong>DAC</strong>), <strong>Crawl Control System</strong>, Selector Multi-Terreno y <strong>Monitor Multi-Terreno 3D</strong>.
            </p>
        </div>

        <div id="video" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
                <iframe loading="lazy" title="Performance Land Cruiser 300" src="https://www.youtube.com/embed/Yna6mvIb_J0?start=1&feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
                <iframe loading="lazy" title="Off-Road Land Cruiser 300" src="https://www.youtube.com/embed/9BNmgbR819o?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. TOYOTA SAFETY SENSE ================= -->
<section id="seguridad" class="py-16 md:py-24 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="max-w-3xl mx-auto text-center space-y-4">
            <img src="/images/vehicles/land-cruiser-300/logo-safety.png" alt="Toyota Safety Sense" class="h-14 mx-auto object-contain">
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                Toyota Safety Sense
            </h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                Es un paquete de seguridad activa que incorpora un radar de ondas milimÃ©tricas y una cÃ¡mara monocular, capaz de detectar una variedad de peligros y alertar al conductor para evitar o mitigar accidentes.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs text-center space-y-4">
                <img src="/images/vehicles/land-cruiser-300/safety-circle-01.png" alt="PCS Pre-ColisiÃ³n" class="w-32 h-32 mx-auto rounded-full object-cover shadow-md">
                <h3 class="text-base font-medium text-[#b31f26] uppercase">Sistema Pre-ColisiÃ³n Frontal (PCS)</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Detecta la posibilidad de una colisiÃ³n con un vehÃ­culo y alerta al conductor con una alarma. Si el conductor no aplica los frenos, el sistema ayuda a evitar o mitigar los daÃ±os aplicando un frenado de emergencia.</p>
            </div>

            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs text-center space-y-4">
                <img src="/images/vehicles/land-cruiser-300/ida.png" alt="LDA Alerta de Cambio de Carril" class="w-32 h-32 mx-auto rounded-full object-cover shadow-md">
                <h3 class="text-base font-medium text-[#b31f26] uppercase">Alerta de Cambio de Carril (LDA)</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Detecta las lÃ­neas del carril para determinar la posiciÃ³n del vehÃ­culo. Si el conductor intenta dejar un carril sin activar la seÃ±al de giro, se emite una advertencia y brinda soporte en la correcciÃ³n de la direcciÃ³n.</p>
            </div>

            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs text-center space-y-4">
                <img src="/images/vehicles/land-cruiser-300/ida-1.png" alt="Asistencia de Mantenimiento de Carril" class="w-32 h-32 mx-auto rounded-full object-cover shadow-md">
                <h3 class="text-base font-medium text-[#b31f26] uppercase">Asistencia de Mantenimiento de Carril (LTA)</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Asiste activamente al volante para mantener el vehÃ­culo centrado dentro de su carril durante la conducciÃ³n en ruta con el control crucero activo.</p>
            </div>

            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs text-center space-y-4">
                <img src="/images/vehicles/land-cruiser-300/veloc-crucero.png" alt="Control de Velocidad Crucero Adaptativo" class="w-32 h-32 mx-auto rounded-full object-cover shadow-md">
                <h3 class="text-base font-medium text-[#b31f26] uppercase">Control de Velocidad Crucero Adaptativo (ACC)</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Mantiene automÃ¡ticamente una distancia segura entre los vehÃ­culos para alivianar la carga al conducir durante largos periodos en la ruta.</p>
            </div>

            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs text-center space-y-4 md:col-span-2 lg:col-span-2">
                <img src="/images/vehicles/land-cruiser-300/ahb.png" alt="Sistema de Luces Altas AutomÃ¡ticas" class="w-32 h-32 mx-auto rounded-full object-cover shadow-md">
                <h3 class="text-base font-medium text-[#b31f26] uppercase">Sistema de Luces Altas AutomÃ¡ticas (AHB)</h3>
                <p class="text-sm text-slate-600 leading-relaxed max-w-xl mx-auto">La cÃ¡mara de lente Ãºnico detecta la luz circundante durante la conducciÃ³n nocturna y cambia automÃ¡ticamente entre luces altas y bajas.</p>
            </div>
        </div>

        <!-- 4 Sistemas Adicionales -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 pt-4">
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-200/80 shadow-xs">
                <img src="/images/vehicles/land-cruiser-300/safety-sq-01.jpg" alt="Control de balanceo de trÃ¡iler" class="w-full h-40 object-cover">
                <div class="p-4 text-center"><strong class="text-sm font-bold text-slate-800">Control de balanceo de trÃ¡iler (TSC)</strong></div>
            </div>
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-200/80 shadow-xs">
                <img src="/images/vehicles/land-cruiser-300/neg.jpg" alt="Crawl Control System" class="w-full h-40 object-cover">
                <div class="p-4 text-center"><strong class="text-sm font-bold text-slate-800">Crawl Control System con asistencia de giro</strong></div>
            </div>
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-200/80 shadow-xs">
                <img src="/images/vehicles/land-cruiser-300/vsc.jpg" alt="Control de estabilidad VSC" class="w-full h-40 object-cover">
                <div class="p-4 text-center"><strong class="text-sm font-bold text-slate-800">Control de estabilidad (VSC)</strong></div>
            </div>
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-200/80 shadow-xs">
                <img src="/images/vehicles/land-cruiser-300/gr.jpg" alt="Alerta de punto ciego BSM" class="w-full h-40 object-cover">
                <div class="p-4 text-center"><strong class="text-sm font-bold text-slate-800">Alerta de punto ciego (BSM) (VersiÃ³n GR-S)</strong></div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. ESPECIFICACIONES LAND CRUISER 300 ================= -->
<section id="especificaciones" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-slate-50 rounded-3xl p-6 sm:p-12 border border-slate-200/80">
            <div class="lg:col-span-5 text-center space-y-6">
                <h2 class="text-3xl font-light text-[#b31f26] font-heading uppercase">Land Cruiser 300</h2>
                <img src="/images/vehicles/land-cruiser-300/landl300modelo.png" alt="Toyota Land Cruiser 300" class="w-full max-w-md mx-auto object-contain">
                <a href="https://www.toyota.com.py/pdf/vx-300.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure</span>
                </a>
            </div>
            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-2xl border border-slate-200/80 space-y-3">
                    <h3 class="text-lg font-medium text-[#b31f26] uppercase">Motor</h3>
                    <ul class="space-y-2 text-sm text-slate-700">
                        <li>â€¢ <strong>Cilindrada:</strong> 3.346 cmÂ³</li>
                        <li>â€¢ <strong>ConfiguraciÃ³n:</strong> V6 Twin Turbo Diesel</li>
                        <li>â€¢ <strong>DistribuciÃ³n:</strong> 24 vÃ¡lvulas DOHC</li>
                        <li>â€¢ <strong>Potencia:</strong> 301 HP</li>
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200/80 space-y-3">
                    <h3 class="text-lg font-medium text-[#b31f26] uppercase">TransmisiÃ³n</h3>
                    <ul class="space-y-2 text-sm text-slate-700">
                        <li>â€¢ <strong>Caja:</strong> AutomÃ¡tica de 10 velocidades</li>
                        <li>â€¢ <strong>TracciÃ³n:</strong> 4WD Permanente con triple bloqueo de diferencial</li>
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200/80 space-y-3 sm:col-span-2">
                    <h3 class="text-lg font-medium text-[#b31f26] uppercase">Dimensiones y Capacidades</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 text-sm text-slate-700">
                        <div><span class="text-xs text-slate-400 block">Largo</span><strong>4.950 mm</strong></div>
                        <div><span class="text-xs text-slate-400 block">Ancho</span><strong>1.980 mm</strong></div>
                        <div><span class="text-xs text-slate-400 block">Alto</span><strong>1.900 mm</strong></div>
                        <div><span class="text-xs text-slate-400 block">Distancia entre ejes</span><strong>2.850 mm</strong></div>
                        <div><span class="text-xs text-slate-400 block">Ãngulo Ataque / Salida</span><strong>32Â° / 26.5Â°</strong></div>
                        <div><span class="text-xs text-slate-400 block">Tanque Combustible</span><strong>80 L + 30 L subtanque</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 5. GALERÃA ================= -->
<!-- ================= GALERÃA FOTOGRÃFICA (ESTILO LEXUS) ================= -->
<script>
window.toyotaGallery_land_cruiser_300 = function() {
    return {
        activeTab: ''todos'',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/land-cruiser-300/1.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-300/2.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-300/3.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-300/4.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-300/5.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-300/6.jpg","category":"exterior"},{"image":"/images/vehicles/land-cruiser-300/7.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-300/8.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-300/9.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-300/10.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-300/11.jpg","category":"interior"},{"image":"/images/vehicles/land-cruiser-300/12.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === ''todos'') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '''').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '''', caption: '''', category: '''' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById(''toyota_thumb_land_cruiser_300_'' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: ''smooth'', block: ''nearest'', inline: ''center'' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_land_cruiser_300()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con tÃ­tulo y pestaÃ±as interactivas estilo Lexus UX -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    GalerÃ­a
                </h2>
            </div>

            <!-- PestaÃ±as de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab(''todos'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''todos'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab(''exterior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''exterior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab(''interior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''interior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato CinemÃ¡tico) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de ImÃ¡genes con transiciÃ³n suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + ''_'' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? ''opacity-100 z-10'' : ''opacity-0 z-0 pointer-events-none''"
                    >
                        <img 
                            :src="item.image" 
                            :alt="''Foto '' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- BotÃ³n Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de CategorÃ­a -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''TOYOTA'')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, ''0'')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, ''0'')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de NavegaciÃ³n Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="''thumb_'' + idx">
                    <button 
                        type="button"
                        :id="''toyota_thumb_land_cruiser_300_'' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? ''border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md'' 
                            : ''border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400''"
                        :title="''Foto '' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="''Foto '' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Land Cruiser 300 Â· <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''GALERÃA'')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en ProporciÃ³n Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="''Foto '' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + '' / '' + filteredItems.length"></span>
            <span class="hidden sm:inline">NavegÃ¡ con las flechas &larr; &rarr; o deslizÃ¡ con el dedo</span>
        </div>
    </div>
</section>', '[{"name": "Hero Slide Land Cruiser 300", "path": "images/vehicles/land-cruiser-300/slide_vx300.jpg"}, {"name": "Interior Land Cruiser 300", "path": "images/vehicles/land-cruiser-300/VX300interior.png"}, {"name": "Exterior Land Cruiser 300", "path": "images/vehicles/land-cruiser-300/VX300exterior.png"}, {"name": "Logo Toyota Safety Sense", "path": "images/vehicles/land-cruiser-300/logo-safety.png"}, {"name": "PCS Pre-ColisiÃ³n", "path": "images/vehicles/land-cruiser-300/safety-circle-01.png"}, {"name": "LDA Cambio de Carril", "path": "images/vehicles/land-cruiser-300/ida.png"}, {"name": "LTA Mantenimiento de Carril", "path": "images/vehicles/land-cruiser-300/ida-1.png"}, {"name": "ACC Velocidad Crucero", "path": "images/vehicles/land-cruiser-300/veloc-crucero.png"}, {"name": "AHB Luces Altas AutomÃ¡ticas", "path": "images/vehicles/land-cruiser-300/ahb.png"}, {"name": "TSC Control Balanceo TrÃ¡iler", "path": "images/vehicles/land-cruiser-300/safety-sq-01.jpg"}, {"name": "Crawl Control System", "path": "images/vehicles/land-cruiser-300/neg.jpg"}, {"name": "VSC Control de Estabilidad", "path": "images/vehicles/land-cruiser-300/vsc.jpg"}, {"name": "BSM Alerta Punto Ciego", "path": "images/vehicles/land-cruiser-300/gr.jpg"}, {"name": "Modelo Land Cruiser 300", "path": "images/vehicles/land-cruiser-300/landl300modelo.png"}, {"name": "GalerÃ­a LC300 1", "path": "images/vehicles/land-cruiser-300/1.jpg"}, {"name": "GalerÃ­a LC300 2", "path": "images/vehicles/land-cruiser-300/2.jpg"}, {"name": "GalerÃ­a LC300 3", "path": "images/vehicles/land-cruiser-300/3.jpg"}, {"name": "GalerÃ­a LC300 4", "path": "images/vehicles/land-cruiser-300/4.jpg"}, {"name": "GalerÃ­a LC300 5", "path": "images/vehicles/land-cruiser-300/5.jpg"}, {"name": "GalerÃ­a LC300 6", "path": "images/vehicles/land-cruiser-300/6.jpg"}, {"name": "GalerÃ­a LC300 7", "path": "images/vehicles/land-cruiser-300/7.jpg"}, {"name": "GalerÃ­a LC300 8", "path": "images/vehicles/land-cruiser-300/8.jpg"}, {"name": "GalerÃ­a LC300 9", "path": "images/vehicles/land-cruiser-300/9.jpg"}, {"name": "GalerÃ­a LC300 10", "path": "images/vehicles/land-cruiser-300/10.jpg"}, {"name": "GalerÃ­a LC300 11", "path": "images/vehicles/land-cruiser-300/11.jpg"}, {"name": "GalerÃ­a LC300 12", "path": "images/vehicles/land-cruiser-300/12.jpg"}]');
INSERT INTO public.vehicles VALUES (47, '5d04902a-bf6b-47c5-aeed-87f84b0a05fa', '0km', 1, 2, 1, 'Yaris Cross', 'CVT 1.5L / Hybrid 1.5L', 'yaris-cross', 2026, NULL, NULL, false, NULL, 0, 'HÃ­brido', 'AutomÃ¡tica CVT', '4x2', '1.5L 16v DOHC Dual-VVT-i (Nafta / HEV)', 5, NULL, NULL, NULL, 'DiseÃ±o imponente que destaca, tambiÃ©n en versiÃ³n HÃ­brida', 'El diseÃ±o del nuevo Toyota Yaris Cross cautiva todas las miradas con faros LED, pantalla HD de 10.1", 6 airbags y opciones 1.5L CVT o HÃ­brida.', NULL, NULL, false, true, true, 'disponible', 4, '2026-10-31 19:26:10', '2026-11-11 19:55:04', NULL, NULL, 'https://www.toyota.com.py/asset/pdf/download-brochures/catalogo-yaris-cross.pdf', 'https://www.youtube.com/watch?v=ODxlpU0y7yc', 6, NULL, NULL, NULL, NULL, '["images/vehicles/yaris-cross/SlideYariscross.jpg"]', '<!-- ================= 1. DISEÃ‘O EXTERIOR ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <!-- Bloque 1 -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/yaris-cross/yariscross-01.jpg" alt="DiseÃ±o imponente Toyota Yaris Cross" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    DiseÃ±o Exterior
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    DiseÃ±o imponente que destaca
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    El diseÃ±o del nuevo <strong>Toyota Yaris Cross</strong> cautivarÃ¡ todas las miradas. Los viajes se convertirÃ¡n en una experiencia sensorial y Ãºnica, con sus faros LED que resaltarÃ¡n aÃºn mÃ¡s su gran silueta.
                </p>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Las rejillas trapezoidales superior e inferior de diferentes tamaÃ±os expresan una postura deportiva y sÃ³lida.
                </p>
            </div>
        </div>

        <!-- Proporciones y Formas tridimensionales -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="bg-slate-50 rounded-3xl p-6 sm:p-8 border border-slate-200/80 space-y-5">
                <div class="rounded-2xl overflow-hidden shadow-md aspect-[16/10]">
                    <img src="/images/vehicles/yaris-cross/yariscross-04.jpg" alt="Proporciones Toyota Yaris Cross" class="w-full h-full object-cover">
                </div>
                <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Proporciones potentes que evocan un estilo de vida</h3>
                <ul class="space-y-2 text-slate-600">
                    <li class="flex items-center gap-2"><i class="fas fa-check text-[#b31f26]"></i><span>Techo con mayor altura, mucho mÃ¡s estilizado.</span></li>
                    <li class="flex items-center gap-2"><i class="fas fa-check text-[#b31f26]"></i><span>Cuerpo elegante con un interior largo.</span></li>
                    <li class="flex items-center gap-2"><i class="fas fa-check text-[#b31f26]"></i><span>Altura total voluminosa.</span></li>
                </ul>
            </div>

            <div class="bg-slate-50 rounded-3xl p-6 sm:p-8 border border-slate-200/80 space-y-5">
                <div class="rounded-2xl overflow-hidden shadow-md aspect-[16/10]">
                    <img src="/images/vehicles/yaris-cross/yariscross-02.jpg" alt="Formas tridimensionales Yaris Cross" class="w-full h-full object-cover">
                </div>
                <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Formas tridimensionales dinÃ¡micas y grandes superficies</h3>
                <ul class="space-y-2 text-slate-600">
                    <li class="flex items-center gap-2"><i class="fas fa-check text-[#b31f26]"></i><span>Parachoques con un mayor Ã¡ngulo de ataque.</span></li>
                    <li class="flex items-center gap-2"><i class="fas fa-check text-[#b31f26]"></i><span>Altura al piso elevada.</span></li>
                    <li class="flex items-center gap-2"><i class="fas fa-check text-[#b31f26]"></i><span>NeumÃ¡ticos de gran diÃ¡metro.</span></li>
                </ul>
            </div>
        </div>

        <!-- DiseÃ±o Trasero y Lateral -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-5">
                <div class="rounded-2xl overflow-hidden shadow-md aspect-[16/10]">
                    <img src="/images/vehicles/yaris-cross/disenotraseroyaris.jpg" alt="DiseÃ±o Trasero Yaris Cross" class="w-full h-full object-cover">
                </div>
                <h3 class="text-2xl font-medium text-[#b31f26] font-heading">DiseÃ±o Trasero</h3>
                <p class="text-base text-slate-600 leading-relaxed">
                    La cabina inclinada, combinada con los guardabarros ensanchados, expresa una silueta sÃ³lida y estable. El grÃ¡fico de las luces traseras combinadas atrae la atenciÃ³n hacia afuera para enfatizar el ancho.
                </p>
            </div>

            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-5">
                <div class="rounded-2xl overflow-hidden shadow-md aspect-[16/10]">
                    <img src="/images/vehicles/yaris-cross/disenolateralyaris.jpg" alt="DiseÃ±o Lateral Yaris Cross" class="w-full h-full object-cover">
                </div>
                <h3 class="text-2xl font-medium text-[#b31f26] font-heading">DiseÃ±o Lateral</h3>
                <p class="text-base text-slate-600 leading-relaxed">
                    La combinaciÃ³n de un cuerpo voluminoso con lÃ­neas de carÃ¡cter distintivas expresa un movimiento nÃ­tido y una impresiÃ³n sÃ³lida, elegante y sofisticada.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. FRANJA OSCURA DE DETALLES EXTERIORES ================= -->
<section class="py-14 bg-[#1e232e] text-white shadow-inner">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
            <div class="flex flex-col items-center space-y-4 group">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/20 shadow-xl bg-white/10 flex items-center justify-center group-hover:scale-105 transition duration-300">
                    <img src="/images/vehicles/yaris-cross/franjallantas.jpg" alt="Llantas de aleaciÃ³n 17 pulgadas" class="w-full h-full object-cover">
                </div>
                <p class="text-lg font-bold text-white">Llantas de aleaciÃ³n 17â€³ 215/60R17</p>
            </div>
            <div class="flex flex-col items-center space-y-4 group">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/20 shadow-xl bg-white/10 flex items-center justify-center group-hover:scale-105 transition duration-300">
                    <img src="/images/vehicles/yaris-cross/franjafaros.jpg" alt="Faros Delanteros" class="w-full h-full object-cover">
                </div>
                <p class="text-lg font-bold text-white">Faros Delanteros LED</p>
            </div>
            <div class="flex flex-col items-center space-y-4 group">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/20 shadow-xl bg-white/10 flex items-center justify-center group-hover:scale-105 transition duration-300">
                    <img src="/images/vehicles/yaris-cross/franjatraseros.jpg" alt="Faros Traseros" class="w-full h-full object-cover">
                </div>
                <p class="text-lg font-bold text-white">Faros Traseros LED</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. DISEÃ‘O INTERIOR, EQUIPAJE & TECNOLOGÃA ================= -->
<section id="interior" class="py-16 md:py-24 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="max-w-3xl mx-auto text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Confort &amp; SofisticaciÃ³n</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">DiseÃ±o Interior</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-3xl p-5 border border-slate-200/80 shadow-xs space-y-4">
                <img src="/images/vehicles/yaris-cross/interioryaris1.jpg" alt="Panel de instrumentos Yaris Cross" class="w-full h-44 object-cover rounded-2xl">
                <p class="text-sm text-slate-600 leading-relaxed">El panel de instrumentos delgado y ancho con acolchado suave crea una sensaciÃ³n de continuidad con el revestimiento de la puerta, expresando amplitud SUV.</p>
            </div>
            <div class="bg-white rounded-3xl p-5 border border-slate-200/80 shadow-xs space-y-4">
                <img src="/images/vehicles/yaris-cross/interioryaris2.jpg" alt="Cabina orientada al conductor" class="w-full h-44 object-cover rounded-2xl">
                <p class="text-sm text-slate-600 leading-relaxed">La cabina orientada al conductor otorga una imagen mucho mÃ¡s deportiva y elegante.</p>
            </div>
            <div class="bg-white rounded-3xl p-5 border border-slate-200/80 shadow-xs space-y-4">
                <img src="/images/vehicles/yaris-cross/interioryaris3.jpg" alt="Superficies suaves al tacto" class="w-full h-44 object-cover rounded-2xl">
                <p class="text-sm text-slate-600 leading-relaxed">Superficies suaves al tacto estÃ¡n disponibles para darle a todo el interior una sensaciÃ³n de alta calidad.</p>
            </div>
            <div class="bg-white rounded-3xl p-5 border border-slate-200/80 shadow-xs space-y-4">
                <img src="/images/vehicles/yaris-cross/interioryaris4.jpg" alt="OrnamentaciÃ³n de cabina" class="w-full h-44 object-cover rounded-2xl">
                <p class="text-sm text-slate-600 leading-relaxed">La ornamentaciÃ³n brillante y sedosa en el Ã¡rea de la cabina genera una atmÃ³sfera avanzada y de alta calidad.</p>
            </div>
        </div>

        <!-- Capacidad de Equipaje -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/80 shadow-xs">
            <div class="lg:col-span-6">
                <img src="/images/vehicles/yaris-cross/equipajeyaris.jpg" alt="Capacidad de Equipaje Yaris Cross" class="w-full h-full object-cover rounded-2xl shadow-md">
            </div>
            <div class="lg:col-span-6 space-y-4">
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">Capacidad de Equipaje</h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    El nuevo Yaris Cross tiene un excelente espacio para equipaje sin sacrificar la comodidad de los pasajeros traseros. Fue diseÃ±ado con el objetivo de equilibrar la usabilidad y la comodidad.
                </p>
                <div class="grid grid-cols-2 gap-4 pt-2">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Yaris Cross HV (HÃ­brido)</span>
                        <strong class="text-2xl font-semibold text-[#b31f26]">466 Litros</strong>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Yaris Cross CVT</span>
                        <strong class="text-2xl font-semibold text-[#b31f26]">471 Litros</strong>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pantalla 10.1" -->
        <div id="tecnologia" class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/80 shadow-xs">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full">Multimedia HD</span>
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">Pantalla 10.1â€³</h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Gran pantalla de alta definiciÃ³n para una fÃ¡cil visualizaciÃ³n y conectividad total:
                </p>
                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-sm sm:text-base text-slate-700">
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Apple CarPlay &amp; Android Auto</span></li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Control por voz</span></li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-[#b31f26]"></i><span>PresiÃ³n de neumÃ¡ticos</span></li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Ãngulo de inclinaciÃ³n</span></li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-[#b31f26]"></i><span>InformaciÃ³n de viaje (HEV)</span></li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Historial de consumo y Flujo HEV</span></li>
                </ul>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <img src="/images/vehicles/yaris-cross/pantallayaris.jpg" alt="Pantalla 10.1 pulgadas Yaris Cross" class="w-full h-full object-cover rounded-2xl shadow-md">
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. SEGURIDAD ================= -->
<section id="seguridad" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="max-w-3xl mx-auto text-center space-y-3">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">ProtecciÃ³n Activa y Pasiva</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">Seguridad</h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                El nuevo Toyota Yaris Cross viene equipado con tecnologÃ­a de seguridad que te permitirÃ¡ tener el control del vehÃ­culo en situaciones de riesgo, pensando en tu seguridad, en la de los ocupantes y peatones.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 space-y-4">
                <img src="/images/vehicles/yaris-cross/seguridadyaris1.jpg" alt="Seguridad Activa Yaris Cross" class="w-full h-48 object-cover rounded-2xl">
                <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Activa</h3>
                <ul class="space-y-2 text-sm text-slate-600">
                    <li>â€¢ <strong>ABS:</strong> Sistema de Frenos Antibloqueo.</li>
                    <li>â€¢ <strong>VSC + TRC:</strong> Control de Estabilidad del VehÃ­culo + Control de TracciÃ³n.</li>
                </ul>
            </div>

            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 space-y-4">
                <img src="/images/vehicles/yaris-cross/seguridadyaris2.jpg" alt="Seguridad Pasiva Yaris Cross" class="w-full h-48 object-cover rounded-2xl">
                <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Pasiva</h3>
                <ul class="space-y-2 text-sm text-slate-600">
                    <li>â€¢ <strong>6 Airbags:</strong> Frontales (2), laterales (2) y de cortina (2).</li>
                    <li>â€¢ <strong>Cinturones de Seguridad:</strong> De tres puntos con ELR para todos los ocupantes.</li>
                </ul>
            </div>

            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 space-y-4">
                <img src="/images/vehicles/yaris-cross/seguridadyaris3.jpg" alt="Estacionamiento Yaris Cross" class="w-full h-48 object-cover rounded-2xl">
                <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Estacionamiento</h3>
                <ul class="space-y-2 text-sm text-slate-600">
                    <li>â€¢ <strong>Monitor trasero</strong> de asistencia visual.</li>
                    <li>â€¢ <strong>2 Sonares de Proximidad Traseros</strong>.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ================= 5. DESEMPEÃ‘O & VIDEOS ================= -->
<section id="desempeno" class="py-16 md:py-24 bg-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="max-w-3xl mx-auto text-center space-y-3">
            <span class="text-xs font-medium uppercase tracking-widest text-red-400">Rendimiento HÃ­brido &amp; Naftero</span>
            <h2 class="text-3xl sm:text-4xl font-light text-white font-heading">DesempeÃ±o</h2>
            <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                El nuevo Toyota Yaris Cross tambiÃ©n estÃ¡ disponible en su versiÃ³n hÃ­brida, para un mejor rendimiento de combustible, mayor performance sin perder su potencia y emitiendo menos COâ‚‚.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-slate-800/80 rounded-3xl p-6 border border-slate-700 space-y-4 text-center">
                <img src="/images/vehicles/yaris-cross/desempenoyaris1.jpg" alt="Motor 2NR-VEX y transeje P910" class="w-full h-60 object-cover rounded-2xl">
                <p class="text-base font-bold text-white">Primera combinaciÃ³n del motor 2NR-VEX y del transeje P910.</p>
            </div>
            <div class="bg-slate-800/80 rounded-3xl p-6 border border-slate-700 space-y-4 text-center">
                <img src="/images/vehicles/yaris-cross/motor-02.jpg" alt="Menores emisiones de CO2" class="w-full h-60 object-cover rounded-2xl">
                <p class="text-base font-bold text-white">Menores emisiones de COâ‚‚ en el segmento.</p>
            </div>
        </div>

        <div id="video" class="space-y-8 pt-4">
            <h3 class="text-2xl sm:text-3xl font-medium uppercase font-heading text-center text-white">Videos Oficiales</h3>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="space-y-3">
                    <h4 class="text-lg font-medium text-slate-200 text-center">Yaris Cross CVT</h4>
                    <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-700 bg-black">
                        <iframe loading="lazy" title="Video Yaris Cross CVT" src="https://www.youtube.com/embed/ODxlpU0y7yc?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="space-y-3">
                    <h4 class="text-lg font-medium text-slate-200 text-center">Yaris Cross Hybrid</h4>
                    <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-700 bg-black">
                        <iframe loading="lazy" title="Video Yaris Cross Hybrid" src="https://www.youtube.com/embed/0FGeE8Y2z14?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 6. GALERÃA ================= -->
<!-- ================= GALERÃA FOTOGRÃFICA (ESTILO LEXUS) ================= -->
<script>
window.toyotaGallery_yaris_cross = function() {
    return {
        activeTab: ''todos'',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/yaris-cross/cvt1.jpg","category":"exterior"},{"image":"/images/vehicles/yaris-cross/cvt2.jpg","category":"exterior"},{"image":"/images/vehicles/yaris-cross/cvt3.jpg","category":"exterior"},{"image":"/images/vehicles/yaris-cross/hybrid1.jpg","category":"exterior"},{"image":"/images/vehicles/yaris-cross/hybrid2.jpg","category":"exterior"},{"image":"/images/vehicles/yaris-cross/hybrid3.jpg","category":"exterior"},{"image":"/images/vehicles/yaris-cross/cvt4.jpg","category":"interior"},{"image":"/images/vehicles/yaris-cross/cvt5.jpg","category":"interior"},{"image":"/images/vehicles/yaris-cross/cvt6.jpg","category":"interior"},{"image":"/images/vehicles/yaris-cross/hybrid4.jpg","category":"interior"},{"image":"/images/vehicles/yaris-cross/hybrid5.jpg","category":"interior"},{"image":"/images/vehicles/yaris-cross/hybrid6.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === ''todos'') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '''').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '''', caption: '''', category: '''' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById(''toyota_thumb_yaris_cross_'' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: ''smooth'', block: ''nearest'', inline: ''center'' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_yaris_cross()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con tÃ­tulo y pestaÃ±as interactivas estilo Lexus UX -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    GalerÃ­a
                </h2>
            </div>

            <!-- PestaÃ±as de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab(''todos'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''todos'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab(''exterior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''exterior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab(''interior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''interior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato CinemÃ¡tico) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de ImÃ¡genes con transiciÃ³n suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + ''_'' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? ''opacity-100 z-10'' : ''opacity-0 z-0 pointer-events-none''"
                    >
                        <img 
                            :src="item.image" 
                            :alt="''Foto '' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- BotÃ³n Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de CategorÃ­a -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''TOYOTA'')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, ''0'')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, ''0'')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de NavegaciÃ³n Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="''thumb_'' + idx">
                    <button 
                        type="button"
                        :id="''toyota_thumb_yaris_cross_'' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? ''border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md'' 
                            : ''border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400''"
                        :title="''Foto '' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="''Foto '' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Yaris Cross Â· <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''GALERÃA'')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en ProporciÃ³n Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="''Foto '' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + '' / '' + filteredItems.length"></span>
            <span class="hidden sm:inline">NavegÃ¡ con las flechas &larr; &rarr; o deslizÃ¡ con el dedo</span>
        </div>
    </div>
</section>

<!-- ================= 7. ESPECIFICACIONES & VERSIONES ================= -->
<section id="especificaciones" class="py-16 md:py-24 bg-slate-50 border-t border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <!-- Especificaciones -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-white rounded-3xl p-6 sm:p-12 border border-slate-200/80 shadow-xs">
            <div class="lg:col-span-6 space-y-6">
                <img src="/images/vehicles/yaris-cross/especificacionesyaris1.jpg" alt="Especificaciones Yaris Cross" class="w-full h-auto rounded-2xl object-contain mx-auto">
                <div class="text-center">
                    <a href="https://www.toyota.com.py/asset/pdf/download-brochures/catalogo-yaris-cross.pdf" target="_blank"
                       class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                        <i class="fas fa-file-pdf"></i>
                        <span>Descargar Brochure</span>
                    </a>
                </div>
            </div>
            <div class="lg:col-span-6 space-y-6">
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">Especificaciones</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200/80 space-y-3">
                        <h3 class="text-lg font-medium text-[#b31f26] uppercase">Generales</h3>
                        <ul class="space-y-2 text-sm text-slate-700">
                            <li>â€¢ <strong>Longitud:</strong> 4.310 mm</li>
                            <li>â€¢ <strong>Ancho:</strong> 1.770 mm</li>
                            <li>â€¢ <strong>Altura:</strong> 1.615 mm</li>
                        </ul>
                    </div>
                    <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200/80 space-y-3">
                        <h3 class="text-lg font-medium text-[#b31f26] uppercase">Motor</h3>
                        <ul class="space-y-2 text-sm text-slate-700">
                            <li>â€¢ <strong>Cilindros:</strong> 4 en lÃ­nea</li>
                            <li>â€¢ <strong>VÃ¡lvulas:</strong> 16 vÃ¡lvulas con DOHC y Dual-VVT-i</li>
                            <li>â€¢ <strong>Cilindrada:</strong> 1.5L (Nafta / HÃ­brido HEV)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Versiones -->
        <div id="modelos" class="space-y-10">
            <div class="text-center space-y-2">
                <span class="text-xs font-medium uppercase tracking-widest text-red-600">Configuraciones</span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">Versiones</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <!-- CVT 1.5L -->
                <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xs space-y-6">
                    <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100 flex items-center justify-center aspect-[16/10]">
                        <img src="/images/vehicles/yaris-cross/especificacionesyaris1.jpg" alt="Yaris Cross CVT 1.5L" class="max-h-full max-w-full object-contain rounded-xl">
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">CVT 1.5L</h3>
                    <ul class="space-y-2.5 text-sm sm:text-base text-slate-600">
                        <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Ventilador y acoplamiento de motor de 160 W con dos velocidades de refrigeraciÃ³n</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Motor de <strong>1.500 cc</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Tanque de combustible de <strong>42 L</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>TransmisiÃ³n <strong>CVT D88C</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Diferencial delantero 5.105 (CVT)</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Aire acondicionado manual</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Pantalla multi-informaciÃ³n de <strong>4.2â€³ TFT</strong></span></li>
                    </ul>
                </div>

                <!-- Hybrid 1.5L -->
                <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xs space-y-6">
                    <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100 flex items-center justify-center aspect-[16/10]">
                        <img src="/images/vehicles/yaris-cross/yarishybrid1.5.jpg" alt="Yaris Cross Hybrid 1.5L" class="max-h-full max-w-full object-contain rounded-xl">
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">Hybrid 1.5L</h3>
                    <ul class="space-y-2.5 text-sm sm:text-base text-slate-600">
                        <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-[#b31f26] mt-1"></i><span>Ventilador y acoplamiento de motor de 160 W con ModulaciÃ³n por Ancho de Pulso</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Motor de <strong>1.500 cc HÃ­brido</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Tanque de combustible de <strong>36 L</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>TransmisiÃ³n <strong>CVT P910 HEV</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Modos de conducciÃ³n (<strong>Eco, Normal y Power</strong>)</span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Diferencial delantero 4.222 (HEV) y <strong>Freno regenerativo (HEV)</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Aire acondicionado digital y Pantalla multi-informaciÃ³n de <strong>7â€³ TFT</strong></span></li>
                        <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Aviso de aproximaciÃ³n de vehÃ­culo</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>', '[{"name": "Hero Slide Yaris Cross", "path": "images/vehicles/yaris-cross/SlideYariscross.jpg"}, {"name": "Portada CatÃ¡logo Yaris Cross", "path": "images/vehicles/yaris-cross/home_yaris_cross.png"}, {"name": "DiseÃ±o Exterior 1", "path": "images/vehicles/yaris-cross/yariscross-01.jpg"}, {"name": "DiseÃ±o Exterior 2", "path": "images/vehicles/yaris-cross/yariscross-04.jpg"}, {"name": "DiseÃ±o Exterior 3", "path": "images/vehicles/yaris-cross/yariscross-02.jpg"}, {"name": "DiseÃ±o Trasero", "path": "images/vehicles/yaris-cross/disenotraseroyaris.jpg"}, {"name": "DiseÃ±o Lateral", "path": "images/vehicles/yaris-cross/disenolateralyaris.jpg"}, {"name": "Llantas 17\"", "path": "images/vehicles/yaris-cross/franjallantas.jpg"}, {"name": "Faros Delanteros", "path": "images/vehicles/yaris-cross/franjafaros.jpg"}, {"name": "Faros Traseros", "path": "images/vehicles/yaris-cross/franjatraseros.jpg"}, {"name": "Interior 1", "path": "images/vehicles/yaris-cross/interioryaris1.jpg"}, {"name": "Interior 2", "path": "images/vehicles/yaris-cross/interioryaris2.jpg"}, {"name": "Interior 3", "path": "images/vehicles/yaris-cross/interioryaris3.jpg"}, {"name": "Interior 4", "path": "images/vehicles/yaris-cross/interioryaris4.jpg"}, {"name": "Capacidad de Equipaje", "path": "images/vehicles/yaris-cross/equipajeyaris.jpg"}, {"name": "Pantalla 10.1\"", "path": "images/vehicles/yaris-cross/pantallayaris.jpg"}, {"name": "Seguridad Activa", "path": "images/vehicles/yaris-cross/seguridadyaris1.jpg"}, {"name": "Seguridad Pasiva", "path": "images/vehicles/yaris-cross/seguridadyaris2.jpg"}, {"name": "Estacionamiento", "path": "images/vehicles/yaris-cross/seguridadyaris3.jpg"}, {"name": "DesempeÃ±o HÃ­brido", "path": "images/vehicles/yaris-cross/desempenoyaris1.jpg"}, {"name": "Motor y Transeje", "path": "images/vehicles/yaris-cross/motor-02.jpg"}, {"name": "Especificaciones Yaris Cross", "path": "images/vehicles/yaris-cross/especificacionesyaris1.jpg"}, {"name": "Yaris Cross Hybrid 1.5L", "path": "images/vehicles/yaris-cross/yarishybrid1.5.jpg"}, {"name": "GalerÃ­a CVT 1", "path": "images/vehicles/yaris-cross/cvt1.jpg"}, {"name": "GalerÃ­a CVT 2", "path": "images/vehicles/yaris-cross/cvt2.jpg"}, {"name": "GalerÃ­a CVT 3", "path": "images/vehicles/yaris-cross/cvt3.jpg"}, {"name": "GalerÃ­a CVT 4", "path": "images/vehicles/yaris-cross/cvt4.jpg"}, {"name": "GalerÃ­a Hybrid 1", "path": "images/vehicles/yaris-cross/hybrid1.jpg"}, {"name": "GalerÃ­a Hybrid 2", "path": "images/vehicles/yaris-cross/hybrid2.jpg"}, {"name": "GalerÃ­a Hybrid 3", "path": "images/vehicles/yaris-cross/hybrid3.jpg"}, {"name": "GalerÃ­a Hybrid 4", "path": "images/vehicles/yaris-cross/hybrid4.jpg"}]');
INSERT INTO public.vehicles VALUES (52, '7f5bf53e-6ed3-44d0-9d4d-80a0906d3ef7', '0km', 1, 2, 1, 'Fortuner', 'SRV 2.8L Turbo Diesel 4x4', 'fortuner', 2026, NULL, NULL, false, NULL, 0, 'Diesel', 'AutomÃ¡tica 6 velocidades', '4x4', '2.8L Turbo Diesel (204 CV / 500 Nm)', 5, NULL, NULL, NULL, 'Presencia imponente, exclusividad y lujo para 7 pasajeros', 'La nueva Fortuner ofrece tres hileras de asientos, motor 2.8L de 204 CV y 500 Nm de torque, faros Bi-LED y 7 airbags con calificaciÃ³n de 5 estrellas.', NULL, NULL, false, true, false, 'disponible', 12, '2026-10-31 19:26:10', '2026-11-11 15:18:57', NULL, NULL, 'https://toyota.com.py/pdf/fortuner-2021.pdf', 'https://www.youtube.com/watch?v=HKFSuY4NYGU', 7, NULL, NULL, NULL, NULL, '["images/vehicles/fortuner/slider_fortuner.jpg"]', '<!-- ================= 1. PRESENCIA IMPONENTE & CONFORT INTERIOR ================= -->
<section id="interior" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="max-w-3xl mx-auto text-center space-y-3">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Confort y TecnologÃ­a</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                Presencia Imponente
            </h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                La nueva <strong>Fortuner</strong> ofrece una imagen exterior e interior mÃ¡s lujosa, y un diseÃ±o mÃ¡s elaborado con acabados superiores y mejor esculpidos.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-6">
                <div class="space-y-2">
                    <h3 class="text-2xl font-medium text-[#b31f26] font-heading">DiseÃ±o Interior</h3>
                    <p class="text-base text-slate-600 leading-relaxed">
                        El habitÃ¡culo de la Fortuner ofrece a todos sus pasajeros el placer de disfrutar del viaje sin importar las distancias mediante sus <strong>tres hileras de asientos</strong> con distintos modos de configuraciÃ³n acordes a las necesidades.
                    </p>
                </div>
                <div class="space-y-2">
                    <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Display de informaciÃ³n</h3>
                    <p class="text-base text-slate-600 leading-relaxed">
                        El display de informaciÃ³n mÃºltiple incorpora 3 funciones adicionales: el indicador de velocidad digital, el estado del filtro DPF e indicador de posiciÃ³n de las ruedas delanteras.
                    </p>
                </div>
                <div class="space-y-2">
                    <h3 class="text-2xl font-medium text-[#b31f26] font-heading">Conectividad</h3>
                    <p class="text-base text-slate-600 leading-relaxed">
                        Todas las versiones de Fortuner tienen un equipo de audio con <strong>pantalla tÃ¡ctil de 8â€³</strong> y conectividad <strong>Android AutoÂ® y Apple CarPlayÂ®</strong>.
                    </p>
                </div>
            </div>
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/fortuner/interiorfortuner.png" alt="Interior Toyota Fortuner" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 2. FRANJA ROJA EQUIPAMIENTO INTERIOR ================= -->
<section class="py-14 bg-[#b31f26] text-white shadow-inner">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 text-center">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/25 shadow-xl bg-white/10">
                    <img src="/images/vehicles/fortuner/linefortuner-1.png" alt="Climatizador automÃ¡tico digital" class="w-full h-full object-cover">
                </div>
                <p class="text-lg font-bold text-white">Climatizador automÃ¡tico digital</p>
            </div>
            <div class="flex flex-col items-center space-y-4">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/25 shadow-xl bg-white/10">
                    <img src="/images/vehicles/fortuner/linefortuner2.png" alt="Audio con pantalla tÃ¡ctil de 8 pulgadas" class="w-full h-full object-cover">
                </div>
                <p class="text-lg font-bold text-white">Audio con pantalla tÃ¡ctil de 8â€³ y conectividad Android AutoÂ® y Apple CarPlayÂ®</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. DISEÃ‘O EXTERIOR & MAYOR PERFORMANCE ================= -->
<section id="diseno" class="py-16 md:py-24 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="max-w-3xl mx-auto text-center space-y-3">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">DiseÃ±o y Performance</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                Exclusividad, Lujo y Potencia
            </h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                Completamente renovada por dentro y por fuera, la Fortuner es sinÃ³nimo de exclusividad y lujo, que ahora vienen acompaÃ±ados de mÃ¡s comodidad, mÃ¡s espacio y mÃ¡s equipamiento.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/80 shadow-xs">
            <div class="lg:col-span-6">
                <img src="/images/vehicles/fortuner/exteriorfortuner.png" alt="Nuevo diseÃ±o exterior Fortuner" class="w-full h-full object-cover rounded-2xl">
            </div>
            <div id="desempeno" class="lg:col-span-6 space-y-4">
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">Nuevo diseÃ±o exterior</h3>
                <p class="text-base text-slate-600 leading-relaxed">
                    Nuevo frente con <strong>faros Bi-LED</strong> y nuevo diseÃ±o de paragolpes, que le otorgan una figura mÃ¡s sofisticada y armÃ³nica. Su diseÃ±o de <strong>llantas de aleaciÃ³n de 18â€³</strong>, disponible en versiones SRV, le otorga mÃ¡s dinamismo a la figura lateral, mientras que los faros LED traseros completan un estilo mÃ¡s moderno.
                </p>
                <p class="text-base text-slate-600 leading-relaxed">
                    Apertura de puerta trasera elÃ©ctrica regulable en altura, espejos retrovisores LED retrÃ¡ctiles y Smart Key.
                </p>
                <div class="pt-2 border-t border-slate-100">
                    <h4 class="text-xl font-medium text-[#b31f26] font-heading">Mayor Performance</h4>
                    <p class="text-base text-slate-600 leading-relaxed mt-1">
                        Ahora el motor <strong>2.8L entrega 204 CV</strong> y, en las versiones con transmisiÃ³n automÃ¡tica, <strong>500 Nm de torque mÃ¡ximo</strong>.
                    </p>
                </div>
            </div>
        </div>

        <!-- 4 Tarjetas de Performance -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-3xl overflow-hidden border border-slate-200/80 shadow-xs text-center">
                <img src="/images/vehicles/fortuner/perf-1.jpg" alt="Llantas de aleaciÃ³n 18 pulgadas" class="w-full h-44 object-cover">
                <div class="p-5"><strong class="text-base font-bold text-slate-800">Llantas de aleaciÃ³n de 18â€³</strong></div>
            </div>
            <div class="bg-white rounded-3xl overflow-hidden border border-slate-200/80 shadow-xs text-center">
                <img src="/images/vehicles/fortuner/perf-2.jpg" alt="Faros traseros LED" class="w-full h-44 object-cover">
                <div class="p-5"><strong class="text-base font-bold text-slate-800">Faros traseros de LED</strong></div>
            </div>
            <div class="bg-white rounded-3xl overflow-hidden border border-slate-200/80 shadow-xs text-center">
                <img src="/images/vehicles/fortuner/perf-3.jpg" alt="Faros delanteros Bi-LED" class="w-full h-44 object-cover">
                <div class="p-5"><strong class="text-base font-bold text-slate-800">Faros delanteros Bi-LED</strong></div>
            </div>
            <div class="bg-white rounded-3xl overflow-hidden border border-slate-200/80 shadow-xs text-center">
                <img src="/images/vehicles/fortuner/perf-4.jpg" alt="Motor 2.8L 204 CV" class="w-full h-44 object-cover">
                <div class="p-5"><strong class="text-base font-bold text-slate-800">Motor 2.8L de 204 CV y 500 Nm de torque</strong></div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. SEGURIDAD ================= -->
<section id="seguridad" class="py-16 bg-[#b31f26] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        <div class="text-center">
            <h2 class="text-3xl sm:text-4xl font-light font-heading text-white uppercase">Seguridad</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            <div class="flex flex-col items-center space-y-4">
                <img src="/images/vehicles/fortuner/seguridad-1.png" alt="7 Airbags" class="w-36 h-36 rounded-full object-cover border-4 border-white/25 shadow-xl">
                <p class="text-sm sm:text-base font-semibold">7 airbags: frontales (x2), de rodilla (conductor), laterales (x2) y de cortina (x2)</p>
            </div>
            <div class="flex flex-col items-center space-y-4">
                <img src="/images/vehicles/fortuner/seguridad-2.png" alt="Control de estabilidad VSC" class="w-36 h-36 rounded-full object-cover border-4 border-white/25 shadow-xl">
                <p class="text-sm sm:text-base font-semibold">Control de estabilidad (VSC)</p>
            </div>
            <div class="flex flex-col items-center space-y-4">
                <img src="/images/vehicles/fortuner/seguridad-3.png" alt="Control de tracciÃ³n activo A-TRC" class="w-36 h-36 rounded-full object-cover border-4 border-white/25 shadow-xl">
                <p class="text-sm sm:text-base font-semibold">Control de tracciÃ³n activo (A-TRC)</p>
            </div>
            <div class="flex flex-col items-center space-y-4">
                <img src="/images/vehicles/fortuner/seguridad-4.png" alt="5 Estrellas Latin NCAP" class="w-36 h-36 rounded-full object-cover border-4 border-white/25 shadow-xl">
                <p class="text-sm sm:text-base font-semibold">Fortuner obtuvo 5 estrellas en protecciÃ³n para adultos y niÃ±os</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 5. VIDEO OFICIAL ================= -->
<section id="video" class="py-16 md:py-20 bg-slate-950 text-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
        <div class="space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-500">Multimedia Oficial</span>
            <h2 class="text-3xl sm:text-4xl font-light uppercase font-heading text-white">Video</h2>
        </div>
        <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
            <iframe loading="lazy" title="Video Toyota Fortuner" src="https://www.youtube.com/embed/HKFSuY4NYGU?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</section>

<!-- ================= 6. MODELO & GALERÃA ================= -->
<section id="modelos" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        <!-- Modelo -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center bg-slate-50 rounded-3xl p-8 sm:p-12 border border-slate-200/80 max-w-5xl mx-auto">
            <div class="lg:col-span-6 bg-white rounded-2xl p-6 border border-slate-100 flex items-center justify-center">
                <img src="/images/vehicles/fortuner/fortunericon.jpg" alt="Fortuner Aut. 2.8 SRV" class="w-full max-w-md object-contain">
            </div>
            <div class="lg:col-span-6 space-y-5">
                <span class="text-xs font-medium uppercase tracking-widest text-red-600">VersiÃ³n Destacada</span>
                <h2 class="text-2xl sm:text-3xl font-light text-[#b31f26] font-heading">
                    FORTUNER AUT. 2.8 SRV
                </h2>
                <ul class="space-y-2.5 text-base text-slate-700">
                    <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>TransmisiÃ³n automÃ¡tica de 6 velocidades</span></li>
                    <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Control de Velocidad Crucero</span></li>
                    <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Climatizador automÃ¡tico digital</span></li>
                    <li class="flex items-center gap-2.5"><i class="fas fa-check-circle text-[#b31f26]"></i><span>Android AutoÂ® y Apple CarPlayÂ®</span></li>
                </ul>
                <div class="pt-2">
                    <a href="https://toyota.com.py/pdf/fortuner-2021.pdf" target="_blank"
                       class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                        <i class="fas fa-file-pdf"></i>
                        <span>Descargar Brochure</span>
                    </a>
                </div>
            </div>
        </div>

        </div>
</section>

<!-- ================= GALERÃA FOTOGRÃFICA (ESTILO LEXUS) ================= -->
<script>
window.toyotaGallery_fortuner = function() {
    return {
        activeTab: ''todos'',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/fortuner/fortuner1.jpg","category":"exterior"},{"image":"/images/vehicles/fortuner/fortuner2.jpg","category":"exterior"},{"image":"/images/vehicles/fortuner/fortuner3.jpg","category":"exterior"},{"image":"/images/vehicles/fortuner/fortuner4.jpg","category":"exterior"},{"image":"/images/vehicles/fortuner/fortuner5.jpg","category":"exterior"},{"image":"/images/vehicles/fortuner/fortuner6.jpg","category":"exterior"},{"image":"/images/vehicles/fortuner/fortuner7.jpg","category":"interior"},{"image":"/images/vehicles/fortuner/fortuner8.jpg","category":"interior"},{"image":"/images/vehicles/fortuner/fortuner9.jpg","category":"interior"},{"image":"/images/vehicles/fortuner/fortuner10.jpg","category":"interior"},{"image":"/images/vehicles/fortuner/fortuner11.jpg","category":"interior"},{"image":"/images/vehicles/fortuner/fortuner12.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === ''todos'') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '''').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '''', caption: '''', category: '''' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById(''toyota_thumb_fortuner_'' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: ''smooth'', block: ''nearest'', inline: ''center'' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_fortuner()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con tÃ­tulo y pestaÃ±as interactivas estilo Lexus UX -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    GalerÃ­a
                </h2>
            </div>

            <!-- PestaÃ±as de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab(''todos'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''todos'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab(''exterior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''exterior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab(''interior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''interior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato CinemÃ¡tico) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de ImÃ¡genes con transiciÃ³n suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + ''_'' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? ''opacity-100 z-10'' : ''opacity-0 z-0 pointer-events-none''"
                    >
                        <img 
                            :src="item.image" 
                            :alt="''Foto '' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- BotÃ³n Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de CategorÃ­a -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''TOYOTA'')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, ''0'')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, ''0'')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de NavegaciÃ³n Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="''thumb_'' + idx">
                    <button 
                        type="button"
                        :id="''toyota_thumb_fortuner_'' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? ''border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md'' 
                            : ''border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400''"
                        :title="''Foto '' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="''Foto '' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Fortuner SRV Â· <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''GALERÃA'')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en ProporciÃ³n Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="''Foto '' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + '' / '' + filteredItems.length"></span>
            <span class="hidden sm:inline">NavegÃ¡ con las flechas &larr; &rarr; o deslizÃ¡ con el dedo</span>
        </div>
    </div>
</section>', '[{"name": "Hero Slide Fortuner", "path": "images/vehicles/fortuner/slider_fortuner.jpg"}, {"name": "Portada CatÃ¡logo Fortuner", "path": "images/vehicles/fortuner/home_fortuner2.png"}, {"name": "Interior Fortuner", "path": "images/vehicles/fortuner/interiorfortuner.png"}, {"name": "Climatizador AutomÃ¡tico Digital", "path": "images/vehicles/fortuner/linefortuner-1.png"}, {"name": "Audio Pantalla TÃ¡ctil 8\"", "path": "images/vehicles/fortuner/linefortuner2.png"}, {"name": "Exterior Fortuner", "path": "images/vehicles/fortuner/exteriorfortuner.png"}, {"name": "Llantas de aleaciÃ³n 18\"", "path": "images/vehicles/fortuner/perf-1.jpg"}, {"name": "Faros traseros LED", "path": "images/vehicles/fortuner/perf-2.jpg"}, {"name": "Faros delanteros Bi-LED", "path": "images/vehicles/fortuner/perf-3.jpg"}, {"name": "Motor 2.8L 204 CV / 500 Nm", "path": "images/vehicles/fortuner/perf-4.jpg"}, {"name": "7 Airbags", "path": "images/vehicles/fortuner/seguridad-1.png"}, {"name": "Control de estabilidad VSC", "path": "images/vehicles/fortuner/seguridad-2.png"}, {"name": "Control de tracciÃ³n activo A-TRC", "path": "images/vehicles/fortuner/seguridad-3.png"}, {"name": "5 Estrellas ProtecciÃ³n", "path": "images/vehicles/fortuner/seguridad-4.png"}, {"name": "Modelo Fortuner SRV", "path": "images/vehicles/fortuner/fortunericon.jpg"}, {"name": "GalerÃ­a Fortuner 1", "path": "images/vehicles/fortuner/fortuner1.jpg"}, {"name": "GalerÃ­a Fortuner 2", "path": "images/vehicles/fortuner/fortuner2.jpg"}, {"name": "GalerÃ­a Fortuner 3", "path": "images/vehicles/fortuner/fortuner3.jpg"}, {"name": "GalerÃ­a Fortuner 4", "path": "images/vehicles/fortuner/fortuner4.jpg"}, {"name": "GalerÃ­a Fortuner 5", "path": "images/vehicles/fortuner/fortuner5.jpg"}, {"name": "GalerÃ­a Fortuner 6", "path": "images/vehicles/fortuner/fortuner6.jpg"}, {"name": "GalerÃ­a Fortuner 7", "path": "images/vehicles/fortuner/fortuner7.jpg"}, {"name": "GalerÃ­a Fortuner 8", "path": "images/vehicles/fortuner/fortuner8.jpg"}, {"name": "GalerÃ­a Fortuner 9", "path": "images/vehicles/fortuner/fortuner9.jpg"}, {"name": "GalerÃ­a Fortuner 10", "path": "images/vehicles/fortuner/fortuner10.jpg"}, {"name": "GalerÃ­a Fortuner 11", "path": "images/vehicles/fortuner/fortuner11.jpg"}, {"name": "GalerÃ­a Fortuner 12", "path": "images/vehicles/fortuner/fortuner12.jpg"}]');
INSERT INTO public.vehicles VALUES (41, 'e5c159b5-9fa7-4065-b6d8-3d1db40fdda0', '0km', 1, 2, 1, 'Raize', 'Urbana / Sport 1.2L', 'raize', 2026, NULL, NULL, false, NULL, 0, 'Nafta', 'AutomÃ¡tica', '4x2', '1.2L 3 cilindros en lÃ­nea', 5, NULL, NULL, NULL, 'Estilo distintivo y diseÃ±o dinÃ¡mico', 'La nueva RAIZE tiene una cabina espaciosa para equipaje y facilidad de conducciÃ³n gracias a su plataforma con excelente visibilidad y estabilidad.', NULL, NULL, false, true, false, 'disponible', 10, '2026-10-31 18:47:15', '2026-11-11 19:55:04', NULL, NULL, 'https://www.toyota.com.py/asset/pdf/download-brochures/catalogo_raize.pdf', 'https://www.youtube.com/watch?v=l3HTqjEjxrE', 2, NULL, NULL, NULL, NULL, '["images/vehicles/raize/slide_raizehome.jpg"]', '<!-- ================= 1. ESTILO DISTINTIVO & DISEÃ‘O EXTERNO ================= -->
<section id="diseno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        
        <!-- Bloque 1: Estilo distintivo y diseÃ±o dinÃ¡mico -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-slate-50">
                    <img src="/images/vehicles/raize/farosraize.jpg" alt="Estilo distintivo y diseÃ±o dinÃ¡mico Toyota Raize" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    ADN SUV Compacto
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    Estilo distintivo y diseÃ±o dinÃ¡mico
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    La nueva <strong>RAIZE</strong> tiene una cabina espaciosa para equipaje y facilidad de conducciÃ³n gracias a su plataforma con excelente visibilidad y estabilidad.
                </p>
            </div>
        </div>

        <!-- Bloque 2: DiseÃ±o Externo -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                    Presencia Exterior
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight leading-tight">
                    DiseÃ±o Externo
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Tiene una cabina deportiva con perfil bajo que crea una apariencia Ã¡gil que inspira confianza y solidez.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-100 bg-white p-4">
                    <img src="/images/vehicles/raize/raizeblanca.jpg" alt="DiseÃ±o Externo Toyota Raize" class="w-full h-full object-contain hover:scale-105 transition duration-500">
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ================= 2. FRANJA ROJA DE EQUIPAMIENTO EXTERIOR ================= -->
<section class="py-14 bg-gradient-to-r from-[#9e1920] via-[#b31f26] to-[#9e1920] text-white shadow-inner">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
            <div class="flex flex-col items-center space-y-4 group">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/25 shadow-xl bg-white/10 flex items-center justify-center group-hover:scale-105 transition duration-300">
                    <img src="/images/vehicles/raize/llantas.png" alt="Llantas de aleaciÃ³n 16 pulgadas" class="w-full h-full object-cover">
                </div>
                <p class="text-base sm:text-lg text-white">
                    <strong>Llantas de aleaciÃ³n</strong> 16â€³ â€“ 205/65R16
                </p>
            </div>

            <div class="flex flex-col items-center space-y-4 group">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/25 shadow-xl bg-white/10 flex items-center justify-center group-hover:scale-105 transition duration-300">
                    <img src="/images/vehicles/raize/faros-delanteros.png" alt="Faros delanteros full LED" class="w-full h-full object-cover">
                </div>
                <p class="text-base sm:text-lg text-white">
                    <strong>Faros delanteros full LED</strong>
                </p>
            </div>

            <div class="flex flex-col items-center space-y-4 group">
                <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white/25 shadow-xl bg-white/10 flex items-center justify-center group-hover:scale-105 transition duration-300">
                    <img src="/images/vehicles/raize/faros-traseros.png" alt="Faros traseros de freno LED" class="w-full h-full object-cover">
                </div>
                <p class="text-base sm:text-lg text-white">
                    <strong>Faros traseros de freno LED</strong>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. DISEÃ‘O INTERIOR & CAPACIDAD DE EQUIPAJE ================= -->
<section id="interior" class="py-16 md:py-24 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-14">
        <div class="max-w-3xl mx-auto text-center space-y-3">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Confort & Habitabilidad</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight">
                DiseÃ±o Interior
            </h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                El interior cuenta con excelente visibilidad, una cabina que proporciona una atmÃ³sfera divertida para mayor placer de conducciÃ³n.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-white rounded-3xl p-6 sm:p-10 shadow-sm border border-slate-200/80">
            <div class="lg:col-span-6">
                <div class="rounded-2xl overflow-hidden shadow-md">
                    <img src="/images/vehicles/raize/interiorraize.jpg" alt="Capacidad de Equipaje Toyota Raize" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <span class="inline-block text-xs font-medium uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full">
                    Espacio Inteligente
                </span>
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    Capacidad de Equipaje
                </h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    La nueva <strong>RAIZE</strong> tiene una capacidad de equipaje lÃ­der en su clase, con varios espacios de almacenamiento y un espacio de carga de primera clase de <strong>369 L (mÂ³)</strong>.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. TECNOLOGÃA & CONECTIVIDAD ================= -->
<section id="tecnologia" class="py-16 md:py-24 bg-white space-y-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="max-w-3xl mx-auto text-center space-y-3">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">InnovaciÃ³n a Bordo</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight">
                TecnologÃ­a
            </h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                La nueva RAIZE cuenta con un panel de instrumentos optimizados que proporcionan una excelente usabilidad y una forma atractiva, ya que el Ã¡rea de control de audio y clima estÃ¡n orientados hacia el asiento del conductor para mejorar la operatividad.
            </p>
        </div>

        <!-- Volante -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    Volante
                </h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Los controles montados en el volante permiten al conductor operar funciones como el sistema de audio, la pantalla de informaciÃ³n mÃºltiple y el modo de potencia mientras mantiene ambas manos en el volante.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-100">
                    <img src="/images/vehicles/raize/volanteraize.jpg" alt="Volante Toyota Raize" class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <!-- Sistema de Audio -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-100">
                    <img src="/images/vehicles/raize/audioraize.jpg" alt="Sistema de audio Toyota Raize" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    Sistema de audio
                </h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Pantalla de 8" garantizando excelente visibilidad, sistema con conectividad <strong>Apple CarPlay y Android Auto</strong> y una entrada externa de USB que permite la conectividad con dispositivos externos.
                </p>
            </div>
        </div>

        <!-- 4 Tarjetas de Equipamiento TecnolÃ³gico -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 pt-4">
            <div class="bg-slate-50 hover:bg-white rounded-3xl p-6 border border-slate-200/80 hover:shadow-lg transition text-center space-y-4">
                <img src="/images/vehicles/raize/pantalla.png" alt="Pantalla tÃ¡ctil de 8 pulgadas" class="w-36 h-36 mx-auto rounded-full object-cover shadow-md border-4 border-white">
                <p class="text-sm text-slate-700 leading-relaxed">
                    Sistema de audio con <strong>pantalla tÃ¡ctil de 8â€³</strong> con <strong>Bluetooth</strong> y entrada <strong>USB</strong>. Conectividad <strong>Android Auto &amp; Apple CarPlay</strong>
                </p>
            </div>

            <div class="bg-slate-50 hover:bg-white rounded-3xl p-6 border border-slate-200/80 hover:shadow-lg transition text-center space-y-4">
                <img src="/images/vehicles/raize/tablero.png" alt="Sistema de informaciÃ³n mÃºltiple en tablero" class="w-36 h-36 mx-auto rounded-full object-cover shadow-md border-4 border-white">
                <p class="text-sm text-slate-700 leading-relaxed">
                    Sistema de <strong>informaciÃ³n mÃºltiple en tablero</strong>
                </p>
            </div>

            <div class="bg-slate-50 hover:bg-white rounded-3xl p-6 border border-slate-200/80 hover:shadow-lg transition text-center space-y-4">
                <img src="/images/vehicles/raize/espejo.png" alt="Espejos retrovisores" class="w-36 h-36 mx-auto rounded-full object-cover shadow-md border-4 border-white">
                <p class="text-sm text-slate-700 leading-relaxed">
                    Espejo <strong>retrovisor interno</strong> para dÃ­a/noche. Espejo <strong>retrovisor externo ajustable elÃ©ctricamente</strong>
                </p>
            </div>

            <div class="bg-slate-50 hover:bg-white rounded-3xl p-6 border border-slate-200/80 hover:shadow-lg transition text-center space-y-4">
                <img src="/images/vehicles/raize/puertas.png" alt="Wireless Smart Door Lock" class="w-36 h-36 mx-auto rounded-full object-cover shadow-md border-4 border-white">
                <p class="text-sm text-slate-700 leading-relaxed">
                    Sistema de <strong>cierre de puertas sin llave</strong> (Wireless Smart Door Lock). Sistema <strong>Anti-robo con inmovilizador</strong>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 5. VIDEO OFICIAL ================= -->
<section id="video" class="py-16 md:py-20 bg-slate-950 text-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
        <div class="space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-500">Multimedia Oficial</span>
            <h2 class="text-3xl sm:text-4xl font-light uppercase font-heading text-white">
                Videos
            </h2>
        </div>
        <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-2xl border border-slate-800 bg-black">
            <iframe loading="lazy" title="Video CatÃ¡logo Raize" src="https://www.youtube.com/embed/l3HTqjEjxrE?feature=oembed" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</section>

<!-- ================= 6. MANEJO, DESEMPEÃ‘O, ESTABILIDAD Y MOTOR ================= -->
<section id="desempeno" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        
        <!-- Manejo seguro y divertido -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-100">
                    <img src="/images/vehicles/raize/raizeroja.jpg" alt="La Raize promete un manejo seguro y divertido" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading leading-tight">
                    La Raize promete un manejo seguro y divertido
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Su motor hace toda la diferencia, ofreciendo con su manejo una experiencia muy diferente al de otras SUVS. Y ademÃ¡s, con la tranquilidad que da el equipamiento de seguridad que define a Toyota.
                </p>
            </div>
        </div>

        <!-- DesempeÃ±o -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                    DesempeÃ±o
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    La optimizaciÃ³n precisa del motor y los componentes relacionados de la nueva RAIZE permiten un vehÃ­culo silencioso, compacto y ligero.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-100">
                    <img src="/images/vehicles/raize/desempeno.jpg" alt="DesempeÃ±o Toyota Raize" class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <!-- Estabilidad -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-100">
                    <img src="/images/vehicles/raize/estabilidadtoyotaraize.jpg" alt="Estabilidad Toyota Raize" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                    Estabilidad
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Plataforma recientemente desarrollada con aceros de alta resistencia que simplifican la estructura y mejoran su rigidez tanto en carretera como en ciudad.
                </p>
            </div>
        </div>

        <!-- Motor -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                    Motor
                </h2>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    La nueva RAIZE, con su motor <strong>1.2L de 3 cilindros en lÃ­nea</strong> de nuevo desarrollo, proporciona un equilibrio Ã³ptimo entre la eficiencia del combustible y el rendimiento de la aceleraciÃ³n.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-100">
                    <img src="/images/vehicles/raize/raizeblanca1.jpg" alt="Motor 1.2L Toyota Raize" class="w-full h-full object-cover">
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ================= 7. SEGURIDAD ================= -->
<section id="seguridad" class="py-16 md:py-24 bg-slate-50 border-t border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="max-w-3xl mx-auto text-center space-y-3">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">ProtecciÃ³n Integral Toyota</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading tracking-tight">
                Seguridad
            </h2>
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                La nueva RAIZE cuenta con un sistema de seguridad de frenos antibloqueo (ABS), control de estabilidad del vehÃ­culo (VSC) y un asistente de control de partida (HAC), asegurando la estabilidad de conducciÃ³n.
            </p>
        </div>

        <!-- Estacionamiento -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-white rounded-3xl p-6 sm:p-10 shadow-xs border border-slate-200/80">
            <div class="lg:col-span-6 space-y-4 lg:order-1 order-2">
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    Estacionamiento
                </h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    Los controles montados en el volante y asistencias de maniobra permiten al conductor operar funciones clave del sistema de audio, pantalla de informaciÃ³n mÃºltiple y sensores mientras mantiene el control seguro en todo momento.
                </p>
            </div>
            <div class="lg:col-span-6 lg:order-2 order-1">
                <div class="rounded-2xl overflow-hidden shadow-md">
                    <img src="/images/vehicles/raize/estacionamientoraize.jpg" alt="Estacionamiento Toyota Raize" class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <!-- Seguridad Pasiva -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-white rounded-3xl p-6 sm:p-10 shadow-xs border border-slate-200/80">
            <div class="lg:col-span-6">
                <div class="rounded-2xl overflow-hidden shadow-md">
                    <img src="/images/vehicles/raize/seguridad.jpg" alt="Seguridad Pasiva Toyota Raize" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                    Seguridad Pasiva
                </h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    La nueva RAIZE cuenta con <strong>2 bolsas de aire</strong> y todos los asientos estÃ¡n equipados con cinturones de seguridad ELR de 3 puntos que contribuyen a la protecciÃ³n de los ocupantes.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 8. GALERÃA FOTOGRÃFICA ================= -->
<!-- ================= GALERÃA FOTOGRÃFICA (ESTILO LEXUS) ================= -->
<script>
window.toyotaGallery_raize = function() {
    return {
        activeTab: ''todos'',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: [{"image":"/images/vehicles/raize/raize1.jpg","category":"exterior"},{"image":"/images/vehicles/raize/raize3.jpg","category":"exterior"},{"image":"/images/vehicles/raize/raize6.jpg","category":"exterior"},{"image":"/images/vehicles/raize/raize2.jpg","category":"interior"},{"image":"/images/vehicles/raize/raize4.jpg","category":"interior"},{"image":"/images/vehicles/raize/raize5.jpg","category":"interior"}],

        get filteredItems() {
            if (this.activeTab === ''todos'') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '''').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '''', caption: '''', category: '''' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.$nextTick(() => {
                const thumb = document.getElementById(''toyota_thumb_raize_'' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: ''smooth'', block: ''nearest'', inline: ''center'' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_raize()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con tÃ­tulo y pestaÃ±as interactivas estilo Lexus UX -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    GalerÃ­a
                </h2>
            </div>

            <!-- PestaÃ±as de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab(''todos'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''todos'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab(''exterior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''exterior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab(''interior'')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === ''interior'' ? ''bg-[#eb0a1e] text-white shadow-md shadow-red-600/30'' : ''text-slate-600 hover:text-slate-900''">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato CinemÃ¡tico) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)"
            >
                <!-- Capa de ImÃ¡genes con transiciÃ³n suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + ''_'' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? ''opacity-100 z-10'' : ''opacity-0 z-0 pointer-events-none''"
                    >
                        <img 
                            :src="item.image" 
                            :alt="''Foto '' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- BotÃ³n Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de CategorÃ­a -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''TOYOTA'')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, ''0'')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, ''0'')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de NavegaciÃ³n Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="''thumb_'' + idx">
                    <button 
                        type="button"
                        :id="''toyota_thumb_raize_'' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? ''border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md'' 
                            : ''border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400''"
                        :title="''Foto '' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="''Foto '' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">Toyota Raize Â· <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : ''GALERÃA'')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en ProporciÃ³n Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart($event)"
            @touchend="handleTouchEnd($event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="''Foto '' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + '' / '' + filteredItems.length"></span>
            <span class="hidden sm:inline">NavegÃ¡ con las flechas &larr; &rarr; o deslizÃ¡ con el dedo</span>
        </div>
    </div>
</section>

<!-- ================= 9. ESPECIFICACIONES ================= -->
<section id="especificaciones" class="py-16 md:py-24 bg-slate-50 border-t border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center bg-white rounded-3xl p-6 sm:p-12 shadow-sm border border-slate-200/80">
            <div class="lg:col-span-6">
                <img src="/images/vehicles/raize/especificaciones.jpg" alt="Especificaciones Toyota Raize" class="w-full h-auto rounded-2xl object-contain mx-auto">
            </div>
            <div class="lg:col-span-6 space-y-6">
                <div class="space-y-2">
                    <span class="text-xs font-medium uppercase tracking-widest text-red-600">Dimensiones y Capacidades</span>
                    <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                        Especificaciones
                    </h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Longitud</span>
                        <strong class="text-2xl font-semibold text-slate-900 font-heading">4.030 mm</strong>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Ancho</span>
                        <strong class="text-2xl font-semibold text-slate-900 font-heading">1.710 mm</strong>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">Capacidad de carga</span>
                        <strong class="text-2xl font-semibold text-slate-900 font-heading">369 L (mÂ³)</strong>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
                        <span class="text-xs font-bold uppercase text-slate-400 block">DepÃ³sito de combustible</span>
                        <strong class="text-2xl font-semibold text-slate-900 font-heading">36 Litros</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 10. MODELOS (RAIZE URBANA & RAIZE SPORT) ================= -->
<section id="modelos" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="text-center space-y-2">
            <span class="text-xs font-medium uppercase tracking-widest text-red-600">Versiones Oficiales</span>
            <h2 class="text-3xl sm:text-4xl font-light text-[#b31f26] font-heading">
                Modelos
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <!-- Raize Urbana -->
            <div class="bg-slate-50 rounded-3xl p-8 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col items-center text-center justify-between space-y-6">
                <div class="space-y-4 w-full">
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                        Raize Urbana
                    </h3>
                    <div class="bg-white rounded-2xl p-6 border border-slate-100 flex items-center justify-center aspect-[16/9]">
                        <img src="/images/vehicles/raize/modelourbano.jpg" alt="Toyota Raize Urbana" class="max-h-full max-w-full object-contain">
                    </div>
                </div>
                <a href="https://www.toyota.com.py/asset/pdf/download-brochures/catalogo_raize.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure</span>
                </a>
            </div>

            <!-- Raize Sport -->
            <div class="bg-slate-50 rounded-3xl p-8 border border-slate-200/90 shadow-xs hover:shadow-xl transition flex flex-col items-center text-center justify-between space-y-6">
                <div class="space-y-4 w-full">
                    <h3 class="text-2xl sm:text-3xl font-medium text-[#b31f26] font-heading">
                        Raize Sport
                    </h3>
                    <div class="bg-white rounded-2xl p-6 border border-slate-100 flex items-center justify-center aspect-[16/9]">
                        <img src="/images/vehicles/raize/modelosport.jpg" alt="Toyota Raize Sport" class="max-h-full max-w-full object-contain">
                    </div>
                </div>
                <a href="https://www.toyota.com.py/asset/pdf/download-brochures/catalogo_raize.pdf" target="_blank"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#b31f26] hover:bg-red-800 text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-file-pdf"></i>
                    <span>Descargar Brochure</span>
                </a>
            </div>
        </div>

        <div class="text-center pt-4">
            <span class="text-xs text-slate-400 font-mono">
                Ref.: <a href="https://toyota.com.py" target="_blank" class="underline hover:text-red-600">Toyota Paraguay</a>
            </span>
        </div>
    </div>
</section>', '[{"name": "Hero Slide Raize", "path": "images/vehicles/raize/slide_raizehome.jpg"}, {"name": "Faros y Estilo Raize", "path": "images/vehicles/raize/farosraize.jpg"}, {"name": "DiseÃ±o Externo Raize Blanca", "path": "images/vehicles/raize/home_raize.png"}, {"name": "Llantas de AleaciÃ³n 16\"", "path": "images/vehicles/raize/llantas.png"}, {"name": "Faros Delanteros Full LED", "path": "images/vehicles/raize/faros-delanteros.png"}, {"name": "Faros Traseros LED", "path": "images/vehicles/raize/faros-traseros.png"}, {"name": "Interior y Capacidad de Equipaje", "path": "images/vehicles/raize/interiorraize.jpg"}, {"name": "Volante MultifunciÃ³n", "path": "images/vehicles/raize/volanteraize.jpg"}, {"name": "Sistema de Audio 8\"", "path": "images/vehicles/raize/audioraize.jpg"}, {"name": "Pantalla TÃ¡ctil 8\"", "path": "images/vehicles/raize/pantalla.png"}, {"name": "Tablero de InformaciÃ³n MÃºltiple", "path": "images/vehicles/raize/tablero.png"}, {"name": "Espejos Retrovisores", "path": "images/vehicles/raize/espejo.png"}, {"name": "Smart Door Lock / Puertas", "path": "images/vehicles/raize/puertas.png"}, {"name": "Manejo Seguro Raize Roja", "path": "images/vehicles/raize/raizeroja.jpg"}, {"name": "DesempeÃ±o Raize", "path": "images/vehicles/raize/desempeno.jpg"}, {"name": "Estabilidad Plataforma", "path": "images/vehicles/raize/estabilidadtoyotaraize.jpg"}, {"name": "Motor 1.2L", "path": "images/vehicles/raize/raizeblanca1.jpg"}, {"name": "Estacionamiento Asistido", "path": "images/vehicles/raize/estacionamientoraize.jpg"}, {"name": "Seguridad Pasiva Airbags", "path": "images/vehicles/raize/seguridad.jpg"}, {"name": "GalerÃ­a Raize 1", "path": "images/vehicles/raize/raize1.jpg"}, {"name": "GalerÃ­a Raize 2", "path": "images/vehicles/raize/raize2.jpg"}, {"name": "GalerÃ­a Raize 3", "path": "images/vehicles/raize/raize3.jpg"}, {"name": "GalerÃ­a Raize 4", "path": "images/vehicles/raize/raize4.jpg"}, {"name": "GalerÃ­a Raize 5", "path": "images/vehicles/raize/raize5.jpg"}, {"name": "GalerÃ­a Raize 6", "path": "images/vehicles/raize/raize6.jpg"}, {"name": "Dimensiones y Especificaciones", "path": "images/vehicles/raize/especificaciones.jpg"}, {"name": "Modelo Raize Urbana", "path": "images/vehicles/raize/modelourbano.jpg"}, {"name": "Modelo Raize Sport", "path": "images/vehicles/raize/modelosport.jpg"}]');
INSERT INTO public.vehicles VALUES (32, 'ba5c46f4-4f55-4b55-98bf-fbf4ee2a3626', 'usado', 1, 2, 1, 'RAV4', '2.5 HV HÃ­brida AutomÃ¡tica 4x2', 'toyota-rav4-hv-2024-hibrida-aut', 2024, 41500.00, 325775000, true, 'Consulte planes de entrega y financiaciÃ³n propia', 51000, 'HÃ­brido', 'AutomÃ¡tica', '4x2', '2.5', 5, 'Gris', 'Cuero / Tela de alta calidad', NULL, 'VehÃ­culo usado inspeccionado y garantizado por Consur S.A.', 'T. Rav4 HV 2024 aÃ±o 2024 en excelente estado general y mecÃ¡nica certificada. Equipado con motor 2.5L HÃ­brido, transmisiÃ³n AutomÃ¡tica y tracciÃ³n 4x2. Cuenta con Asientos ElÃ©ctricos, Bloqueo Central, DirecciÃ³n HidrÃ¡ulica, Frenos ABS. VehÃ­culo usado seleccionado e inspeccionado minuciosamente por el equipo tÃ©cnico de CONSUR S.A.', '{"AÃ±o": "2024", "Sede": "Casa Central - EncarnaciÃ³n", "Color": "Gris", "Marca": "Toyota", "Motor": "2.5", "Estado": "Excelente", "Volante": "Original", "TracciÃ³n": "4x2", "Combustible": "HÃ­brido", "Kilometraje": "51.000 km", "TransmisiÃ³n": "AutomÃ¡tica", "Disponibilidad": "Inmediata", "Tipo de vehÃ­culo": "SUV"}', '["Asientos ElÃ©ctricos", "Bloqueo Central", "DirecciÃ³n HidrÃ¡ulica", "Frenos ABS", "Stereo", "Techo Corredizo", "Vidrios ElÃ©ctricos"]', true, true, true, 'disponible', 4, '2026-10-06 10:00:00', '2026-11-12 19:25:39', NULL, 865.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


--
-- Name: activity_logs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.activity_logs_id_seq', 68, true);


--
-- Name: branches_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.branches_id_seq', 5, true);


--
-- Name: brands_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.brands_id_seq', 12, true);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: form_configs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.form_configs_id_seq', 4, true);


--
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);


--
-- Name: leads_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.leads_id_seq', 7, true);


--
-- Name: menu_items_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.menu_items_id_seq', 33, true);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.migrations_id_seq', 26, true);


--
-- Name: pages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.pages_id_seq', 11, true);


--
-- Name: podcasts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.podcasts_id_seq', 1, true);


--
-- Name: posts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.posts_id_seq', 17, true);


--
-- Name: settings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.settings_id_seq', 86, true);


--
-- Name: site_sections_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.site_sections_id_seq', 8, true);


--
-- Name: sliders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.sliders_id_seq', 13, true);


--
-- Name: testimonials_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.testimonials_id_seq', 2, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.users_id_seq', 5, true);


--
-- Name: vehicle_categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.vehicle_categories_id_seq', 10, true);


--
-- Name: vehicle_images_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.vehicle_images_id_seq', 497, true);


--
-- Name: vehicles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.vehicles_id_seq', 53, true);


--
-- Name: activity_logs activity_logs_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.activity_logs
    ADD CONSTRAINT activity_logs_pkey PRIMARY KEY (id);


--
-- Name: branches branches_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.branches
    ADD CONSTRAINT branches_pkey PRIMARY KEY (id);


--
-- Name: brands brands_name_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.brands
    ADD CONSTRAINT brands_name_unique UNIQUE (name);


--
-- Name: brands brands_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.brands
    ADD CONSTRAINT brands_pkey PRIMARY KEY (id);


--
-- Name: brands brands_slug_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.brands
    ADD CONSTRAINT brands_slug_unique UNIQUE (slug);


--
-- Name: cache_locks cache_locks_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);


--
-- Name: cache cache_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: form_configs form_configs_form_key_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.form_configs
    ADD CONSTRAINT form_configs_form_key_unique UNIQUE (form_key);


--
-- Name: form_configs form_configs_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.form_configs
    ADD CONSTRAINT form_configs_pkey PRIMARY KEY (id);


--
-- Name: job_batches job_batches_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);


--
-- Name: jobs jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);


--
-- Name: leads leads_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.leads
    ADD CONSTRAINT leads_pkey PRIMARY KEY (id);


--
-- Name: menu_items menu_items_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.menu_items
    ADD CONSTRAINT menu_items_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: pages pages_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pages
    ADD CONSTRAINT pages_pkey PRIMARY KEY (id);


--
-- Name: pages pages_slug_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pages
    ADD CONSTRAINT pages_slug_unique UNIQUE (slug);


--
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- Name: podcasts podcasts_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.podcasts
    ADD CONSTRAINT podcasts_pkey PRIMARY KEY (id);


--
-- Name: posts posts_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_pkey PRIMARY KEY (id);


--
-- Name: posts posts_slug_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_slug_unique UNIQUE (slug);


--
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- Name: settings settings_key_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.settings
    ADD CONSTRAINT settings_key_unique UNIQUE (key);


--
-- Name: settings settings_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.settings
    ADD CONSTRAINT settings_pkey PRIMARY KEY (id);


--
-- Name: site_sections site_sections_key_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.site_sections
    ADD CONSTRAINT site_sections_key_unique UNIQUE (key);


--
-- Name: site_sections site_sections_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.site_sections
    ADD CONSTRAINT site_sections_pkey PRIMARY KEY (id);


--
-- Name: sliders sliders_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sliders
    ADD CONSTRAINT sliders_pkey PRIMARY KEY (id);


--
-- Name: testimonials testimonials_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.testimonials
    ADD CONSTRAINT testimonials_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: vehicle_categories vehicle_categories_name_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.vehicle_categories
    ADD CONSTRAINT vehicle_categories_name_unique UNIQUE (name);


--
-- Name: vehicle_categories vehicle_categories_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.vehicle_categories
    ADD CONSTRAINT vehicle_categories_pkey PRIMARY KEY (id);


--
-- Name: vehicle_categories vehicle_categories_slug_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.vehicle_categories
    ADD CONSTRAINT vehicle_categories_slug_unique UNIQUE (slug);


--
-- Name: vehicle_images vehicle_images_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.vehicle_images
    ADD CONSTRAINT vehicle_images_pkey PRIMARY KEY (id);


--
-- Name: vehicles vehicles_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.vehicles
    ADD CONSTRAINT vehicles_pkey PRIMARY KEY (id);


--
-- Name: vehicles vehicles_slug_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.vehicles
    ADD CONSTRAINT vehicles_slug_unique UNIQUE (slug);


--
-- Name: vehicles vehicles_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.vehicles
    ADD CONSTRAINT vehicles_uuid_unique UNIQUE (uuid);


--
-- Name: activity_logs_created_at_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX activity_logs_created_at_index ON public.activity_logs USING btree (created_at);


--
-- Name: activity_logs_entity_type_entity_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX activity_logs_entity_type_entity_id_index ON public.activity_logs USING btree (entity_type, entity_id);


--
-- Name: cache_expiration_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX cache_expiration_index ON public.cache USING btree (expiration);


--
-- Name: cache_locks_expiration_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX cache_locks_expiration_index ON public.cache_locks USING btree (expiration);


--
-- Name: failed_jobs_connection_queue_failed_at_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX failed_jobs_connection_queue_failed_at_index ON public.failed_jobs USING btree (connection, queue, failed_at);


--
-- Name: jobs_queue_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);


--
-- Name: leads_created_at_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX leads_created_at_index ON public.leads USING btree (created_at);


--
-- Name: leads_status_created_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX leads_status_created_index ON public.leads USING btree (status, created_at);


--
-- Name: leads_type_status_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX leads_type_status_index ON public.leads USING btree (type, status);


--
-- Name: menu_items_location_sort_order_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX menu_items_location_sort_order_index ON public.menu_items USING btree (location, sort_order);


--
-- Name: menu_items_parent_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX menu_items_parent_id_index ON public.menu_items USING btree (parent_id);


--
-- Name: posts_published_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX posts_published_index ON public.posts USING btree (is_published, published_at);


--
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


--
-- Name: site_sections_key_is_visible_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX site_sections_key_is_visible_index ON public.site_sections USING btree (key, is_visible);


--
-- Name: sliders_group_active_order_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX sliders_group_active_order_index ON public.sliders USING btree ("group", is_active, sort_order);


--
-- Name: sliders_group_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX sliders_group_index ON public.sliders USING btree ("group");


--
-- Name: vehicle_images_vehicle_id_is_main_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX vehicle_images_vehicle_id_is_main_index ON public.vehicle_images USING btree (vehicle_id, is_main);


--
-- Name: vehicles_brand_id_vehicle_category_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX vehicles_brand_id_vehicle_category_id_index ON public.vehicles USING btree (brand_id, vehicle_category_id);


--
-- Name: vehicles_condition_status_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX vehicles_condition_status_index ON public.vehicles USING btree (condition, status);


--
-- Name: vehicles_price_usd_year_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX vehicles_price_usd_year_index ON public.vehicles USING btree (price_usd, year);


--
-- Name: vehicles_slug_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX vehicles_slug_index ON public.vehicles USING btree (slug);


--
-- Name: activity_logs activity_logs_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.activity_logs
    ADD CONSTRAINT activity_logs_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE SET NULL;


--
-- Name: leads leads_assigned_to_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.leads
    ADD CONSTRAINT leads_assigned_to_user_id_foreign FOREIGN KEY (assigned_to_user_id) REFERENCES public.users(id) ON DELETE SET NULL;


--
-- Name: leads leads_branch_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.leads
    ADD CONSTRAINT leads_branch_id_foreign FOREIGN KEY (branch_id) REFERENCES public.branches(id) ON DELETE SET NULL;


--
-- Name: leads leads_vehicle_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.leads
    ADD CONSTRAINT leads_vehicle_id_foreign FOREIGN KEY (vehicle_id) REFERENCES public.vehicles(id) ON DELETE SET NULL;


--
-- Name: menu_items menu_items_parent_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.menu_items
    ADD CONSTRAINT menu_items_parent_id_foreign FOREIGN KEY (parent_id) REFERENCES public.menu_items(id) ON DELETE CASCADE;


--
-- Name: vehicle_images vehicle_images_vehicle_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.vehicle_images
    ADD CONSTRAINT vehicle_images_vehicle_id_foreign FOREIGN KEY (vehicle_id) REFERENCES public.vehicles(id) ON DELETE CASCADE;


--
-- Name: vehicles vehicles_branch_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.vehicles
    ADD CONSTRAINT vehicles_branch_id_foreign FOREIGN KEY (branch_id) REFERENCES public.branches(id) ON DELETE SET NULL;


--
-- Name: vehicles vehicles_brand_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.vehicles
    ADD CONSTRAINT vehicles_brand_id_foreign FOREIGN KEY (brand_id) REFERENCES public.brands(id) ON DELETE CASCADE;


--
-- Name: vehicles vehicles_vehicle_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.vehicles
    ADD CONSTRAINT vehicles_vehicle_category_id_foreign FOREIGN KEY (vehicle_category_id) REFERENCES public.vehicle_categories(id) ON DELETE SET NULL;


--
-- PostgreSQL database dump complete
--

\unrestrict hI9Ohq0Xx1IugPiuxd7LgDUW8zSUGne4Udvw9GP2kNJF9W63ISsZu0ioDClxcPZ

