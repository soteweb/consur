--
-- PostgreSQL database dump
--

\restrict 9rXOCnr5k0GDdJ41AECcNsKSGS66nAii30EunLYCvGYdBrM5k0QUW3eWU36uAZH

-- Dumped from database version 18.1
-- Dumped by pg_dump version 18.1

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

ALTER TABLE IF EXISTS ONLY public.vehicles DROP CONSTRAINT IF EXISTS vehicles_vehicle_category_id_foreign;
ALTER TABLE IF EXISTS ONLY public.vehicles DROP CONSTRAINT IF EXISTS vehicles_brand_id_foreign;
ALTER TABLE IF EXISTS ONLY public.vehicles DROP CONSTRAINT IF EXISTS vehicles_branch_id_foreign;
ALTER TABLE IF EXISTS ONLY public.vehicle_images DROP CONSTRAINT IF EXISTS vehicle_images_vehicle_id_foreign;
ALTER TABLE IF EXISTS ONLY public.menu_items DROP CONSTRAINT IF EXISTS menu_items_parent_id_foreign;
ALTER TABLE IF EXISTS ONLY public.leads DROP CONSTRAINT IF EXISTS leads_vehicle_id_foreign;
ALTER TABLE IF EXISTS ONLY public.leads DROP CONSTRAINT IF EXISTS leads_branch_id_foreign;
ALTER TABLE IF EXISTS ONLY public.leads DROP CONSTRAINT IF EXISTS leads_assigned_to_user_id_foreign;
ALTER TABLE IF EXISTS ONLY public.activity_logs DROP CONSTRAINT IF EXISTS activity_logs_user_id_foreign;
DROP INDEX IF EXISTS public.vehicles_slug_index;
DROP INDEX IF EXISTS public.vehicles_price_usd_year_index;
DROP INDEX IF EXISTS public.vehicles_condition_status_index;
DROP INDEX IF EXISTS public.vehicles_brand_id_vehicle_category_id_index;
DROP INDEX IF EXISTS public.vehicle_images_vehicle_id_is_main_index;
DROP INDEX IF EXISTS public.site_sections_key_is_visible_index;
DROP INDEX IF EXISTS public.sessions_user_id_index;
DROP INDEX IF EXISTS public.sessions_last_activity_index;
DROP INDEX IF EXISTS public.menu_items_parent_id_index;
DROP INDEX IF EXISTS public.menu_items_location_sort_order_index;
DROP INDEX IF EXISTS public.leads_type_status_index;
DROP INDEX IF EXISTS public.leads_created_at_index;
DROP INDEX IF EXISTS public.jobs_queue_index;
DROP INDEX IF EXISTS public.failed_jobs_connection_queue_failed_at_index;
DROP INDEX IF EXISTS public.cache_locks_expiration_index;
DROP INDEX IF EXISTS public.cache_expiration_index;
DROP INDEX IF EXISTS public.activity_logs_entity_type_entity_id_index;
DROP INDEX IF EXISTS public.activity_logs_created_at_index;
ALTER TABLE IF EXISTS ONLY public.vehicles DROP CONSTRAINT IF EXISTS vehicles_uuid_unique;
ALTER TABLE IF EXISTS ONLY public.vehicles DROP CONSTRAINT IF EXISTS vehicles_slug_unique;
ALTER TABLE IF EXISTS ONLY public.vehicles DROP CONSTRAINT IF EXISTS vehicles_pkey;
ALTER TABLE IF EXISTS ONLY public.vehicle_images DROP CONSTRAINT IF EXISTS vehicle_images_pkey;
ALTER TABLE IF EXISTS ONLY public.vehicle_categories DROP CONSTRAINT IF EXISTS vehicle_categories_slug_unique;
ALTER TABLE IF EXISTS ONLY public.vehicle_categories DROP CONSTRAINT IF EXISTS vehicle_categories_pkey;
ALTER TABLE IF EXISTS ONLY public.vehicle_categories DROP CONSTRAINT IF EXISTS vehicle_categories_name_unique;
ALTER TABLE IF EXISTS ONLY public.users DROP CONSTRAINT IF EXISTS users_pkey;
ALTER TABLE IF EXISTS ONLY public.users DROP CONSTRAINT IF EXISTS users_email_unique;
ALTER TABLE IF EXISTS ONLY public.testimonials DROP CONSTRAINT IF EXISTS testimonials_pkey;
ALTER TABLE IF EXISTS ONLY public.sliders DROP CONSTRAINT IF EXISTS sliders_pkey;
ALTER TABLE IF EXISTS ONLY public.site_sections DROP CONSTRAINT IF EXISTS site_sections_pkey;
ALTER TABLE IF EXISTS ONLY public.site_sections DROP CONSTRAINT IF EXISTS site_sections_key_unique;
ALTER TABLE IF EXISTS ONLY public.settings DROP CONSTRAINT IF EXISTS settings_pkey;
ALTER TABLE IF EXISTS ONLY public.settings DROP CONSTRAINT IF EXISTS settings_key_unique;
ALTER TABLE IF EXISTS ONLY public.sessions DROP CONSTRAINT IF EXISTS sessions_pkey;
ALTER TABLE IF EXISTS ONLY public.podcasts DROP CONSTRAINT IF EXISTS podcasts_pkey;
ALTER TABLE IF EXISTS ONLY public.password_reset_tokens DROP CONSTRAINT IF EXISTS password_reset_tokens_pkey;
ALTER TABLE IF EXISTS ONLY public.pages DROP CONSTRAINT IF EXISTS pages_slug_unique;
ALTER TABLE IF EXISTS ONLY public.pages DROP CONSTRAINT IF EXISTS pages_pkey;
ALTER TABLE IF EXISTS ONLY public.migrations DROP CONSTRAINT IF EXISTS migrations_pkey;
ALTER TABLE IF EXISTS ONLY public.menu_items DROP CONSTRAINT IF EXISTS menu_items_pkey;
ALTER TABLE IF EXISTS ONLY public.leads DROP CONSTRAINT IF EXISTS leads_pkey;
ALTER TABLE IF EXISTS ONLY public.jobs DROP CONSTRAINT IF EXISTS jobs_pkey;
ALTER TABLE IF EXISTS ONLY public.job_batches DROP CONSTRAINT IF EXISTS job_batches_pkey;
ALTER TABLE IF EXISTS ONLY public.form_configs DROP CONSTRAINT IF EXISTS form_configs_pkey;
ALTER TABLE IF EXISTS ONLY public.form_configs DROP CONSTRAINT IF EXISTS form_configs_form_key_unique;
ALTER TABLE IF EXISTS ONLY public.failed_jobs DROP CONSTRAINT IF EXISTS failed_jobs_uuid_unique;
ALTER TABLE IF EXISTS ONLY public.failed_jobs DROP CONSTRAINT IF EXISTS failed_jobs_pkey;
ALTER TABLE IF EXISTS ONLY public.cache DROP CONSTRAINT IF EXISTS cache_pkey;
ALTER TABLE IF EXISTS ONLY public.cache_locks DROP CONSTRAINT IF EXISTS cache_locks_pkey;
ALTER TABLE IF EXISTS ONLY public.brands DROP CONSTRAINT IF EXISTS brands_slug_unique;
ALTER TABLE IF EXISTS ONLY public.brands DROP CONSTRAINT IF EXISTS brands_pkey;
ALTER TABLE IF EXISTS ONLY public.brands DROP CONSTRAINT IF EXISTS brands_name_unique;
ALTER TABLE IF EXISTS ONLY public.branches DROP CONSTRAINT IF EXISTS branches_pkey;
ALTER TABLE IF EXISTS ONLY public.activity_logs DROP CONSTRAINT IF EXISTS activity_logs_pkey;
ALTER TABLE IF EXISTS public.vehicles ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.vehicle_images ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.vehicle_categories ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.users ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.testimonials ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.sliders ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.site_sections ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.settings ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.podcasts ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.pages ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.migrations ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.menu_items ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.leads ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.jobs ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.form_configs ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.failed_jobs ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.brands ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.branches ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.activity_logs ALTER COLUMN id DROP DEFAULT;
DROP SEQUENCE IF EXISTS public.vehicles_id_seq;
DROP TABLE IF EXISTS public.vehicles;
DROP SEQUENCE IF EXISTS public.vehicle_images_id_seq;
DROP TABLE IF EXISTS public.vehicle_images;
DROP SEQUENCE IF EXISTS public.vehicle_categories_id_seq;
DROP TABLE IF EXISTS public.vehicle_categories;
DROP SEQUENCE IF EXISTS public.users_id_seq;
DROP TABLE IF EXISTS public.users;
DROP SEQUENCE IF EXISTS public.testimonials_id_seq;
DROP TABLE IF EXISTS public.testimonials;
DROP SEQUENCE IF EXISTS public.sliders_id_seq;
DROP TABLE IF EXISTS public.sliders;
DROP SEQUENCE IF EXISTS public.site_sections_id_seq;
DROP TABLE IF EXISTS public.site_sections;
DROP SEQUENCE IF EXISTS public.settings_id_seq;
DROP TABLE IF EXISTS public.settings;
DROP TABLE IF EXISTS public.sessions;
DROP SEQUENCE IF EXISTS public.podcasts_id_seq;
DROP TABLE IF EXISTS public.podcasts;
DROP TABLE IF EXISTS public.password_reset_tokens;
DROP SEQUENCE IF EXISTS public.pages_id_seq;
DROP TABLE IF EXISTS public.pages;
DROP SEQUENCE IF EXISTS public.migrations_id_seq;
DROP TABLE IF EXISTS public.migrations;
DROP SEQUENCE IF EXISTS public.menu_items_id_seq;
DROP TABLE IF EXISTS public.menu_items;
DROP SEQUENCE IF EXISTS public.leads_id_seq;
DROP TABLE IF EXISTS public.leads;
DROP SEQUENCE IF EXISTS public.jobs_id_seq;
DROP TABLE IF EXISTS public.jobs;
DROP TABLE IF EXISTS public.job_batches;
DROP SEQUENCE IF EXISTS public.form_configs_id_seq;
DROP TABLE IF EXISTS public.form_configs;
DROP SEQUENCE IF EXISTS public.failed_jobs_id_seq;
DROP TABLE IF EXISTS public.failed_jobs;
DROP TABLE IF EXISTS public.cache_locks;
DROP TABLE IF EXISTS public.cache;
DROP SEQUENCE IF EXISTS public.brands_id_seq;
DROP TABLE IF EXISTS public.brands;
DROP SEQUENCE IF EXISTS public.branches_id_seq;
DROP TABLE IF EXISTS public.branches;
DROP SEQUENCE IF EXISTS public.activity_logs_id_seq;
DROP TABLE IF EXISTS public.activity_logs;
SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: activity_logs; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.activity_logs OWNER TO postgres;

--
-- Name: activity_logs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.activity_logs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.activity_logs_id_seq OWNER TO postgres;

--
-- Name: activity_logs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.activity_logs_id_seq OWNED BY public.activity_logs.id;


--
-- Name: branches; Type: TABLE; Schema: public; Owner: postgres
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
    google_maps_url character varying(255),
    image_url character varying(255),
    has_workshop boolean DEFAULT true NOT NULL,
    has_mobile_workshop boolean DEFAULT false NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    sort_order integer DEFAULT 0 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.branches OWNER TO postgres;

--
-- Name: branches_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.branches_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.branches_id_seq OWNER TO postgres;

--
-- Name: branches_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.branches_id_seq OWNED BY public.branches.id;


--
-- Name: brands; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.brands (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    logo_url character varying(255),
    is_active boolean DEFAULT true NOT NULL,
    sort_order integer DEFAULT 0 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.brands OWNER TO postgres;

--
-- Name: brands_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.brands_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.brands_id_seq OWNER TO postgres;

--
-- Name: brands_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.brands_id_seq OWNED BY public.brands.id;


--
-- Name: cache; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration bigint NOT NULL
);


ALTER TABLE public.cache OWNER TO postgres;

--
-- Name: cache_locks; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration bigint NOT NULL
);


ALTER TABLE public.cache_locks OWNER TO postgres;

--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.failed_jobs_id_seq OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: form_configs; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.form_configs OWNER TO postgres;

--
-- Name: form_configs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.form_configs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.form_configs_id_seq OWNER TO postgres;

--
-- Name: form_configs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.form_configs_id_seq OWNED BY public.form_configs.id;


--
-- Name: job_batches; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.job_batches OWNER TO postgres;

--
-- Name: jobs; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.jobs OWNER TO postgres;

--
-- Name: jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.jobs_id_seq OWNER TO postgres;

--
-- Name: jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;


--
-- Name: leads; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.leads OWNER TO postgres;

--
-- Name: leads_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.leads_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.leads_id_seq OWNER TO postgres;

--
-- Name: leads_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.leads_id_seq OWNED BY public.leads.id;


--
-- Name: menu_items; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.menu_items OWNER TO postgres;

--
-- Name: menu_items_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.menu_items_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.menu_items_id_seq OWNER TO postgres;

--
-- Name: menu_items_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.menu_items_id_seq OWNED BY public.menu_items.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: pages; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.pages OWNER TO postgres;

--
-- Name: pages_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pages_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.pages_id_seq OWNER TO postgres;

--
-- Name: pages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pages_id_seq OWNED BY public.pages.id;


--
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO postgres;

--
-- Name: podcasts; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.podcasts OWNER TO postgres;

--
-- Name: podcasts_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.podcasts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.podcasts_id_seq OWNER TO postgres;

--
-- Name: podcasts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.podcasts_id_seq OWNED BY public.podcasts.id;


--
-- Name: sessions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


ALTER TABLE public.sessions OWNER TO postgres;

--
-- Name: settings; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.settings OWNER TO postgres;

--
-- Name: settings_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.settings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.settings_id_seq OWNER TO postgres;

--
-- Name: settings_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.settings_id_seq OWNED BY public.settings.id;


--
-- Name: site_sections; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.site_sections OWNER TO postgres;

--
-- Name: site_sections_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.site_sections_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.site_sections_id_seq OWNER TO postgres;

--
-- Name: site_sections_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.site_sections_id_seq OWNED BY public.site_sections.id;


--
-- Name: sliders; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sliders (
    id bigint NOT NULL,
    tag character varying(255),
    title character varying(255) NOT NULL,
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
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.sliders OWNER TO postgres;

--
-- Name: sliders_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sliders_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.sliders_id_seq OWNER TO postgres;

--
-- Name: sliders_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.sliders_id_seq OWNED BY public.sliders.id;


--
-- Name: testimonials; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.testimonials OWNER TO postgres;

--
-- Name: testimonials_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.testimonials_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.testimonials_id_seq OWNER TO postgres;

--
-- Name: testimonials_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.testimonials_id_seq OWNED BY public.testimonials.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: vehicle_categories; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.vehicle_categories OWNER TO postgres;

--
-- Name: vehicle_categories_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.vehicle_categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.vehicle_categories_id_seq OWNER TO postgres;

--
-- Name: vehicle_categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.vehicle_categories_id_seq OWNED BY public.vehicle_categories.id;


--
-- Name: vehicle_images; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.vehicle_images OWNER TO postgres;

--
-- Name: vehicle_images_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.vehicle_images_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.vehicle_images_id_seq OWNER TO postgres;

--
-- Name: vehicle_images_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.vehicle_images_id_seq OWNED BY public.vehicle_images.id;


--
-- Name: vehicles; Type: TABLE; Schema: public; Owner: postgres
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
    transmission character varying(255) DEFAULT 'Automática'::character varying NOT NULL,
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
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.vehicles OWNER TO postgres;

--
-- Name: vehicles_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.vehicles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.vehicles_id_seq OWNER TO postgres;

--
-- Name: vehicles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.vehicles_id_seq OWNED BY public.vehicles.id;


--
-- Name: activity_logs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.activity_logs ALTER COLUMN id SET DEFAULT nextval('public.activity_logs_id_seq'::regclass);


--
-- Name: branches id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.branches ALTER COLUMN id SET DEFAULT nextval('public.branches_id_seq'::regclass);


--
-- Name: brands id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.brands ALTER COLUMN id SET DEFAULT nextval('public.brands_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: form_configs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.form_configs ALTER COLUMN id SET DEFAULT nextval('public.form_configs_id_seq'::regclass);


--
-- Name: jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);


--
-- Name: leads id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.leads ALTER COLUMN id SET DEFAULT nextval('public.leads_id_seq'::regclass);


--
-- Name: menu_items id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.menu_items ALTER COLUMN id SET DEFAULT nextval('public.menu_items_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: pages id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pages ALTER COLUMN id SET DEFAULT nextval('public.pages_id_seq'::regclass);


--
-- Name: podcasts id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.podcasts ALTER COLUMN id SET DEFAULT nextval('public.podcasts_id_seq'::regclass);


--
-- Name: settings id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.settings ALTER COLUMN id SET DEFAULT nextval('public.settings_id_seq'::regclass);


--
-- Name: site_sections id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.site_sections ALTER COLUMN id SET DEFAULT nextval('public.site_sections_id_seq'::regclass);


--
-- Name: sliders id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sliders ALTER COLUMN id SET DEFAULT nextval('public.sliders_id_seq'::regclass);


--
-- Name: testimonials id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.testimonials ALTER COLUMN id SET DEFAULT nextval('public.testimonials_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Name: vehicle_categories id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vehicle_categories ALTER COLUMN id SET DEFAULT nextval('public.vehicle_categories_id_seq'::regclass);


--
-- Name: vehicle_images id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vehicle_images ALTER COLUMN id SET DEFAULT nextval('public.vehicle_images_id_seq'::regclass);


--
-- Name: vehicles id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vehicles ALTER COLUMN id SET DEFAULT nextval('public.vehicles_id_seq'::regclass);


--
-- Data for Name: activity_logs; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.activity_logs VALUES (1, 1, 'system_init', NULL, NULL, 'Inicialización de datos del sistema, vehículos mock y configuraciones maestras.', NULL, '127.0.0.1', NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.activity_logs VALUES (2, 1, 'login', NULL, NULL, 'Inicio de sesión exitoso en el panel de administración.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-05 02:44:30', '2026-10-05 02:44:30');
INSERT INTO public.activity_logs VALUES (3, 1, 'login', NULL, NULL, 'Inicio de sesión exitoso en el panel de administración.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', '2026-10-05 13:26:08', '2026-10-05 13:26:08');
INSERT INTO public.activity_logs VALUES (4, 1, 'login', NULL, NULL, 'Inicio de sesión exitoso en el panel de administración.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-05 17:07:00', '2026-10-05 17:07:00');
INSERT INTO public.activity_logs VALUES (5, 1, 'login', NULL, NULL, 'Inicio de sesión exitoso en el panel de administración.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', '2026-10-05 20:11:59', '2026-10-05 20:11:59');
INSERT INTO public.activity_logs VALUES (6, 1, 'login', NULL, NULL, 'Inicio de sesión exitoso en el panel de administración.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-05 22:54:03', '2026-10-05 22:54:03');
INSERT INTO public.activity_logs VALUES (7, 1, 'login', NULL, NULL, 'Inicio de sesión exitoso en el panel de administración.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', '2026-10-05 23:11:56', '2026-10-05 23:11:56');
INSERT INTO public.activity_logs VALUES (8, 1, 'banner_manage', 'App\Models\Slider', 1, 'Gestión de slider: TU AUTO, TU ESTILO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', '2026-10-05 23:18:44', '2026-10-05 23:18:44');
INSERT INTO public.activity_logs VALUES (9, 1, 'update_form_config', 'App\Models\FormConfig', 1, 'Actualizó la configuración del formulario: Cotización de Portada (Home)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', '2026-10-05 23:19:34', '2026-10-05 23:19:34');
INSERT INTO public.activity_logs VALUES (10, 1, 'update_settings', NULL, NULL, 'Actualizó la tasa de cambio USD a PYG: 7850', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', '2026-10-05 23:23:56', '2026-10-05 23:23:56');
INSERT INTO public.activity_logs VALUES (11, 1, 'logout', NULL, NULL, 'Cierre de sesión de usuario.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-05 23:40:52', '2026-10-05 23:40:52');
INSERT INTO public.activity_logs VALUES (12, 4, 'login', NULL, NULL, 'Inicio de sesión exitoso en el panel de administración.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-05 23:41:12', '2026-10-05 23:41:12');
INSERT INTO public.activity_logs VALUES (13, 4, 'logout', NULL, NULL, 'Cierre de sesión de usuario.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-05 23:41:49', '2026-10-05 23:41:49');
INSERT INTO public.activity_logs VALUES (14, 3, 'login', NULL, NULL, 'Inicio de sesión exitoso en el panel de administración.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-05 23:42:08', '2026-10-05 23:42:08');
INSERT INTO public.activity_logs VALUES (15, 3, 'logout', NULL, NULL, 'Cierre de sesión de usuario.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-05 23:42:57', '2026-10-05 23:42:57');
INSERT INTO public.activity_logs VALUES (16, 1, 'login', NULL, NULL, 'Inicio de sesión exitoso en el panel de administración.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-05 23:43:24', '2026-10-05 23:43:24');
INSERT INTO public.activity_logs VALUES (17, 1, 'create_user', 'App\Models\User', 5, 'Creó nuevo usuario: Lautaro Gimenez (vendedor)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-05 23:58:35', '2026-10-05 23:58:35');
INSERT INTO public.activity_logs VALUES (18, 1, 'crm_update', 'App\Models\Lead', 3, 'Actualizó lead #3 (Carlos Benítez) de ''nuevo'' a ''en_gestion''', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-06 00:05:13', '2026-10-06 00:05:13');
INSERT INTO public.activity_logs VALUES (19, 1, 'logout', NULL, NULL, 'Cierre de sesión de usuario.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-06 00:06:03', '2026-10-06 00:06:03');
INSERT INTO public.activity_logs VALUES (20, 4, 'login', NULL, NULL, 'Inicio de sesión exitoso en el panel de administración.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-06 00:06:51', '2026-10-06 00:06:51');
INSERT INTO public.activity_logs VALUES (21, 4, 'crm_claim', 'App\Models\Lead', 6, 'Rodrigo Alcaraz (Asesor Comercial) tomó el lead #6 (Fernando Giménez)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-06 00:07:31', '2026-10-06 00:07:31');
INSERT INTO public.activity_logs VALUES (22, 4, 'logout', NULL, NULL, 'Cierre de sesión de usuario.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-06 00:21:17', '2026-10-06 00:21:17');
INSERT INTO public.activity_logs VALUES (23, 1, 'login', NULL, NULL, 'Inicio de sesión exitoso en el panel de administración.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-06 00:21:28', '2026-10-06 00:21:28');
INSERT INTO public.activity_logs VALUES (24, 1, 'logout', NULL, NULL, 'Cierre de sesión de usuario.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-06 00:23:54', '2026-10-06 00:23:54');
INSERT INTO public.activity_logs VALUES (25, 4, 'login', NULL, NULL, 'Inicio de sesión exitoso en el panel de administración.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', '2026-10-06 00:24:49', '2026-10-06 00:24:49');
INSERT INTO public.activity_logs VALUES (26, 1, 'login', NULL, NULL, 'Inicio de sesión exitoso en el panel de administración.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0', '2026-10-08 12:45:46', '2026-10-08 12:45:46');
INSERT INTO public.activity_logs VALUES (27, 1, 'login', NULL, NULL, 'Inicio de sesión exitoso en el panel de administración.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0', '2026-10-27 21:23:28', '2026-10-27 21:23:28');
INSERT INTO public.activity_logs VALUES (28, 1, 'deleted_menu_item', NULL, NULL, 'Eliminó el ítem de menú Podcast (#10)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0', '2026-10-28 00:00:01', '2026-10-28 00:00:01');
INSERT INTO public.activity_logs VALUES (29, 1, 'deleted_menu_item', NULL, NULL, 'Eliminó el ítem de menú Sucursales (#11)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0', '2026-10-28 00:00:03', '2026-10-28 00:00:03');
INSERT INTO public.activity_logs VALUES (30, 1, 'deleted_menu_item', NULL, NULL, 'Eliminó el ítem de menú Consur Bike (#8)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0', '2026-10-28 00:00:08', '2026-10-28 00:00:08');
INSERT INTO public.activity_logs VALUES (31, 1, 'deleted_menu_item', NULL, NULL, 'Eliminó el ítem de menú Consur Shop (#9)', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0', '2026-10-28 00:00:11', '2026-10-28 00:00:11');
INSERT INTO public.activity_logs VALUES (32, 1, 'login', NULL, NULL, 'Inicio de sesión exitoso en el panel de administración.', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0', '2026-10-28 12:37:23', '2026-10-28 12:37:23');


--
-- Data for Name: branches; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.branches VALUES (1, 'Consur S.A. – Casa Central Encarnación', 'Encarnación', 'Ruta 1 Km 2.5 y Avda. San Roque González', '+595 71 204 106', '+595985804106', 'ventas@consur.com.py', '07:00 a 12:00 | 14:00 a 17:30', '07:30 a 12:00', 'https://maps.google.com/?q=Consur+SA+Toyota+Encarnacion', NULL, true, true, true, 1, '2026-10-05 02:20:24', '2026-10-05 02:20:24');
INSERT INTO public.branches VALUES (2, 'Consur S.A. – Sucursal Colonias Unidas', 'Hohenau', 'Avda. Osvaldo Tischler c/ Ruta 6', '+595 775 232 400', '+595985204106', 'colonias@consur.com.py', '07:00 a 12:00 | 13:30 a 17:00', '07:30 a 12:00', NULL, NULL, true, true, true, 2, '2026-10-05 02:20:24', '2026-10-05 02:20:24');


--
-- Data for Name: brands; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.brands VALUES (1, 'Toyota', 'toyota', NULL, true, 1, '2026-10-05 02:20:24', '2026-10-05 02:20:24');
INSERT INTO public.brands VALUES (2, 'Lexus', 'lexus', NULL, true, 2, '2026-10-05 02:20:24', '2026-10-05 02:20:24');
INSERT INTO public.brands VALUES (3, 'Jeep', 'jeep', NULL, true, 3, '2026-10-05 02:20:24', '2026-10-05 02:20:24');
INSERT INTO public.brands VALUES (4, 'Kia', 'kia', NULL, true, 4, '2026-10-05 02:20:24', '2026-10-05 02:20:24');
INSERT INTO public.brands VALUES (5, 'Hyundai', 'hyundai', NULL, true, 5, '2026-10-05 02:20:24', '2026-10-05 02:20:24');


--
-- Data for Name: cache; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.cache VALUES ('consur-sa-cache-setting_usd_to_pyg_rate', 's:4:"7850";', 2106604559);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_site_logo_type', 's:4:"text";', 2106610588);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_site_logo_url', 's:66:"https://consur.com.py/wp-content/uploads/2019/07/logoconsurweb.png";', 2106610588);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_site_logo_text_prefix', 's:6:"CONSUR";', 2106610588);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_site_logo_text_suffix', 's:1:".";', 2106610588);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_site_logo_badge', 's:6:"TOYOTA";', 2106610588);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_site_favicon_url', 's:0:"";', 2106610588);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_company_name', 's:44:"Consur S.A. – Concesionaria Oficial Toyota";', 2106610588);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_contact_phone', 's:16:"+595 985 804 106";', 2106610588);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_contact_whatsapp', 's:12:"595985204106";', 2106610588);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_contact_email', 's:22:"contacto@consur.com.py";', 2106610588);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_schedule_info', 's:62:"Lun a Vie: 7:00 a 12:00 • 14:00 a 17:30 | Sáb: 7:30 a 12:00";', 2106610588);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_turnos_url', 's:44:"http://www.turnos365.com/turnos.aspx?con=131";', 2106610588);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_facebook_url', 's:38:"https://www.facebook.com/ConsurToyota/";', 2106610588);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_instagram_url', 's:40:"https://www.instagram.com/consur_toyota/";', 2106610588);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_tiktok_url', 's:36:"https://www.tiktok.com/@consurtoyota";', 2106610588);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_spotify_url', 's:52:"https://open.spotify.com/show/2c7HzcDvLF5XXMPbOckJn2";', 2106610588);
INSERT INTO public.cache VALUES ('consur-sa-cache-roster:project:v3:aa5d3ba4b92d5dae92443f5f894eac9f', 'TzoyNjoiTGFyYXZlbFxSb3N0ZXJcUHJvamVjdFNjYW4iOjg6e3M6ODoiYmFzZVBhdGgiO3M6NjU6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcIjtzOjM6InBocCI7TzozNToiTGFyYXZlbFxSb3N0ZXJcRWNvc3lzdGVtc1xFY29zeXN0ZW0iOjI6e3M6OToiACoAYnlOYW1lIjthOjExNjp7czoxMDoiYnJpY2svbWF0aCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjEwOiJicmljay9tYXRoIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjEuMC4wIjtzOjk6IgAqAHNvdXJjZSI7RTo0MzoiTGFyYXZlbFxSb3N0ZXJcRW51bXNcUGFja2FnZVNvdXJjZTpDb21wb3NlciI7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODI6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXGJyaWNrXG1hdGgiO31zOjMxOiJjYXJib25waHAvY2FyYm9uLWRvY3RyaW5lLXR5cGVzIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MzE6ImNhcmJvbnBocC9jYXJib24tZG9jdHJpbmUtdHlwZXMiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMy4yLjEiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6MTAzOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxjYXJib25waHBcY2FyYm9uLWRvY3RyaW5lLXR5cGVzIjt9czoyMzoiZGZseWRldi9kb3QtYWNjZXNzLWRhdGEiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyMzoiZGZseWRldi9kb3QtYWNjZXNzLWRhdGEiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMy4wLjMiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTU6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXGRmbHlkZXZcZG90LWFjY2Vzcy1kYXRhIjt9czoxODoiZG9jdHJpbmUvaW5mbGVjdG9yIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTg6ImRvY3RyaW5lL2luZmxlY3RvciI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIyLjEuMCI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo5MDoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3JcZG9jdHJpbmVcaW5mbGVjdG9yIjt9czoxNDoiZG9jdHJpbmUvbGV4ZXIiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxNDoiZG9jdHJpbmUvbGV4ZXIiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMy4wLjMiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODY6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXGRvY3RyaW5lXGxleGVyIjt9czoyOToiZHJhZ29ubWFudGFuay9jcm9uLWV4cHJlc3Npb24iO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyOToiZHJhZ29ubWFudGFuay9jcm9uLWV4cHJlc3Npb24iO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMy42LjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6MTAxOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxkcmFnb25tYW50YW5rXGNyb24tZXhwcmVzc2lvbiI7fXM6MjM6ImVndWxpYXMvZW1haWwtdmFsaWRhdG9yIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MjM6ImVndWxpYXMvZW1haWwtdmFsaWRhdG9yIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjQuMC40IjtzOjk6IgAqAHNvdXJjZSI7cjo4O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjk1OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxlZ3VsaWFzXGVtYWlsLXZhbGlkYXRvciI7fXM6MTg6ImZydWl0Y2FrZS9waHAtY29ycyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE4OiJmcnVpdGNha2UvcGhwLWNvcnMiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMS40LjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTA6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXGZydWl0Y2FrZVxwaHAtY29ycyI7fXM6Mjc6ImdyYWhhbS1jYW1wYmVsbC9yZXN1bHQtdHlwZSI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjI3OiJncmFoYW0tY2FtcGJlbGwvcmVzdWx0LXR5cGUiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMS4yLjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTk6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXGdyYWhhbS1jYW1wYmVsbFxyZXN1bHQtdHlwZSI7fXM6MTc6Imd1enpsZWh0dHAvZ3V6emxlIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTc6Imd1enpsZWh0dHAvZ3V6emxlIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjguMi4wIjtzOjk6IgAqAHNvdXJjZSI7cjo4O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjg5OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxndXp6bGVodHRwXGd1enpsZSI7fXM6MTk6Imd1enpsZWh0dHAvcHJvbWlzZXMiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxOToiZ3V6emxlaHR0cC9wcm9taXNlcyI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIzLjAuMiI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo5MToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3JcZ3V6emxlaHR0cFxwcm9taXNlcyI7fXM6MTU6Imd1enpsZWh0dHAvcHNyNyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE1OiJndXp6bGVodHRwL3BzcjciO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMy4xLjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODc6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXGd1enpsZWh0dHBccHNyNyI7fXM6MjM6Imd1enpsZWh0dHAvdXJpLXRlbXBsYXRlIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MjM6Imd1enpsZWh0dHAvdXJpLXRlbXBsYXRlIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjIuMC4xIjtzOjk6IgAqAHNvdXJjZSI7cjo4O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjk1OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxndXp6bGVodHRwXHVyaS10ZW1wbGF0ZSI7fXM6MTc6ImxhcmF2ZWwvZnJhbWV3b3JrIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTc6ImxhcmF2ZWwvZnJhbWV3b3JrIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjc6IjEzLjM0LjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjoxO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6NjoiXjEzLjE3IjtzOjc6IgAqAHBhdGgiO3M6ODk6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXGxhcmF2ZWxcZnJhbWV3b3JrIjt9czoxNToibGFyYXZlbC9wcm9tcHRzIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTU6ImxhcmF2ZWwvcHJvbXB0cyI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIwLjMuMjQiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODc6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXGxhcmF2ZWxccHJvbXB0cyI7fXM6Mjg6ImxhcmF2ZWwvc2VyaWFsaXphYmxlLWNsb3N1cmUiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyODoibGFyYXZlbC9zZXJpYWxpemFibGUtY2xvc3VyZSI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIyLjEuMCI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMDA6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXGxhcmF2ZWxcc2VyaWFsaXphYmxlLWNsb3N1cmUiO31zOjE0OiJsYXJhdmVsL3RpbmtlciI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE0OiJsYXJhdmVsL3RpbmtlciI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIzLjAuMiI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjE7czoxMzoiACoAY29uc3RyYWludCI7czo0OiJeMy4wIjtzOjc6IgAqAHBhdGgiO3M6ODY6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXGxhcmF2ZWxcdGlua2VyIjt9czoxNzoibGVhZ3VlL2NvbW1vbm1hcmsiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxNzoibGVhZ3VlL2NvbW1vbm1hcmsiO3M6MTA6IgAqAHZlcnNpb24iO3M6NjoiMi4xMC4zIjtzOjk6IgAqAHNvdXJjZSI7cjo4O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjg5OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxsZWFndWVcY29tbW9ubWFyayI7fXM6MTM6ImxlYWd1ZS9jb25maWciO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxMzoibGVhZ3VlL2NvbmZpZyI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIxLjIuMCI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4NToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3JcbGVhZ3VlXGNvbmZpZyI7fXM6MTY6ImxlYWd1ZS9mbHlzeXN0ZW0iO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxNjoibGVhZ3VlL2ZseXN5c3RlbSI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIzLjM2LjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODg6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXGxlYWd1ZVxmbHlzeXN0ZW0iO31zOjIyOiJsZWFndWUvZmx5c3lzdGVtLWxvY2FsIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MjI6ImxlYWd1ZS9mbHlzeXN0ZW0tbG9jYWwiO3M6MTA6IgAqAHZlcnNpb24iO3M6NjoiMy4zNS4zIjtzOjk6IgAqAHNvdXJjZSI7cjo4O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjk0OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxsZWFndWVcZmx5c3lzdGVtLWxvY2FsIjt9czoyNjoibGVhZ3VlL21pbWUtdHlwZS1kZXRlY3Rpb24iO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyNjoibGVhZ3VlL21pbWUtdHlwZS1kZXRlY3Rpb24iO3M6MTA6IgAqAHZlcnNpb24iO3M6NjoiMS4xNy4wIjtzOjk6IgAqAHNvdXJjZSI7cjo4O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjk4OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxsZWFndWVcbWltZS10eXBlLWRldGVjdGlvbiI7fXM6MTA6ImxlYWd1ZS91cmkiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxMDoibGVhZ3VlL3VyaSI7czoxMDoiACoAdmVyc2lvbiI7czo1OiI3LjguMSI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4MjoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3JcbGVhZ3VlXHVyaSI7fXM6MjE6ImxlYWd1ZS91cmktaW50ZXJmYWNlcyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjIxOiJsZWFndWUvdXJpLWludGVyZmFjZXMiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNy44LjEiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTM6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXGxlYWd1ZVx1cmktaW50ZXJmYWNlcyI7fXM6MTc6ImxpdmV3aXJlL2xpdmV3aXJlIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTc6ImxpdmV3aXJlL2xpdmV3aXJlIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjQuNC43IjtzOjk6IgAqAHNvdXJjZSI7cjo4O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MTtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjQ6Il40LjQiO3M6NzoiACoAcGF0aCI7czo4OToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3JcbGl2ZXdpcmVcbGl2ZXdpcmUiO31zOjE1OiJtb25vbG9nL21vbm9sb2ciO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxNToibW9ub2xvZy9tb25vbG9nIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjMuMTIuMSI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4NzoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3JcbW9ub2xvZ1xtb25vbG9nIjt9czoxMzoibmVzYm90L2NhcmJvbiI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjEzOiJuZXNib3QvY2FyYm9uIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjMuMTQuMiI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4NToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3JcbmVzYm90XGNhcmJvbiI7fXM6MTI6Im5ldHRlL3NjaGVtYSI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjEyOiJuZXR0ZS9zY2hlbWEiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMS4zLjYiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODQ6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXG5ldHRlXHNjaGVtYSI7fXM6MTE6Im5ldHRlL3V0aWxzIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTE6Im5ldHRlL3V0aWxzIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjQuMS41IjtzOjk6IgAqAHNvdXJjZSI7cjo4O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjgzOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxuZXR0ZVx1dGlscyI7fXM6MTY6Im5pa2ljL3BocC1wYXJzZXIiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxNjoibmlraWMvcGhwLXBhcnNlciI7czoxMDoiACoAdmVyc2lvbiI7czo1OiI1LjkuMCI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4ODoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3JcbmlraWNccGhwLXBhcnNlciI7fXM6MTk6Im51bm9tYWR1cm8vdGVybXdpbmQiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxOToibnVub21hZHVyby90ZXJtd2luZCI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIyLjQuMCI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo5MToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3JcbnVub21hZHVyb1x0ZXJtd2luZCI7fXM6MTk6InBocG9wdGlvbi9waHBvcHRpb24iO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxOToicGhwb3B0aW9uL3BocG9wdGlvbiI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxLjEwLjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTE6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHBocG9wdGlvblxwaHBvcHRpb24iO31zOjk6InBzci9jbG9jayI7TzoyMjoi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IjtzOjgxOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxwc3lccHN5c2giO31zOjE3OiJyYW1zZXkvY29sbGVjdGlvbiI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE3OiJyYW1zZXkvY29sbGVjdGlvbiI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIyLjEuMSI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4OToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3JccmFtc2V5XGNvbGxlY3Rpb24iO31zOjExOiJyYW1zZXkvdXVpZCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjExOiJyYW1zZXkvdXVpZCI7czoxMDoiACoAdmVyc2lvbiI7czo1OiI0LjkuNCI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4MzoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3JccmFtc2V5XHV1aWQiO31zOjEzOiJzeW1mb255L2Nsb2NrIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTM6InN5bWZvbnkvY2xvY2siO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNy40LjgiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODU6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHN5bWZvbnlcY2xvY2siO31zOjE1OiJzeW1mb255L2NvbnNvbGUiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxNToic3ltZm9ueS9jb25zb2xlIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjcuNC4yMCI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4NzoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3Jcc3ltZm9ueVxjb25zb2xlIjt9czoyMDoic3ltZm9ueS9jc3Mtc2VsZWN0b3IiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyMDoic3ltZm9ueS9jc3Mtc2VsZWN0b3IiO3M6MTA6IgAqAHZlcnNpb24iO3M6NjoiNy40LjE4IjtzOjk6IgAqAHNvdXJjZSI7cjo4O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjkyOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxzeW1mb255XGNzcy1zZWxlY3RvciI7fXM6Mjk6InN5bWZvbnkvZGVwcmVjYXRpb24tY29udHJhY3RzIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6Mjk6InN5bWZvbnkvZGVwcmVjYXRpb24tY29udHJhY3RzIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjMuNy4xIjtzOjk6IgAqAHNvdXJjZSI7cjo4O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjEwMToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3Jcc3ltZm9ueVxkZXByZWNhdGlvbi1jb250cmFjdHMiO31zOjIxOiJzeW1mb255L2Vycm9yLWhhbmRsZXIiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyMToic3ltZm9ueS9lcnJvci1oYW5kbGVyIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjcuNC4yMCI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo5MzoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3Jcc3ltZm9ueVxlcnJvci1oYW5kbGVyIjt9czoyNDoic3ltZm9ueS9ldmVudC1kaXNwYXRjaGVyIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MjQ6InN5bWZvbnkvZXZlbnQtZGlzcGF0Y2hlciI7czoxMDoiACoAdmVyc2lvbiI7czo2OiI3LjQuMTciO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTY6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHN5bWZvbnlcZXZlbnQtZGlzcGF0Y2hlciI7fXM6MzQ6InN5bWZvbnkvZXZlbnQtZGlzcGF0Y2hlci1jb250cmFjdHMiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czozNDoic3ltZm9ueS9ldmVudC1kaXNwYXRjaGVyLWNvbnRyYWN0cyI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIzLjcuMSI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMDY6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHN5bWZvbnlcZXZlbnQtZGlzcGF0Y2hlci1jb250cmFjdHMiO31zOjE0OiJzeW1mb255L2ZpbmRlciI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE0OiJzeW1mb255L2ZpbmRlciI7czoxMDoiACoAdmVyc2lvbiI7czo2OiI3LjQuMjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODY6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHN5bWZvbnlcZmluZGVyIjt9czoyMzoic3ltZm9ueS9odHRwLWZvdW5kYXRpb24iO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyMzoic3ltZm9ueS9odHRwLWZvdW5kYXRpb24iO3M6MTA6IgAqAHZlcnNpb24iO3M6NjoiNy40LjIwIjtzOjk6IgAqAHNvdXJjZSI7cjo4O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjk1OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxzeW1mb255XGh0dHAtZm91bmRhdGlvbiI7fXM6MTk6InN5bWZvbnkvaHR0cC1rZXJuZWwiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxOToic3ltZm9ueS9odHRwLWtlcm5lbCI7czoxMDoiACoAdmVyc2lvbiI7czo2OiI3LjQuMjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTE6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHN5bWZvbnlcaHR0cC1rZXJuZWwiO31zOjE0OiJzeW1mb255L21haWxlciI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE0OiJzeW1mb255L21haWxlciI7czoxMDoiACoAdmVyc2lvbiI7czo2OiI3LjQuMTkiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODY6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHN5bWZvbnlcbWFpbGVyIjt9czoxMjoic3ltZm9ueS9taW1lIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTI6InN5bWZvbnkvbWltZSI7czoxMDoiACoAdmVyc2lvbiI7czo2OiI3LjQuMTkiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODQ6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHN5bWZvbnlcbWltZSI7fXM6MjI6InN5bWZvbnkvcG9seWZpbGwtY3R5cGUiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyMjoic3ltZm9ueS9wb2x5ZmlsbC1jdHlwZSI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxLjM3LjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTQ6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHN5bWZvbnlccG9seWZpbGwtY3R5cGUiO31zOjMwOiJzeW1mb255L3BvbHlmaWxsLWludGwtZ3JhcGhlbWUiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czozMDoic3ltZm9ueS9wb2x5ZmlsbC1pbnRsLWdyYXBoZW1lIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjEuNDMuMCI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMDI6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHN5bWZvbnlccG9seWZpbGwtaW50bC1ncmFwaGVtZSI7fXM6MjU6InN5bWZvbnkvcG9seWZpbGwtaW50bC1pZG4iO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyNToic3ltZm9ueS9wb2x5ZmlsbC1pbnRsLWlkbiI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxLjQzLjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTc6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHN5bWZvbnlccG9seWZpbGwtaW50bC1pZG4iO31zOjMyOiJzeW1mb255L3BvbHlmaWxsLWludGwtbm9ybWFsaXplciI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjMyOiJzeW1mb255L3BvbHlmaWxsLWludGwtbm9ybWFsaXplciI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxLjQzLjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6MTA0OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxzeW1mb255XHBvbHlmaWxsLWludGwtbm9ybWFsaXplciI7fXM6MjU6InN5bWZvbnkvcG9seWZpbGwtbWJzdHJpbmciO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyNToic3ltZm9ueS9wb2x5ZmlsbC1tYnN0cmluZyI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxLjQzLjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTc6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHN5bWZvbnlccG9seWZpbGwtbWJzdHJpbmciO31zOjIyOiJzeW1mb255L3BvbHlmaWxsLXBocDgwIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MjI6InN5bWZvbnkvcG9seWZpbGwtcGhwODAiO3M6MTA6IgAqAHZlcnNpb24iO3M6NjoiMS40My4wIjtzOjk6IgAqAHNvdXJjZSI7cjo4O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjk0OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxzeW1mb255XHBvbHlmaWxsLXBocDgwIjt9czoyMjoic3ltZm9ueS9wb2x5ZmlsbC1waHA4MiI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjIyOiJzeW1mb255L3BvbHlmaWxsLXBocDgyIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjEuNDMuMCI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo5NDoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3Jcc3ltZm9ueVxwb2x5ZmlsbC1waHA4MiI7fXM6MjI6InN5bWZvbnkvcG9seWZpbGwtcGhwODMiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyMjoic3ltZm9ueS9wb2x5ZmlsbC1waHA4MyI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxLjQzLjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTQ6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHN5bWZvbnlccG9seWZpbGwtcGhwODMiO31zOjIyOiJzeW1mb255L3BvbHlmaWxsLXBocDg0IjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MjI6InN5bWZvbnkvcG9seWZpbGwtcGhwODQiO3M6MTA6IgAqAHZlcnNpb24iO3M6NjoiMS40My4wIjtzOjk6IgAqAHNvdXJjZSI7cjo4O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjk0OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxzeW1mb255XHBvbHlmaWxsLXBocDg0Ijt9czoyMjoic3ltZm9ueS9wb2x5ZmlsbC1waHA4NSI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjIyOiJzeW1mb255L3BvbHlmaWxsLXBocDg1IjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjEuNDMuMCI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo5NDoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3Jcc3ltZm9ueVxwb2x5ZmlsbC1waHA4NSI7fXM6MjI6InN5bWZvbnkvcG9seWZpbGwtcGhwODYiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyMjoic3ltZm9ueS9wb2x5ZmlsbC1waHA4NiI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxLjQzLjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTQ6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHN5bWZvbnlccG9seWZpbGwtcGhwODYiO31zOjIxOiJzeW1mb255L3BvbHlmaWxsLXV1aWQiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyMToic3ltZm9ueS9wb2x5ZmlsbC11dWlkIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjEuNDMuMCI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo5MzoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3Jcc3ltZm9ueVxwb2x5ZmlsbC11dWlkIjt9czoxNToic3ltZm9ueS9wcm9jZXNzIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTU6InN5bWZvbnkvcHJvY2VzcyI7czoxMDoiACoAdmVyc2lvbiI7czo2OiI3LjQuMTkiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODc6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHN5bWZvbnlccHJvY2VzcyI7fXM6MTU6InN5bWZvbnkvcm91dGluZyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE1OiJzeW1mb255L3JvdXRpbmciO3M6MTA6IgAqAHZlcnNpb24iO3M6NjoiNy40LjIwIjtzOjk6IgAqAHNvdXJjZSI7cjo4O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjg3OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxzeW1mb255XHJvdXRpbmciO31zOjI1OiJzeW1mb255L3NlcnZpY2UtY29udHJhY3RzIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MjU6InN5bWZvbnkvc2VydmljZS1jb250cmFjdHMiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMy43LjMiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTc6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHN5bWZvbnlcc2VydmljZS1jb250cmFjdHMiO31zOjE0OiJzeW1mb255L3N0cmluZyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE0OiJzeW1mb255L3N0cmluZyI7czoxMDoiACoAdmVyc2lvbiI7czo2OiI3LjQuMTkiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODY6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHN5bWZvbnlcc3RyaW5nIjt9czoxOToic3ltZm9ueS90cmFuc2xhdGlvbiI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE5OiJzeW1mb255L3RyYW5zbGF0aW9uIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjcuNC4xNyI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo5MToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3Jcc3ltZm9ueVx0cmFuc2xhdGlvbiI7fXM6Mjk6InN5bWZvbnkvdHJhbnNsYXRpb24tY29udHJhY3RzIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6Mjk6InN5bWZvbnkvdHJhbnNsYXRpb24tY29udHJhY3RzIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjMuNy4xIjtzOjk6IgAqAHNvdXJjZSI7cjo4O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjEwMToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3Jcc3ltZm9ueVx0cmFuc2xhdGlvbi1jb250cmFjdHMiO31zOjExOiJzeW1mb255L3VpZCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjExOiJzeW1mb255L3VpZCI7czoxMDoiACoAdmVyc2lvbiI7czo2OiI3LjQuMjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODM6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHN5bWZvbnlcdWlkIjt9czoxODoic3ltZm9ueS92YXItZHVtcGVyIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTg6InN5bWZvbnkvdmFyLWR1bXBlciI7czoxMDoiACoAdmVyc2lvbiI7czo2OiI3LjQuMTgiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTA6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHN5bWZvbnlcdmFyLWR1bXBlciI7fXM6MzM6InRpanN2ZXJrb3llbi9jc3MtdG8taW5saW5lLXN0eWxlcyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjMzOiJ0aWpzdmVya295ZW4vY3NzLXRvLWlubGluZS1zdHlsZXMiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMi40LjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6MTA1OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclx0aWpzdmVya295ZW5cY3NzLXRvLWlubGluZS1zdHlsZXMiO31zOjE2OiJ2bHVjYXMvcGhwZG90ZW52IjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTY6InZsdWNhcy9waHBkb3RlbnYiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNS43LjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODg6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHZsdWNhc1xwaHBkb3RlbnYiO31zOjE5OiJ2b2t1L3BvcnRhYmxlLWFzY2lpIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTk6InZva3UvcG9ydGFibGUtYXNjaWkiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMi4xLjEiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTE6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHZva3VccG9ydGFibGUtYXNjaWkiO31zOjE1OiJjb21wb3Nlci9zZW12ZXIiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxNToiY29tcG9zZXIvc2VtdmVyIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjMuNS4xIjtzOjk6IgAqAHNvdXJjZSI7cjo4O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjg3OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxjb21wb3NlclxzZW12ZXIiO31zOjE0OiJmYWtlcnBocC9mYWtlciI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE0OiJmYWtlcnBocC9mYWtlciI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxLjI0LjEiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjoxO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6NToiXjEuMjMiO3M6NzoiACoAcGF0aCI7czo4NjoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3JcZmFrZXJwaHBcZmFrZXIiO31zOjExOiJmaWxwL3dob29wcyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjExOiJmaWxwL3dob29wcyI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIyLjE4LjYiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODM6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXGZpbHBcd2hvb3BzIjt9czoyMToiaGFtY3Jlc3QvaGFtY3Jlc3QtcGhw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AHBhdGgiO3M6ODM6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXGxhcmF2ZWxccGFvIjt9czoxMjoibGFyYXZlbC9waW50IjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTI6ImxhcmF2ZWwvcGludCI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxLjMyLjEiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjoxO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6NToiXjEuMjciO3M6NzoiACoAcGF0aCI7czo4NDoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3JcbGFyYXZlbFxwaW50Ijt9czoxNDoibGFyYXZlbC9yb3N0ZXIiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxNDoibGFyYXZlbC9yb3N0ZXIiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMS4wLjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODY6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXGxhcmF2ZWxccm9zdGVyIjt9czoxNToibW9ja2VyeS9tb2NrZXJ5IjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTU6Im1vY2tlcnkvbW9ja2VyeSI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxLjYuMTUiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjoxO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6NDoiXjEuNiI7czo3OiIAKgBwYXRoIjtzOjg3OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxtb2NrZXJ5XG1vY2tlcnkiO31zOjE3OiJteWNsYWJzL2RlZXAtY29weSI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE3OiJteWNsYWJzL2RlZXAtY29weSI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxLjE0LjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODk6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXG15Y2xhYnNcZGVlcC1jb3B5Ijt9czoyMDoibnVub21hZHVyby9jb2xsaXNpb24iO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyMDoibnVub21hZHVyby9jb2xsaXNpb24iO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiOC45LjUiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjoxO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6NDoiXjguNiI7czo3OiIAKgBwYXRoIjtzOjkyOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxudW5vbWFkdXJvXGNvbGxpc2lvbiI7fXM6MTY6InBoYXItaW8vbWFuaWZlc3QiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxNjoicGhhci1pby9tYW5pZmVzdCI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIyLjAuNCI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4ODoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3JccGhhci1pb1xtYW5pZmVzdCI7fXM6MTU6InBoYXItaW8vdmVyc2lvbiI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE1OiJwaGFyLWlvL3ZlcnNpb24iO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMy4yLjEiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODc6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHBoYXItaW9cdmVyc2lvbiI7fXM6MjU6InBocHVuaXQvcGhwLWNvZGUtY292ZXJhZ2UiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyNToicGhwdW5pdC9waHAtY29kZS1jb3ZlcmFnZSI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxMi41LjgiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTc6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHBocHVuaXRccGhwLWNvZGUtY292ZXJhZ2UiO31zOjI1OiJwaHB1bml0L3BocC1maWxlLWl0ZXJhdG9yIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MjU6InBocHVuaXQvcGhwLWZpbGUtaXRlcmF0b3IiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNi4wLjIiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTc6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHBocHVuaXRccGhwLWZpbGUtaXRlcmF0b3IiO31zOjE5OiJwaHB1bml0L3BocC1pbnZva2VyIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTk6InBocHVuaXQvcGhwLWludm9rZXIiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNi4wLjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTE6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHBocHVuaXRccGhwLWludm9rZXIiO31zOjI1OiJwaHB1bml0L3BocC10ZXh0LXRlbXBsYXRlIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MjU6InBocHVuaXQvcGhwLXRleHQtdGVtcGxhdGUiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNS4wLjEiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTc6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHBocHVuaXRccGhwLXRleHQtdGVtcGxhdGUiO31zOjE3OiJwaHB1bml0L3BocC10aW1lciI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE3OiJwaHB1bml0L3BocC10aW1lciI7czoxMDoiACoAdmVyc2lvbiI7czo1OiI4LjAuMCI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4OToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3JccGhwdW5pdFxwaHAtdGltZXIiO31zOjE1OiJwaHB1bml0L3BocHVuaXQiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxNToicGhwdW5pdC9waHB1bml0IjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjc6IjEyLjUuMzciO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjoxO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6ODoiXjEyLjUuMTIiO3M6NzoiACoAcGF0aCI7czo4NzoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3JccGhwdW5pdFxwaHB1bml0Ijt9czoyMDoic2ViYXN0aWFuL2NsaS1wYXJzZXIiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyMDoic2ViYXN0aWFuL2NsaS1wYXJzZXIiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNC4yLjEiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTI6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHNlYmFzdGlhblxjbGktcGFyc2VyIjt9czoyMDoic2ViYXN0aWFuL2NvbXBhcmF0b3IiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyMDoic2ViYXN0aWFuL2NvbXBhcmF0b3IiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNy4xLjgiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTI6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHNlYmFzdGlhblxjb21wYXJhdG9yIjt9czoyMDoic2ViYXN0aWFuL2NvbXBsZXhpdHkiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyMDoic2ViYXN0aWFuL2NvbXBsZXhpdHkiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNS4wLjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTI6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHNlYmFzdGlhblxjb21wbGV4aXR5Ijt9czoxNDoic2ViYXN0aWFuL2RpZmYiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxNDoic2ViYXN0aWFuL2RpZmYiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNy4wLjEiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODY6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHNlYmFzdGlhblxkaWZmIjt9czoyMToic2ViYXN0aWFuL2Vudmlyb25tZW50IjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MjE6InNlYmFzdGlhbi9lbnZpcm9ubWVudCI7czoxMDoiACoAdmVyc2lvbiI7czo1OiI4LjEuMiI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo5MzoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3Jcc2ViYXN0aWFuXGVudmlyb25tZW50Ijt9czoxODoic2ViYXN0aWFuL2V4cG9ydGVyIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTg6InNlYmFzdGlhbi9leHBvcnRlciI7czoxMDoiACoAdmVyc2lvbiI7czo1OiI3LjAuMyI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo5MDoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3Jcc2ViYXN0aWFuXGV4cG9ydGVyIjt9czoyMjoic2ViYXN0aWFuL2dsb2JhbC1zdGF0ZSI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjIyOiJzZWJhc3RpYW4vZ2xvYmFsLXN0YXRlIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjguMC4zIjtzOjk6IgAqAHNvdXJjZSI7cjo4O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjk0OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxzZWJhc3RpYW5cZ2xvYmFsLXN0YXRlIjt9czoyMzoic2ViYXN0aWFuL2xpbmVzLW9mLWNvZGUiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyMzoic2ViYXN0aWFuL2xpbmVzLW9mLWNvZGUiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNC4wLjEiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTU6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHNlYmFzdGlhblxsaW5lcy1vZi1jb2RlIjt9czoyNzoic2ViYXN0aWFuL29iamVjdC1lbnVtZXJhdG9yIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6Mjc6InNlYmFzdGlhbi9vYmplY3QtZW51bWVyYXRvciI7czoxMDoiACoAdmVyc2lvbiI7czo1OiI3LjAuMCI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo5OToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3Jcc2ViYXN0aWFuXG9iamVjdC1lbnVtZXJhdG9yIjt9czoyNjoic2ViYXN0aWFuL29iamVjdC1yZWZsZWN0b3IiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyNjoic2ViYXN0aWFuL29iamVjdC1yZWZsZWN0b3IiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNS4wLjAiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTg6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHNlYmFzdGlhblxvYmplY3QtcmVmbGVjdG9yIjt9czoyNzoic2ViYXN0aWFuL3JlY3Vyc2lvbi1jb250ZXh0IjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6Mjc6InNlYmFzdGlhbi9yZWN1cnNpb24tY29udGV4dCI7czoxMDoiACoAdmVyc2lvbiI7czo1OiI3LjAuMSI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo5OToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3Jcc2ViYXN0aWFuXHJlY3Vyc2lvbi1jb250ZXh0Ijt9czoxNDoic2ViYXN0aWFuL3R5cGUiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxNDoic2ViYXN0aWFuL3R5cGUiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNi4wLjQiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODY6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHNlYmFzdGlhblx0eXBlIjt9czoxNzoic2ViYXN0aWFuL3ZlcnNpb24iO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxNzoic2ViYXN0aWFuL3ZlcnNpb24iO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNi4wLjEiO3M6OToiACoAc291cmNlIjtyOjg7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODk6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcdmVuZG9yXHNlYmFzdGlhblx2ZXJzaW9uIjt9czoyODoic3RhYWJtL3NpZGUtZWZmZWN0cy1kZXRlY3RvciI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjI4OiJzdGFhYm0vc2lkZS1lZmZlY3RzLWRldGVjdG9yIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjEuMC41IjtzOjk6IgAqAHNvdXJjZSI7cjo4O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjEwMDoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3Jcc3RhYWJtXHNpZGUtZWZmZWN0cy1kZXRlY3RvciI7fXM6MTI6InN5bWZvbnkveWFtbCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjEyOiJzeW1mb255L3lhbWwiO3M6MTA6IgAqAHZlcnNpb24iO3M6NjoiNy40LjIwIjtzOjk6IgAqAHNvdXJjZSI7cjo4O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjg0OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XHZlbmRvclxzeW1mb255XHlhbWwiO31zOjE3OiJ0aGVzZWVyL3Rva2VuaXplciI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE3OiJ0aGVzZWVyL3Rva2VuaXplciI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIyLjAuMSI7czo5OiIAKgBzb3VyY2UiO3I6ODtzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4OToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVx2ZW5kb3JcdGhlc2Vlclx0b2tlbml6ZXIiO319czoxMToiACoAcGFja2FnZXMiO086MzI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2VDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjExNjp7aTowO3I6NTtpOjE7cjoxMztpOjI7cjoyMTtpOjM7cjoyOTtpOjQ7cjozNztpOjU7cjo0NTtpOjY7cjo1MztpOjc7cjo2MTtpOjg7cjo2OTtpOjk7cjo3NztpOjEwO3I6ODU7aToxMTtyOjkzO2k6MTI7cjoxMDE7aToxMztyOjEwOTtpOjE0O3I6MTE3O2k6MTU7cjoxMjU7aToxNjtyOjEzMztpOjE3O3I6MTQxO2k6MTg7cjoxNDk7aToxOTtyOjE1NztpOjIwO3I6MTY1O2k6MjE7cjoxNzM7aToyMjtyOjE4MTtpOjIzO3I6MTg5O2k6MjQ7cjoxOTc7aToyNTtyOjIwNTtpOjI2O3I6MjEzO2k6Mjc7cjoyMjE7aToyODtyOjIyOTtpOjI5O3I6MjM3O2k6MzA7cjoyNDU7aTozMTtyOjI1MztpOjMyO3I6MjYxO2k6MzM7cjoyNjk7aTozNDtyOjI3NztpOjM1O3I6Mjg1O2k6MzY7cjoyOTM7aTozNztyOjMwMTtpOjM4O3I6MzA5O2k6Mzk7cjozMTc7aTo0MDtyOjMyNTtpOjQxO3I6MzMzO2k6NDI7cjozNDE7aTo0MztyOjM0OTtpOjQ0O3I6MzU3O2k6NDU7cjozNjU7aTo0NjtyOjM3MztpOjQ3O3I6MzgxO2k6NDg7cjozODk7aTo0OTtyOjM5NztpOjUwO3I6NDA1O2k6NTE7cjo0MTM7aTo1MjtyOjQyMTtpOjUzO3I6NDI5O2k6NTQ7cjo0Mzc7aTo1NTtyOjQ0NTtpOjU2O3I6NDUzO2k6NTc7cjo0NjE7aTo1ODtyOjQ2OTtpOjU5O3I6NDc3O2k6NjA7cjo0ODU7aTo2MTtyOjQ5MztpOjYyO3I6NTAxO2k6NjM7cjo1MDk7aTo2NDtyOjUxNztpOjY1O3I6NTI1O2k6NjY7cjo1MzM7aTo2NztyOjU0MTtpOjY4O3I6NTQ5O2k6Njk7cjo1NTc7aTo3MDtyOjU2NTtpOjcxO3I6NTczO2k6NzI7cjo1ODE7aTo3MztyOjU4OTtpOjc0O3I6NTk3O2k6NzU7cjo2MDU7aTo3NjtyOjYxMztpOjc3O3I6NjIxO2k6Nzg7cjo2Mjk7aTo3OTtyOjYzNztpOjgwO3I6NjQ1O2k6ODE7cjo2NTM7aTo4MjtyOjY2MTtpOjgzO3I6NjY5O2k6ODQ7cjo2Nzc7aTo4NTtyOjY4NTtpOjg2O3I6NjkzO2k6ODc7cjo3MDE7aTo4ODtyOjcwOTtpOjg5O3I6NzE3O2k6OTA7cjo3MjU7aTo5MTtyOjczMztpOjkyO3I6NzQxO2k6OTM7cjo3NDk7aTo5NDtyOjc1NztpOjk1O3I6NzY1O2k6OTY7cjo3NzM7aTo5NztyOjc4MTtpOjk4O3I6Nzg5O2k6OTk7cjo3OTc7aToxMDA7cjo4MDU7aToxMDE7cjo4MTM7aToxMDI7cjo4MjE7aToxMDM7cjo4Mjk7aToxMDQ7cjo4Mzc7aToxMDU7cjo4NDU7aToxMDY7cjo4NTM7aToxMDc7cjo4NjE7aToxMDg7cjo4Njk7aToxMDk7cjo4Nzc7aToxMTA7cjo4ODU7aToxMTE7cjo4OTM7aToxMTI7cjo5MDE7aToxMTM7cjo5MDk7aToxMTQ7cjo5MTc7aToxMTU7cjo5MjU7fXM6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDt9fXM6MjoianMiO086Mzc6IkxhcmF2ZWxcUm9zdGVyXEVjb3N5c3RlbXNcSnNFY29zeXN0ZW0iOjM6e3M6OToiACoAYnlOYW1lIjthOjE4Nzp7czoyNDoiQGFsY2Fsem9uZS9hbnNpLXRva2VuaXplIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MjQ6IkBhbGNhbHpvbmUvYW5zaS10b2tlbml6ZSI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIwLjMuMSI7czo5OiIAKgBzb3VyY2UiO0U6Mzg6IkxhcmF2ZWxcUm9zdGVyXEVudW1zXFBhY2thZ2VTb3VyY2U6TnBtIjtzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMDI6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEBhbGNhbHpvbmVcYW5zaS10b2tlbml6ZSI7fXM6MTg6IkBsYXJhdmVsL211bHRpcGxleCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE4OiJAbGFyYXZlbC9tdWx0aXBsZXgiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMC40LjUiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjoxO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6NjoiXjAuNC4xIjtzOjc6IgAqAHBhdGgiO3M6OTY6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEBsYXJhdmVsXG11bHRpcGxleCI7fXM6MTI6ImFuc2ktZXNjYXBlcyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjEyOiJhbnNpLWVzY2FwZXMiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNy4zLjAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTA6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGFuc2ktZXNjYXBlcyI7fXM6MTA6ImFuc2ktcmVnZXgiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxMDoiYW5zaS1yZWdleCI7czoxMDoiACoAdmVyc2lvbiI7czo1OiI2LjQuMCI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4ODoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcYW5zaS1yZWdleCI7fXM6MTE6ImFuc2ktc3R5bGVzIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTE6ImFuc2ktc3R5bGVzIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjcuMC4wIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjg5OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xhbnNpLXN0eWxlcyI7fXM6OToiYXV0by1iaW5kIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6OToiYXV0by1iaW5kIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjUuMC4xIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjg3OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xhdXRvLWJpbmQiO31zOjU6ImNoYWxrIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6NToiY2hhbGsiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNS42LjIiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODM6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGNoYWxrIjt9czo5OiJjbGktYm94ZXMiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czo5OiJjbGktYm94ZXMiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNC4wLjEiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODc6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGNsaS1ib3hlcyI7fXM6MTA6ImNsaS1jdXJzb3IiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxMDoiY2xpLWN1cnNvciI7czoxMDoiACoAdmVyc2lvbiI7czo1OiI0LjAuMCI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4ODoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcY2xpLWN1cnNvciI7fXM6MTI6ImNsaS10cnVuY2F0ZSI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjEyOiJjbGktdHJ1bmNhdGUiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNi4xLjEiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTA6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGNsaS10cnVuY2F0ZSI7fXM6MTI6ImNvZGUtZXhjZXJwdCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjEyOiJjb2RlLWV4Y2VycHQiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNC4wLjAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTA6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGNvZGUtZXhjZXJwdCI7fXM6OToiY29tbWFuZGVyIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6OToiY29tbWFuZGVyIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjE1LjAuMCI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4NzoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcY29tbWFuZGVyIjt9czoxNzoiY29udmVydC10by1zcGFjZXMiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxNzoiY29udmVydC10by1zcGFjZXMiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMi4wLjEiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTU6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGNvbnZlcnQtdG8tc3BhY2VzIjt9czoxMToiZW52aXJvbm1lbnQiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxMToiZW52aXJvbm1lbnQiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMS4xLjAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODk6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGVudmlyb25tZW50Ijt9czoxMDoiZXMtdG9vbGtpdCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjEwOiJlcy10b29sa2l0IjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjEuNTIuMCI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4ODoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcZXMtdG9vbGtpdCI7fXM6MjA6ImVzY2FwZS1zdHJpbmctcmVnZXhwIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MjA6ImVzY2FwZS1zdHJpbmctcmVnZXhwIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjIuMC4wIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjk4OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xlc2NhcGUtc3RyaW5nLXJlZ2V4cCI7fXM6MjA6ImdldC1lYXN0LWFzaWFuLXdpZHRoIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MjA6ImdldC1lYXN0LWFzaWFuLXdpZHRoIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjEuNy4wIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjk4OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xnZXQtZWFzdC1hc2lhbi13aWR0aCI7fXM6MTM6ImluZGVudC1zdHJpbmciO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxMzoiaW5kZW50LXN0cmluZyI7czoxMDoiACoAdmVyc2lvbiI7czo1OiI1LjAuMCI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo5MToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcaW5kZW50LXN0cmluZyI7fXM6MzoiaW5rIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MzoiaW5rIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjcuMS4xIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjgxOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xpbmsiO31zOjIzOiJpcy1mdWxsd2lkdGgtY29kZS1wb2ludCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjIzOiJpcy1mdWxsd2lkdGgtY29kZS1wb2ludCI7czoxMDoiACoAdmVyc2lvbiI7czo1OiI1LjEuMCI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMDE6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGlzLWZ1bGx3aWR0aC1jb2RlLXBvaW50Ijt9czo4OiJpcy1pbi1jaSI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjg6ImlzLWluLWNpIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjIuMC4wIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjg2OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xpcy1pbi1jaSI7fXM6ODoibWltaWMtZm4iO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBh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ZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXHNsaWNlLWFuc2kiO31zOjExOiJzdGFjay11dGlscyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjExOiJzdGFjay11dGlscyI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIyLjAuNiI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4OToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcc3RhY2stdXRpbHMiO31zOjEyOiJzdHJpbmctd2lkdGgiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxMjoic3RyaW5nLXdpZHRoIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjguMy4wIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjkwOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xzdHJpbmctd2lkdGgiO31zOjEwOiJzdHJpcC1hbnNpIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTA6InN0cmlwLWFuc2kiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNy4yLjAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODg6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXHN0cmlwLWFuc2kiO31zOjEwOiJ0YWdnZWQtdGFnIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTA6InRhZ2dlZC10YWciO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMS4wLjAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODg6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXHRhZ2dlZC10YWciO31zOjEzOiJ0ZXJtaW5hbC1zaXplIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTM6InRlcm1pbmFsLXNpemUiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNC4wLjEiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTE6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXHRlcm1pbmFsLXNpemUiO31zOjk6InR5cGUtZmVzdCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjk6InR5cGUtZmVzdCI7czoxMDoiACoAdmVyc2lvbiI7czo2OiI1LjEwLjAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MDtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODc6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXHR5cGUtZmVzdCI7fXM6MTE6IndpZGVzdC1saW5lIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTE6IndpZGVzdC1saW5lIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjYuMC4wIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjA7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjg5OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1x3aWRlc3QtbGluZSI7fXM6OToid3JhcC1hbnNpIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6OToid3JhcC1hbnNpIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjEwLjAuMiI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4NzoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcd3JhcC1hbnNpIjt9czoyOiJ3cyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjI6IndzIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjguMjIuMCI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4MDoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcd3MiO31zOjExOiJ5b2dhLWxheW91dCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjExOiJ5b2dhLWxheW91dCI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIzLjIuMSI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjowO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4OToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNceW9nYS1sYXlvdXQiO31zOjE2OiJAYWxsb2MvcXVpY2stbHJ1IjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTY6IkBhbGxvYy9xdWljay1scnUiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNS4zLjAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTQ6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEBhbGxvY1xxdWljay1scnUiO31zOjIzOiJAanJpZGdld2VsbC9nZW4tbWFwcGluZyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjIzOiJAanJpZGdld2VsbC9nZW4tbWFwcGluZyI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIwLjMuMTMiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6MTAxOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xAanJpZGdld2VsbFxnZW4tbWFwcGluZyI7fXM6MjE6IkBqcmlkZ2V3ZWxsL3JlbWFwcGluZyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjIxOiJAanJpZGdld2VsbC9yZW1hcHBpbmciO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMi4zLjUiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTk6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEBqcmlkZ2V3ZWxsXHJlbWFwcGluZyI7fXM6MjM6IkBqcmlkZ2V3ZWxsL3Jlc29sdmUtdXJpIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MjM6IkBqcmlkZ2V3ZWxsL3Jlc29sdmUtdXJpIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjMuMS4yIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjEwMToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcQGpyaWRnZXdlbGxccmVzb2x2ZS11cmkiO31zOjI3OiJAanJpZGdld2VsbC9zb3VyY2VtYXAtY29kZWMiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyNzoiQGpyaWRnZXdlbGwvc291cmNlbWFwLWNvZGVjIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjEuNi4wIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjEwNToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcQGpyaWRnZXdlbGxcc291cmNlbWFwLWNvZGVjIjt9czoyNToiQGpyaWRnZXdlbGwvdHJhY2UtbWFwcGluZyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjI1OiJAanJpZGdld2VsbC90cmFjZS1tYXBwaW5nIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjAuMy4zMSI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMDM6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEBqcmlkZ2V3ZWxsXHRyYWNlLW1hcHBpbmciO31zOjE5OiJAbm9kZWxpYi9mcy5zY2FuZGlyIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTk6IkBub2RlbGliL2ZzLnNjYW5kaXIiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMi4xLjUiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTc6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEBub2RlbGliXGZzLnNjYW5kaXIiO31zOjE2OiJAbm9kZWxpYi9mcy5zdGF0IjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTY6IkBub2RlbGliL2ZzLnN0YXQiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMi4wLjUiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTQ6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEBub2RlbGliXGZzLnN0YXQiO31zOjE2OiJAbm9kZWxpYi9mcy53YWxrIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTY6IkBub2RlbGliL2ZzLndhbGsiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMS4yLjgiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTQ6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEBub2RlbGliXGZzLndhbGsiO31zOjE4OiJAb3hjLXByb2plY3QvdHlwZXMiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxODoiQG94Yy1wcm9qZWN0L3R5cGVzIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjc6IjAuMTUyLjAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTY6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEBveGMtcHJvamVjdFx0eXBlcyI7fXM6MzQ6IkByb2xsZG93bi9iaW5kaW5nLWFuZHJvaWQtYXJtLWVhYmkiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czozNDoiQHJvbGxkb3duL2JpbmRpbmctYW5kcm9pZC1hcm0tZWFiaSI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxLjIuMTIiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6MTEyOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xAcm9sbGRvd25cYmluZGluZy1hbmRyb2lkLWFybS1lYWJpIjt9czozMToiQHJvbGxkb3duL2JpbmRpbmctYW5kcm9pZC1hcm02NCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjMxOiJAcm9sbGRvd24vYmluZGluZy1hbmRyb2lkLWFybTY0IjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjEuMi4xMiI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMDk6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEByb2xsZG93blxiaW5kaW5nLWFuZHJvaWQtYXJtNjQiO31zOjMwOiJAcm9sbGRvd24vYmluZGluZy1kYXJ3aW4tYXJtNjQiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czozMDoiQHJvbGxkb3duL2JpbmRpbmctZGFyd2luLWFybTY0IjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjEuMi4xMiI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMDg6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEByb2xsZG93blxiaW5kaW5nLWRhcndpbi1hcm02NCI7fXM6Mjg6IkByb2xsZG93bi9iaW5kaW5nLWRhcndpbi14NjQiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyODoiQHJvbGxkb3duL2JpbmRpbmctZGFyd2luLXg2NCI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxLjIuMTIiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6MTA2OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xAcm9sbGRvd25cYmluZGluZy1kYXJ3aW4teDY0Ijt9czoyOToiQHJvbGxkb3duL2JpbmRpbmctZnJlZWJzZC14NjQiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyOToiQHJvbGxkb3duL2JpbmRpbmctZnJlZWJzZC14NjQiO3M6MTA6IgAqAHZlcnNpb24iO3M6NjoiMS4yLjEyIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjEwNzoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcQHJvbGxkb3duXGJpbmRpbmctZnJlZWJzZC14NjQiO31zOjM3OiJAcm9sbGRvd24vYmluZGluZy1saW51eC1hcm0tZ251ZWFiaWhmIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6Mzc6IkByb2xsZG93bi9iaW5kaW5nLWxpbnV4LWFybS1nbnVlYWJpaGYiO3M6MTA6IgAqAHZlcnNpb24iO3M6NjoiMS4yLjEyIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjExNToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcQHJvbGxkb3duXGJpbmRpbmctbGludXgtYXJtLWdudWVhYmloZiI7fXM6MzM6IkByb2xsZG93bi9iaW5kaW5nLWxpbnV4LWFybTY0LWdudSI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjMzOiJAcm9sbGRvd24vYmluZGluZy1saW51eC1hcm02NC1nbnUiO3M6MTA6IgAqAHZlcnNpb24iO3M6NjoiMS4yLjEyIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjExMToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcQHJvbGxkb3duXGJpbmRpbmctbGludXgtYXJtNjQtZ251Ijt9czozNDoiQHJvbGxkb3duL2JpbmRpbmctbGludXgtYXJtNjQtbXVzbCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjM0OiJAcm9sbGRvd24vYmluZGluZy1saW51eC1hcm02NC1tdXNsIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjEuMi4xMiI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMTI6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEByb2xsZG93blxiaW5kaW5nLWxpbnV4LWFybTY0LW11c2wiO31zOjMzOiJAcm9sbGRvd24vYmluZGluZy1saW51eC1wcGM2NC1nbnUiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czozMzoiQHJvbGxkb3duL2JpbmRpbmctbGludXgtcHBjNjQtZ251IjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjEuMi4xMiI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMTE6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEByb2xsZG93blxiaW5kaW5nLWxpbnV4LXBwYzY0LWdudSI7fXM6MzM6IkByb2xsZG93bi9iaW5kaW5nLWxpbnV4LXMzOTB4LWdudSI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjMzOiJAcm9sbGRvd24vYmluZGluZy1saW51eC1zMzkweC1nbnUiO3M6MTA6IgAqAHZlcnNpb24iO3M6NjoiMS4yLjEyIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjExMToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcQHJvbGxkb3duXGJpbmRpbmctbGludXgtczM5MHgtZ251Ijt9czozMToiQHJvbGxkb3duL2JpbmRpbmctbGludXgteDY0LWdudSI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjMxOiJAcm9sbGRvd24vYmluZGluZy1saW51eC14NjQtZ251IjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjEuMi4xMiI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMDk6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEByb2xsZG93blxiaW5kaW5nLWxpbnV4LXg2NC1nbnUiO31zOjMyOiJAcm9sbGRvd24vYmluZGluZy1saW51eC14NjQtbXVzbCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjMyOiJAcm9sbGRvd24vYmluZGluZy1saW51eC14NjQtbXVzbCI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxLjIuMTIiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6MTEwOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xAcm9sbGRvd25cYmluZGluZy1saW51eC14NjQtbXVzbCI7fXM6MzU6IkByb2xsZG93bi9iaW5kaW5nLW9wZW5oYXJtb255LWFybTY0IjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MzU6IkByb2xsZG93bi9iaW5kaW5nLW9wZW5oYXJtb255LWFybTY0IjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjEuMi4xMiI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMTM6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEByb2xsZG93blxiaW5kaW5nLW9wZW5oYXJtb255LWFybTY0Ijt9czozNDoiQHJvbGxkb3duL2JpbmRpbmctd2luMzItYXJtNjQtbXN2YyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjM0OiJAcm9sbGRvd24vYmluZGluZy13aW4zMi1hcm02NC1tc3ZjIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjEuMi4xMiI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMTI6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEByb2xsZG93blxiaW5kaW5nLXdpbjMyLWFybTY0LW1zdmMiO31zOjMyOiJAcm9sbGRvd24vYmluZGluZy13aW4zMi14NjQtbXN2YyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjMyOiJAcm9sbGRvd24vYmluZGluZy13aW4zMi14NjQtbXN2YyI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxLjIuMTIiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6MTEwOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xAcm9sbGRvd25cYmluZGluZy13aW4zMi14NjQtbXN2YyI7fXM6MjE6IkByb2xsZG93bi9wbHVnaW51dGlscyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjIxOiJAcm9sbGRvd24vcGx1Z2ludXRpbHMiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMS4wLjEiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTk6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEByb2xsZG93blxwbHVnaW51dGlscyI7fXM6MTg6IkB0YWlsd2luZGNzcy9mb3JtcyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE4OiJAdGFpbHdpbmRjc3MvZm9ybXMiO3M6MTA6IgAqAHZlcnNpb24iO3M6NjoiMC41LjExIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MTtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjc6Il4wLjUuMTEiO3M6NzoiACoAcGF0aCI7czo5NjoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcQHRhaWx3aW5kY3NzXGZvcm1zIjt9czoxNzoiQHRhaWx3aW5kY3NzL25vZGUiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxNzoiQHRhaWx3aW5kY3NzL25vZGUiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNC4zLjMiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTU6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEB0YWlsd2luZGNzc1xub2RlIjt9czoxODoiQHRhaWx3aW5kY3NzL294aWRlIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTg6IkB0YWlsd2luZGNzcy9veGlkZSI7czoxMDoiACoAdmVyc2lvbiI7czo1OiI0LjMuMyI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo5NjoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcQHRhaWx3aW5kY3NzXG94aWRlIjt9czozMjoiQHRhaWx3aW5kY3NzL294aWRlLWFuZHJvaWQtYXJtNjQiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czozMjoiQHRhaWx3aW5kY3NzL294aWRlLWFuZHJvaWQtYXJtNjQiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNC4zLjMiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6MTEwOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xAdGFpbHdpbmRjc3Ncb3hpZGUtYW5kcm9pZC1hcm02NCI7fXM6MzE6IkB0YWlsd2luZGNzcy9veGlkZS1kYXJ3aW4tYXJtNjQiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czozMToiQHRhaWx3aW5kY3NzL294aWRlLWRhcndpbi1hcm02NCI7czoxMDoiACoAdmVyc2lvbiI7czo1OiI0LjMuMyI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMDk6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEB0YWlsd2luZGNzc1xveGlkZS1kYXJ3aW4tYXJtNjQiO31zOjI5OiJAdGFpbHdpbmRjc3Mvb3hpZGUtZGFyd2luLXg2NCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjI5OiJAdGFpbHdpbmRjc3Mvb3hpZGUtZGFyd2luLXg2NCI7czoxMDoiACoAdmVyc2lvbiI7czo1OiI0LjMuMyI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMDc6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEB0YWlsd2luZGNzc1xveGlkZS1kYXJ3aW4teDY0Ijt9czozMDoiQHRhaWx3aW5kY3NzL294aWRlLWZyZWVic2QteDY0IjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MzA6IkB0YWlsd2luZGNzcy9veGlkZS1mcmVlYnNkLXg2NCI7czoxMDoiACoAdmVyc2lvbiI7czo1OiI0LjMuMyI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMDg6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEB0YWlsd2luZGNzc1xveGlkZS1mcmVlYnNkLXg2NCI7fXM6Mzg6IkB0YWlsd2luZGNzcy9veGlkZS1saW51eC1hcm0tZ251ZWFiaWhmIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6Mzg6IkB0YWlsd2luZGNzcy9veGlkZS1saW51eC1hcm0tZ251ZWFiaWhmIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjQuMy4zIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjExNjoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcQHRhaWx3aW5kY3NzXG94aWRlLWxpbnV4LWFybS1nbnVlYWJpaGYiO31zOjM0OiJAdGFpbHdpbmRjc3Mvb3hpZGUtbGludXgtYXJtNjQtZ251IjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MzQ6IkB0YWlsd2luZGNzcy9veGlkZS1saW51eC1hcm02NC1nbnUiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNC4zLjMiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6MTEyOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xAdGFpbHdpbmRjc3Ncb3hpZGUtbGludXgtYXJtNjQtZ251Ijt9czozNToiQHRhaWx3aW5kY3NzL294aWRlLWxpbnV4LWFybTY0LW11c2wiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czozNToiQHRhaWx3aW5kY3NzL294aWRlLWxpbnV4LWFybTY0LW11c2wiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNC4zLjMiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6MTEzOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xAdGFpbHdpbmRjc3Ncb3hpZGUtbGludXgtYXJtNjQtbXVzbCI7fXM6MzI6IkB0YWlsd2luZGNzcy9veGlkZS1saW51eC14NjQtZ251IjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MzI6IkB0YWlsd2luZGNzcy9veGlkZS1saW51eC14NjQtZ251IjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjQuMy4zIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjExMDoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcQHRhaWx3aW5kY3NzXG94aWRlLWxpbnV4LXg2NC1nbnUiO31zOjMzOiJAdGFpbHdpbmRjc3Mvb3hpZGUtbGludXgteDY0LW11c2wiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czozMzoiQHRhaWx3aW5kY3NzL294aWRlLWxpbnV4LXg2NC1tdXNsIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjQuMy4zIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjExMToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcQHRhaWx3aW5kY3NzXG94aWRlLWxpbnV4LXg2NC1tdXNsIjt9czozMDoiQHRhaWx3aW5kY3NzL294aWRlLXdhc20zMi13YXNpIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MzA6IkB0YWlsd2luZGNzcy9veGlkZS13YXNtMzItd2FzaSI7czoxMDoiACoAdmVyc2lvbiI7czo1OiI0LjMuMyI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMDg6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXEB0YWlsd2luZGNzc1xveGlkZS13YXNtMzItd2FzaSI7fXM6MzU6IkB0YWlsd2luZGNzcy9veGlkZS13aW4zMi1hcm02NC1tc3ZjIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MzU6IkB0YWlsd2luZGNzcy9veGlkZS13aW4zMi1hcm02NC1tc3ZjIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjQuMy4zIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjExMzoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcQHRhaWx3aW5kY3NzXG94aWRlLXdpbjMyLWFybTY0LW1zdmMiO31zOjMzOiJAdGFpbHdpbmRjc3Mvb3hpZGUtd2luMzIteDY0LW1zdmMiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czozMzoiQHRhaWx3aW5kY3NzL294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c2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xhcmciO31zOjEyOiJhdXRvcHJlZml4ZXIiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxMjoiYXV0b3ByZWZpeGVyIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjEwLjYuMSI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjE7czoxMzoiACoAY29uc3RyYWludCI7czo3OiJeMTAuNi4xIjtzOjc6IgAqAHBhdGgiO3M6OTA6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGF1dG9wcmVmaXhlciI7fXM6MjQ6ImJhc2VsaW5lLWJyb3dzZXItbWFwcGluZyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjI0OiJiYXNlbGluZS1icm93c2VyLW1hcHBpbmciO3M6MTA6IgAqAHZlcnNpb24iO3M6NzoiMi4xMS4yNyI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMDI6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGJhc2VsaW5lLWJyb3dzZXItbWFwcGluZyI7fXM6MTc6ImJpbmFyeS1leHRlbnNpb25zIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTc6ImJpbmFyeS1leHRlbnNpb25zIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjIuMy4wIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjk1OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xiaW5hcnktZXh0ZW5zaW9ucyI7fXM6NjoiYnJhY2VzIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6NjoiYnJhY2VzIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjMuMC4zIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjg0OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xicmFjZXMiO31zOjEyOiJicm93c2Vyc2xpc3QiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxMjoiYnJvd3NlcnNsaXN0IjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjQuMjkuMyI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo5MDoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcYnJvd3NlcnNsaXN0Ijt9czoxMzoiY2FtZWxjYXNlLWNzcyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjEzOiJjYW1lbGNhc2UtY3NzIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjIuMC4xIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjkxOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xjYW1lbGNhc2UtY3NzIjt9czoxMjoiY2FuaXVzZS1saXRlIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTI6ImNhbml1c2UtbGl0ZSI7czoxMDoiACoAdmVyc2lvbiI7czoxMjoiMS4wLjMwMDAxODE0IjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjkwOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xjYW5pdXNlLWxpdGUiO31zOjg6ImNob2tpZGFyIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6ODoiY2hva2lkYXIiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMy42LjAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODY6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGNob2tpZGFyIjt9czo1OiJjbGl1aSI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjU6ImNsaXVpIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjkuMC4xIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjgzOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xjbGl1aSI7fXM6MTI6ImNvbmN1cnJlbnRseSI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjEyOiJjb25jdXJyZW50bHkiO3M6MTA6IgAqAHZlcnNpb24iO3M6NjoiMTAuMC41IjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MTtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjc6Il4xMC4wLjMiO3M6NzoiACoAcGF0aCI7czo5MDoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcY29uY3VycmVudGx5Ijt9czo2OiJjc3Nlc2MiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czo2OiJjc3Nlc2MiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMy4wLjAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODQ6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGNzc2VzYyI7fXM6MTE6ImRldGVjdC1saWJjIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTE6ImRldGVjdC1saWJjIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjIuMS4yIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjg5OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xkZXRlY3QtbGliYyI7fXM6MTA6ImRpZHlvdW1lYW4iO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxMDoiZGlkeW91bWVhbiI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIxLjIuMiI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4ODoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcZGlkeW91bWVhbiI7fXM6MzoiZGx2IjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MzoiZGx2IjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjEuMS4zIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjgxOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xkbHYiO31zOjIwOiJlbGVjdHJvbi10by1jaHJvbWl1bSI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjIwOiJlbGVjdHJvbi10by1jaHJvbWl1bSI7czoxMDoiACoAdmVyc2lvbiI7czo3OiIxLjUuNDQ0IjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjk4OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xlbGVjdHJvbi10by1jaHJvbWl1bSI7fXM6MTE6ImVtb2ppLXJlZ2V4IjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTE6ImVtb2ppLXJlZ2V4IjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjEwLjYuMCI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4OToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcZW1vamktcmVnZXgiO31zOjE2OiJlbmhhbmNlZC1yZXNvbHZlIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTY6ImVuaGFuY2VkLXJlc29sdmUiO3M6MTA6IgAqAHZlcnNpb24iO3M6NjoiNS4yNi4wIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjk0OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xlbmhhbmNlZC1yZXNvbHZlIjt9czo5OiJlcy1lcnJvcnMiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czo5OiJlcy1lcnJvcnMiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMS4zLjAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODc6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGVzLWVycm9ycyI7fXM6ODoiZXNjYWxhZGUiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czo4OiJlc2NhbGFkZSI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIzLjIuMCI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4NjoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcZXNjYWxhZGUiO31zOjk6ImZhc3QtZ2xvYiI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjk6ImZhc3QtZ2xvYiI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIzLjMuMyI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4NzoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcZmFzdC1nbG9iIjt9czo1OiJmYXN0cSI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjU6ImZhc3RxIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjEuMjAuMyI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4MzoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcZmFzdHEiO31zOjEwOiJmaWxsLXJhbmdlIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTA6ImZpbGwtcmFuZ2UiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNy4xLjEiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODg6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGZpbGwtcmFuZ2UiO31zOjExOiJmcmFjdGlvbi5qcyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjExOiJmcmFjdGlvbi5qcyI7czoxMDoiACoAdmVyc2lvbiI7czo1OiI1LjMuNCI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4OToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcZnJhY3Rpb24uanMiO31zOjg6ImZzZXZlbnRzIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6ODoiZnNldmVudHMiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMi4zLjMiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODY6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGZzZXZlbnRzIjt9czoxMzoiZnVuY3Rpb24tYmluZCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjEzOiJmdW5jdGlvbi1iaW5kIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjEuMS4yIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjkxOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xmdW5jdGlvbi1iaW5kIjt9czoxNToiZ2V0LWNhbGxlci1maWxlIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTU6ImdldC1jYWxsZXItZmlsZSI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIyLjAuNSI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo5MzoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcZ2V0LWNhbGxlci1maWxlIjt9czoxMToiZ2xvYi1wYXJlbnQiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxMToiZ2xvYi1wYXJlbnQiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNi4wLjIiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODk6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGdsb2ItcGFyZW50Ijt9czoxMToiZ3JhY2VmdWwtZnMiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxMToiZ3JhY2VmdWwtZnMiO3M6MTA6IgAqAHZlcnNpb24iO3M6NjoiNC4yLjExIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjg5OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xncmFjZWZ1bC1mcyI7fXM6NjoiaGFzb3duIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6NjoiaGFzb3duIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjIuMC40IjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjg0OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xoYXNvd24iO31zOjE0OiJpcy1iaW5hcnktcGF0aCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE0OiJpcy1iaW5hcnktcGF0aCI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIyLjEuMCI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo5MjoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcaXMtYmluYXJ5LXBhdGgiO31zOjE0OiJpcy1jb3JlLW1vZHVsZSI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE0OiJpcy1jb3JlLW1vZHVsZSI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIyLjE3LjAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTI6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGlzLWNvcmUtbW9kdWxlIjt9czoxMDoiaXMtZXh0Z2xvYiI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJc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Y29tLnB5XG5vZGVfbW9kdWxlc1xsaWdodG5pbmdjc3MiO31zOjI2OiJsaWdodG5pbmdjc3MtYW5kcm9pZC1hcm02NCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjI2OiJsaWdodG5pbmdjc3MtYW5kcm9pZC1hcm02NCI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxLjMyLjAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6MTA0OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xsaWdodG5pbmdjc3MtYW5kcm9pZC1hcm02NCI7fXM6MjU6ImxpZ2h0bmluZ2Nzcy1kYXJ3aW4tYXJtNjQiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyNToibGlnaHRuaW5nY3NzLWRhcndpbi1hcm02NCI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxLjMyLjAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6MTAzOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xsaWdodG5pbmdjc3MtZGFyd2luLWFybTY0Ijt9czoyMzoibGlnaHRuaW5nY3NzLWRhcndpbi14NjQiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyMzoibGlnaHRuaW5nY3NzLWRhcndpbi14NjQiO3M6MTA6IgAqAHZlcnNpb24iO3M6NjoiMS4zMi4wIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjEwMToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcbGlnaHRuaW5nY3NzLWRhcndpbi14NjQiO31zOjI0OiJsaWdodG5pbmdjc3MtZnJlZWJzZC14NjQiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoyNDoibGlnaHRuaW5nY3NzLWZyZWVic2QteDY0IjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjEuMzIuMCI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMDI6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGxpZ2h0bmluZ2Nzcy1mcmVlYnNkLXg2NCI7fXM6MzI6ImxpZ2h0bmluZ2Nzcy1saW51eC1hcm0tZ251ZWFiaWhmIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MzI6ImxpZ2h0bmluZ2Nzcy1saW51eC1hcm0tZ251ZWFiaWhmIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjEuMzIuMCI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMTA6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGxpZ2h0bmluZ2Nzcy1saW51eC1hcm0tZ251ZWFiaWhmIjt9czoyODoibGlnaHRuaW5nY3NzLWxpbnV4LWFybTY0LWdudSI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjI4OiJsaWdodG5pbmdjc3MtbGludXgtYXJtNjQtZ251IjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjEuMzIuMCI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMDY6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGxpZ2h0bmluZ2Nzcy1saW51eC1hcm02NC1nbnUiO31zOjI5OiJsaWdodG5pbmdjc3MtbGludXgtYXJtNjQtbXVzbCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjI5OiJsaWdodG5pbmdjc3MtbGludXgtYXJtNjQtbXVzbCI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxLjMyLjAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6MTA3OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xsaWdodG5pbmdjc3MtbGludXgtYXJtNjQtbXVzbCI7fXM6MjY6ImxpZ2h0bmluZ2Nzcy1saW51eC14NjQtZ251IjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MjY6ImxpZ2h0bmluZ2Nzcy1saW51eC14NjQtZ251IjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjEuMzIuMCI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMDQ6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGxpZ2h0bmluZ2Nzcy1saW51eC14NjQtZ251Ijt9czoyNzoibGlnaHRuaW5nY3NzLWxpbnV4LXg2NC1tdXNsIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6Mjc6ImxpZ2h0bmluZ2Nzcy1saW51eC14NjQtbXVzbCI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxLjMyLjAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6MTA1OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xsaWdodG5pbmdjc3MtbGludXgteDY0LW11c2wiO31zOjI5OiJsaWdodG5pbmdjc3Mtd2luMzItYXJtNjQtbXN2YyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjI5OiJsaWdodG5pbmdjc3Mtd2luMzItYXJtNjQtbXN2YyI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxLjMyLjAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6MTA3OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xsaWdodG5pbmdjc3Mtd2luMzItYXJtNjQtbXN2YyI7fXM6Mjc6ImxpZ2h0bmluZ2Nzcy13aW4zMi14NjQtbXN2YyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjI3OiJsaWdodG5pbmdjc3Mtd2luMzIteDY0LW1zdmMiO3M6MTA6IgAqAHZlcnNpb24iO3M6NjoiMS4zMi4wIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjEwNToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcbGlnaHRuaW5nY3NzLXdpbjMyLXg2NC1tc3ZjIjt9czo5OiJsaWxjb25maWciO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czo5OiJsaWxjb25maWciO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMy4xLjMiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODc6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGxpbGNvbmZpZyI7fXM6MTc6ImxpbmVzLWFuZC1jb2x1bW5zIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTc6ImxpbmVzLWFuZC1jb2x1bW5zIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjEuMi40IjtzOjk6IgAqAHNvdXJjZSI7cjox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Im5hbm9pZCI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIzLjMuMTkiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODQ6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXG5hbm9pZCI7fXM6MTM6Im5vZGUtcmVsZWFzZXMiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxMzoibm9kZS1yZWxlYXNlcyI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIyLjAuNTciO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTE6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXG5vZGUtcmVsZWFzZXMiO31zOjE0OiJub3JtYWxpemUtcGF0aCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE0OiJub3JtYWxpemUtcGF0aCI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIzLjAuMCI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo5MjoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcbm9ybWFsaXplLXBhdGgiO31zOjEzOiJvYmplY3QtYXNzaWdu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ODg6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXHBvc3Rjc3MtanMiO31zOjE5OiJwb3N0Y3NzLWxvYWQtY29uZmlnIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTk6InBvc3Rjc3MtbG9hZC1jb25maWciO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNi4wLjEiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTc6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXHBvc3Rjc3MtbG9hZC1jb25maWciO31zOjE0OiJwb3N0Y3NzLW5lc3RlZCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE0OiJwb3N0Y3NzLW5lc3RlZCI7czoxMDoiACoAdmVyc2lvbiI7czo1OiI2LjIuMCI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo5MjoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNccG9zdGNzcy1uZXN0ZWQiO31zOjIzOiJwb3N0Y3NzLXNlbGVjdG9yLXBhcnNlciI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjIzOiJwb3N0Y3NzLXNlbGVjdG9yLXBhcnNlciI7czoxMDoiACoAdmVyc2lvbiI7czo2OiI2LjAuMTAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6MTAxOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xwb3N0Y3NzLXNlbGVjdG9yLXBhcnNlciI7fXM6MjA6InBvc3Rjc3MtdmFsdWUtcGFyc2VyIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MjA6InBvc3Rjc3MtdmFsdWUtcGFyc2VyIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjQuMi4wIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjk4OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xwb3N0Y3NzLXZhbHVlLXBhcnNlciI7fXM6MTU6InF1ZXVlLW1pY3JvdGFzayI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE1OiJxdWV1ZS1taWNyb3Rhc2siO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMS4yLjMiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTM6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXHF1ZXVlLW1pY3JvdGFzayI7fXM6MTA6InJlYWQtY2FjaGUiO086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YXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1xzb3VyY2UtbWFwLWpzIjt9czo3OiJzdWNyYXNlIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6Nzoic3VjcmFzZSI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIzLjM1LjEiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODU6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXHN1Y3Jhc2UiO31zOjE0OiJzdXBwb3J0cy1jb2xvciI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjE0OiJzdXBwb3J0cy1jb2xvciI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxMC4yLjIiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTI6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXHN1cHBvcnRzLWNvbG9yIjt9czozMToic3VwcG9ydHMtcHJlc2VydmUtc3ltbGlua3MtZmxhZyI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjMxOiJzdXBwb3J0cy1wcmVzZXJ2ZS1zeW1saW5rcy1mbGFnIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjEuMC4wIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjEwOToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcc3VwcG9ydHMtcHJlc2VydmUtc3ltbGlua3MtZmxhZyI7fXM6MTE6InRhaWx3aW5kY3NzIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTE6InRhaWx3aW5kY3NzIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjMuNC4xOSI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjE7czoxMzoiACoAY29uc3RyYWludCI7czo3OiJeMy40LjE5IjtzOjc6IgAqAHBhdGgiO3M6ODk6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXHRhaWx3aW5kY3NzIjt9czo3OiJ0YXBhYmxlIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6NzoidGFwYWJsZSI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIyLjMuMyI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4NToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcdGFwYWJsZSI7fXM6NzoidGhlbmlmeSI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjc6InRoZW5pZnkiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMy4zLjEiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODU6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXHRoZW5pZnkiO31zOjExOiJ0aGVuaWZ5LWFsbCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjExOiJ0aGVuaWZ5LWFsbCI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIxLjYuMCI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4OToiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcdGhlbmlmeS1hbGwiO31zOjEwOiJ0aW55Z2xvYmJ5IjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTA6InRpbnlnbG9iYnkiO3M6MTA6IgAqAHZlcnNpb24iO3M6NjoiMC4yLjE3IjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjg4OiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1x0aW55Z2xvYmJ5Ijt9czoxNDoidG8tcmVnZXgtcmFuZ2UiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czoxNDoidG8tcmVnZXgtcmFuZ2UiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNS4wLjEiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTI6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXHRvLXJlZ2V4LXJhbmdlIjt9czo5OiJ0cmVlLWtpbGwiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czo5OiJ0cmVlLWtpbGwiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMS4yLjIiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODc6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXHRyZWUta2lsbCI7fXM6MjA6InRzLWludGVyZmFjZS1jaGVja2VyIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MjA6InRzLWludGVyZmFjZS1jaGVja2VyIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjY6IjAuMS4xMyI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo5ODoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcdHMtaW50ZXJmYWNlLWNoZWNrZXIiO31zOjU6InRzbGliIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6NToidHNsaWIiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiMi44LjEiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODM6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXHRzbGliIjt9czoyMjoidXBkYXRlLWJyb3dzZXJzbGlzdC1kYiI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjIyOiJ1cGRhdGUtYnJvd3NlcnNsaXN0LWRiIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjEuMy4zIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjEwMDoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNcdXBkYXRlLWJyb3dzZXJzbGlzdC1kYiI7fXM6MTQ6InV0aWwtZGVwcmVjYXRlIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTQ6InV0aWwtZGVwcmVjYXRlIjtzOjEwOiIAKgB2ZXJzaW9uIjtzOjU6IjEuMC4yIjtzOjk6IgAqAHNvdXJjZSI7cjoxMDU3O3M6NjoiACoAZGV2IjtiOjE7czo5OiIAKgBkaXJlY3QiO2I6MDtzOjEzOiIAKgBjb25zdHJhaW50IjtzOjA6IiI7czo3OiIAKgBwYXRoIjtzOjkyOiJDOlxVc2Vyc1xzb3Rld1xPbmVEcml2ZVxFc2NyaXRvcmlvXHZhcmlvc1xsYXJhdmVsbFxjb25zdXIuY29tLnB5XG5vZGVfbW9kdWxlc1x1dGlsLWRlcHJlY2F0ZSI7fXM6NDoidml0ZSI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjQ6InZpdGUiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiOC4zLjIiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjoxO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6NjoiXjguMC4wIjtzOjc6IgAqAHBhdGgiO3M6ODI6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXHZpdGUiO31zOjIzOiJ2aXRlLXBsdWdpbi1mdWxsLXJlbG9hZCI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjIzOiJ2aXRlLXBsdWdpbi1mdWxsLXJlbG9hZCI7czoxMDoiACoAdmVyc2lvbiI7czo1OiIxLjIuMCI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czoxMDE6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXHZpdGUtcGx1Z2luLWZ1bGwtcmVsb2FkIjt9czo0OiJ5MThuIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6NDoieTE4biI7czoxMDoiACoAdmVyc2lvbiI7czo1OiI1LjAuOCI7czo5OiIAKgBzb3VyY2UiO3I6MTA1NztzOjY6IgAqAGRldiI7YjoxO3M6OToiACoAZGlyZWN0IjtiOjA7czoxMzoiACoAY29uc3RyYWludCI7czowOiIiO3M6NzoiACoAcGF0aCI7czo4MjoiQzpcVXNlcnNcc290ZXdcT25lRHJpdmVcRXNjcml0b3Jpb1x2YXJpb3NcbGFyYXZlbGxcY29uc3VyLmNvbS5weVxub2RlX21vZHVsZXNceTE4biI7fXM6NToieWFyZ3MiO086MjI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2UiOjc6e3M6NzoiACoAbmFtZSI7czo1OiJ5YXJncyI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIxOC4wLjAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODM6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXHlhcmdzIjt9czoxMjoieWFyZ3MtcGFyc2VyIjtPOjIyOiJMYXJhdmVsXFJvc3RlclxQYWNrYWdlIjo3OntzOjc6IgAqAG5hbWUiO3M6MTI6InlhcmdzLXBhcnNlciI7czoxMDoiACoAdmVyc2lvbiI7czo2OiIyMi4wLjAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6OTA6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXHlhcmdzLXBhcnNlciI7fXM6NDoiZmRpciI7TzoyMjoiTGFyYXZlbFxSb3N0ZXJcUGFja2FnZSI6Nzp7czo3OiIAKgBuYW1lIjtzOjQ6ImZkaXIiO3M6MTA6IgAqAHZlcnNpb24iO3M6NToiNi41LjAiO3M6OToiACoAc291cmNlIjtyOjEwNTc7czo2OiIAKgBkZXYiO2I6MTtzOjk6IgAqAGRpcmVjdCI7YjowO3M6MTM6IgAqAGNvbnN0cmFpbnQiO3M6MDoiIjtzOjc6IgAqAHBhdGgiO3M6ODI6IkM6XFVzZXJzXHNvdGV3XE9uZURyaXZlXEVzY3JpdG9yaW9cdmFyaW9zXGxhcmF2ZWxsXGNvbnN1ci5jb20ucHlcbm9kZV9tb2R1bGVzXGZkaXIiO319czoxMToiACoAcGFja2FnZXMiO086MzI6IkxhcmF2ZWxcUm9zdGVyXFBhY2thZ2VDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjE4Nzp7aTowO3I6MTA1NDtpOjE7cjoxMDYyO2k6MjtyOjEwNzA7aTozO3I6MTA3ODtpOjQ7cjoxMDg2O2k6NTtyOjEwOTQ7aTo2O3I6MTEwMjtpOjc7cjoxMTEwO2k6ODtyOjExMTg7aTo5O3I6MTEyNjtpOjEwO3I6MTEzNDtpOjExO3I6MTE0MjtpOjEyO3I6MTE1MDtpOjEzO3I6MTE1ODtpOjE0O3I6MTE2NjtpOjE1O3I6MTE3NDtpOjE2O3I6MTE4MjtpOjE3O3I6MTE5MDtpOjE4O3I6MTE5ODtpOjE5O3I6MTIwNjtpOjIwO3I6MTIxNDtpOjIxO3I6MTIyMjtpOjIyO3I6MTIzMDtpOjIzO3I6MTIzODtpOjI0O3I6MTI0NjtpOjI1O3I6MTI1NDtpOjI2O3I6MTI2MjtpOjI3O3I6MTI3MDtpOjI4O3I6MTI3ODtpOjI5O3I6MTI4NjtpOjMwO3I6MTI5NDtpOjMxO3I6MTMwMjtpOjMyO3I6MTMxMDtpOjMzO3I6MTMxODtpOjM0O3I6MTMyNjtpOjM1O3I6MTMzNDtpOjM2O3I6MTM0MjtpOjM3O3I6MTM1MDtpOjM4O3I6MTM1ODtpOjM5O3I6MTM2NjtpOjQwO3I6MTM3NDtpOjQxO3I6MTM4MjtpOjQyO3I6MTM5MDtpOjQzO3I6MTM5ODtpOjQ0O3I6MTQwNjtpOjQ1O3I6MTQxNDtpOjQ2O3I6MTQyMjtpOjQ3O3I6MTQzMDtpOjQ4O3I6MTQzODtpOjQ5O3I6MTQ0NjtpOjUwO3I6MTQ1NDtpOjUxO3I6MTQ2MjtpOjUyO3I6MTQ3MDtpOjUzO3I6MTQ3ODtpOjU0O3I6MTQ4NjtpOjU1O3I6MTQ5NDtpOjU2O3I6MTUwMjtpOjU3O3I6MTUxMDtpOjU4O3I6MTUxODtpOjU5O3I6MTUyNjtpOjYwO3I6MTUzNDtpOjYxO3I6MTU0MjtpOjYyO3I6MTU1MDtpOjYzO3I6MTU1ODtpOjY0O3I6MTU2NjtpOjY1O3I6MTU3NDtpOjY2O3I6MTU4MjtpOjY3O3I6MTU5MDtpOjY4O3I6MTU5ODtpOjY5O3I6MTYwNjtpOjcwO3I6MTYxNDtpOjcxO3I6MTYyMjtpOjcyO3I6MTYzMDtpOjczO3I6MTYzODtpOjc0O3I6MTY0NjtpOjc1O3I6MTY1NDtpOjc2O3I6MTY2MjtpOjc3O3I6MTY3MDtpOjc4O3I6MTY3ODtpOjc5O3I6MTY4NjtpOjgwO3I6MTY5NDtpOjgxO3I6MTcwMjtpOjgyO3I6MTcxMDtpOjgzO3I6MTcxODtpOjg0O3I6MTcyNjtpOjg1O3I6MTczNDtpOjg2O3I6MTc0MjtpOjg3O3I6MTc1MDtpOjg4O3I6MTc1ODtpOjg5O3I6MTc2NjtpOjkwO3I6MTc3NDtpOjkxO3I6MTc4MjtpOjkyO3I6MTc5MDtpOjkzO3I6MTc5ODtpOjk0O3I6MTgwNjtpOjk1O3I6MTgxNDtpOjk2O3I6MTgyMjtpOjk3O3I6MTgzMDtpOjk4O3I6MTgzODtpOjk5O3I6MTg0NjtpOjEwMDtyOjE4NTQ7aToxMDE7cjoxODYyO2k6MTAyO3I6MTg3MDtpOjEwMztyOjE4Nzg7aToxMDQ7cjoxODg2O2k6MTA1O3I6MTg5NDtpOjEwNjtyOjE5MDI7aToxMDc7cjoxOTEwO2k6MTA4O3I6MTkxODtpOjEwOTtyOjE5MjY7aToxMTA7cjoxOTM0O2k6MTExO3I6MTk0MjtpOjExMjtyOjE5NTA7aToxMTM7cjoxOTU4O2k6MTE0O3I6MTk2NjtpOjExNTtyOjE5NzQ7aToxMTY7cjoxOTgyO2k6MTE3O3I6MTk5MDtpOjExODtyOjE5OTg7aToxMTk7cjoyMDA2O2k6MTIwO3I6MjAxNDtpOjEyMTtyOjIwMjI7aToxMjI7cjoyMDMwO2k6MTIzO3I6MjAzODtpOjEyNDtyOjIwNDY7aToxMjU7cjoyMDU0O2k6MTI2O3I6MjA2MjtpOjEyNztyOjIwNzA7aToxMjg7cjoyMDc4O2k6MTI5O3I6MjA4NjtpOjEzMDtyOjIwOTQ7aToxMzE7cjoyMTAyO2k6MTMyO3I6MjExMDtpOjEzMztyOjIxMTg7aToxMzQ7cjoyMTI2O2k6MTM1O3I6MjEzNDtpOjEzNjtyOjIxNDI7aToxMzc7cjoyMTUwO2k6MTM4O3I6MjE1ODtpOjEzOTtyOjIxNjY7aToxNDA7cjoyMTc0O2k6MTQxO3I6MjE4MjtpOjE0MjtyOjIxOTA7aToxNDM7cjoyMTk4O2k6MTQ0O3I6MjIwNjtpOjE0NTtyOjIyMTQ7aToxNDY7cjoyMjIyO2k6MTQ3O3I6MjIzMDtpOjE0ODtyOjIyMzg7aToxNDk7cjoyMjQ2O2k6MTUwO3I6MjI1NDtpOjE1MTtyOjIyNjI7aToxNTI7cjoyMjcwO2k6MTUzO3I6MjI3ODtpOjE1NDtyOjIyODY7aToxNTU7cjoyMjk0O2k6MTU2O3I6MjMwMjtpOjE1NztyOjIzMTA7aToxNTg7cjoyMzE4O2k6MTU5O3I6MjMyNjtpOjE2MDtyOjIzMzQ7aToxNjE7cjoyMzQyO2k6MTYyO3I6MjM1MDtpOjE2MztyOjIzNTg7aToxNjQ7cjoyMzY2O2k6MTY1O3I6MjM3NDtpOjE2NjtyOjIzODI7aToxNjc7cjoyMzkwO2k6MTY4O3I6MjM5ODtpOjE2OTtyOjI0MDY7aToxNzA7cjoyNDE0O2k6MTcxO3I6MjQyMjtpOjE3MjtyOjI0MzA7aToxNzM7cjoyNDM4O2k6MTc0O3I6MjQ0NjtpOjE3NTtyOjI0NTQ7aToxNzY7cjoyNDYyO2k6MTc3O3I6MjQ3MDtpOjE3ODtyOjI0Nzg7aToxNzk7cjoyNDg2O2k6MTgwO3I6MjQ5NDtpOjE4MTtyOjI1MDI7aToxODI7cjoyNTEwO2k6MTgzO3I6MjUxODtpOjE4NDtyOjI1MjY7aToxODU7cjoyNTM0O2k6MTg2O3I6MjU0Mjt9czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO31zOjE3OiIAKgBwYWNrYWdlTWFuYWdlciI7RTo0MToiTGFyYXZlbFxSb3N0ZXJcRW51bXNcSnNQYWNrYWdlTWFuYWdlcjpOcG0iO31zOjY6InN0YWNrcyI7TzozMDoiTGFyYXZlbFxSb3N0ZXJcU3VwcG9ydFxFbnVtU2V0IjoxOntzOjg6IgAqAGNhc2VzIjthOjE6e2k6MDtFOjM1OiJMYXJhdmVsXFJvc3RlclxFbnVtc1xTdGFjazpMaXZld2lyZSI7fX1zOjIxOiJicm93c2VyVGVzdEZyYW1ld29ya3MiO086MzA6IkxhcmF2ZWxcUm9zdGVyXFN1cHBvcnRcRW51bVNldCI6MTp7czo4OiIAKgBjYXNlcyI7YTowOnt9fXM6OToiZnJvbnRlbmRzIjtPOjMwOiJMYXJhdmVsXFJvc3RlclxTdXBwb3J0XEVudW1TZXQiOjE6e3M6ODoiACoAY2FzZXMiO2E6MDp7fX1zOjY6ImFnZW50cyI7TzozMDoiTGFyYXZlbFxSb3N0ZXJcU3VwcG9ydFxFbnVtU2V0IjoxOntzOjg6IgAqAGNhc2VzIjthOjI6e2k6MDtFOjM3OiJMYXJhdmVsXFJvc3RlclxFbnVtc1xBZ2VudDpDbGF1ZGVDb2RlIjtpOjE7RTozMjoiTGFyYXZlbFxSb3N0ZXJcRW51bXNcQWdlbnQ6Q29kZXgiO319czo3OiJlZGl0b3JzIjtPOjMwOiJMYXJhdmVsXFJvc3RlclxTdXBwb3J0XEVudW1TZXQiOjE6e3M6ODoiACoAY2FzZXMiO2E6MDp7fX19', 1791466552);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_footer_copyright', 's:91:"© {year} Consur S.A. Todos los derechos reservados. Concesionaria Oficial Toyota Paraguay.";', 2106823076);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_footer_about_text', 's:137:"Concesionaria Oficial de Toyota en Paraguay. Excelencia, garantía y servicio de posventa especializado para tu tranquilidad y confianza.";', 2106823076);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_footer_show_facebook', 's:1:"1";', 2106823076);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_footer_show_instagram', 's:1:"1";', 2106823076);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_footer_show_tiktok', 's:1:"1";', 2106823076);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_footer_show_spotify', 's:1:"1";', 2106823076);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_footer_show_linkedin', 's:1:"0";', 2106823076);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_footer_show_youtube', 's:1:"0";', 2106823076);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_footer_col2_title', 's:15:"Gama de Modelos";', 2106823076);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_footer_col3_title', 's:18:"Servicios Posventa";', 2106823076);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_footer_col4_title', 's:12:"Casa Central";', 2106823076);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_footer_address', 's:38:"Ruta 1 Km 2.5, Encarnación - Paraguay";', 2106823076);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_footer_phone', 's:15:"+595 71 204 106";', 2106823076);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_footer_whatsapp', 's:16:"+595 985 804 106";', 2106823076);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_footer_email', 's:22:"contacto@consur.com.py";', 2106823076);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_footer_show_internal_link', 's:1:"1";', 2106823076);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_footer_credits', 's:40:"Desarrollado con TALL Stack & PostgreSQL";', 2106823076);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_linkedin_url', 's:46:"https://www.linkedin.com/company/consur-toyota";', 2106824915);
INSERT INTO public.cache VALUES ('consur-sa-cache-setting_youtube_url', 's:23:"https://www.youtube.com";', 2106824915);


--
-- Data for Name: cache_locks; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: form_configs; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.form_configs VALUES (1, 'home_cotizacion', 'Cotización de Portada (Home)', 'Cotizá tu Próximo Toyota', 'Dejanos tus datos y un asesor especializado te contactará en menos de 15 minutos con las mejores condiciones comerciales.', 'Solicitar Cotización Inmediata', '¡Tu solicitud fue enviada con éxito! Un asesor oficial de Consur S.A. te contactará a la brevedad.', 'ventas@consur.com.py, contacto@consur.com.py', 'Hola Consur S.A., quisiera solicitar una cotización personalizada y conocer los planes de financiación.', true, '2026-10-05 14:49:06', '2026-10-05 14:49:06');
INSERT INTO public.form_configs VALUES (2, 'vehicle_detail', 'Ficha Vehicular & Financiación (Detalle)', 'Consultar por este Vehículo', 'Recibí información sobre financiación propia o bancaria, disponibilidad de stock y agendamiento.', 'Enviar Solicitud Comercial', '¡Solicitud recibida! Un asesor de ventas se comunicará contigo de inmediato.', 'ventas@consur.com.py', 'Hola Consur S.A., estoy viendo la unidad {vehicle_title} (ID #{vehicle_id}) por US$ {price} y me gustaría recibir asesoramiento.', true, '2026-10-05 14:49:06', '2026-10-05 14:49:06');
INSERT INTO public.form_configs VALUES (3, 'test_drive', 'Solicitud de Test Drive Oficial', 'Agendá tu Prueba de Manejo', 'Comprobá la potencia, confort y tecnología de la línea Toyota coordinando un test drive exclusivo.', 'Confirmar Solicitud de Test Drive', '¡Test drive agendado! Un representante se comunicará para coordinar el horario y sucursal.', 'testdrive@consur.com.py, ventas@consur.com.py', 'Hola Consur S.A., quisiera agendar un Test Drive oficial para probar un Toyota.', true, '2026-10-05 14:49:06', '2026-10-05 14:49:06');
INSERT INTO public.form_configs VALUES (4, 'usado_entrega', 'Tasación de Usado en Parte de Pago', 'Recibimos tu Usado como Entrega', 'Tasamos tu vehículo usado de cualquier marca al mejor valor del mercado para que te lleves tu Toyota.', 'Solicitar Tasación de mi Usado', '¡Datos de tu usado recibidos! Nuestro equipo de peritaje te enviará la tasación estimada.', 'tasaciones@consur.com.py, usados@consur.com.py', 'Hola Consur S.A., quisiera tasar mi vehículo usado para entregarlo como parte de pago.', true, '2026-10-05 14:49:06', '2026-10-05 14:49:06');


--
-- Data for Name: job_batches; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: leads; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.leads VALUES (2, 'usado_interes', 5, 1, NULL, 'María Elena Ortiz', 'maria.ortiz@hotmail.com', '+595 975 444 888', 'Posadas / Encarnación', 'Buenas tardes, quiero probar la RAV4 Híbrida 2021 este sábado por la mañana.', NULL, NULL, '2026-10-08', '10:00', 'en_gestion', 'Se le agendó llamada para confirmar disponibilidad de vehículo.', NULL, '127.0.0.1', NULL, NULL, NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.leads VALUES (5, 'cotizacion', 5, NULL, 4, 'Roberto Santander', 'rsantander@agroparaguay.com.py', '+595 971 889900', 'Colonias Unidas', '¿Aceptan entrega de usado como parte de pago? Tengo una Hilux 2018.', NULL, 'Toyota Hilux SRV 2018 4x4 (110.000 km)', NULL, NULL, 'en_gestion', 'El cliente envió fotos de su Hilux 2018 para tasación inicial.', '2026-10-05 22:01:33', NULL, NULL, NULL, NULL, '2026-10-06 00:01:33', '2026-10-06 00:01:33');
INSERT INTO public.leads VALUES (6, 'usado_entrega', 5, NULL, 4, 'Fernando Giménez', 'fergimenez@gmail.com', '+595 983 445566', 'Encarnación', 'Quiero tasar mi Corolla para retirar este usado certificado.', NULL, 'Toyota Corolla GLi 2016 Aut', NULL, NULL, 'en_gestion', NULL, '2026-10-06 00:07:31', NULL, NULL, NULL, NULL, '2026-10-06 00:01:33', '2026-10-06 00:07:31');
INSERT INTO public.leads VALUES (1, 'cotizacion', NULL, 1, NULL, 'Carlos Benítez', 'carlos.benitez@gmail.com', '+595 981 555 123', 'Encarnación', 'Hola, me gustaría saber planes de financiación para el nuevo Agya con entrega inicial de 3.000 USD.', 'Entrega inicial + 36 cuotas', NULL, NULL, NULL, 'nuevo', NULL, NULL, '127.0.0.1', NULL, NULL, NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.leads VALUES (4, 'test_drive', NULL, NULL, 4, 'María José Duarte', 'majoduarte@hotmail.com', '+595 985 654321', 'Posadas / Encarnación', 'Quisiera agendar un test drive el fin de semana por la mañana.', NULL, NULL, '2026-10-08', '10:00 AM', 'contactado', 'Contactada por WhatsApp. Confirmada disponibilidad para el sábado.', '2026-10-05 20:01:33', NULL, NULL, NULL, NULL, '2026-10-06 00:01:33', '2026-10-06 00:01:33');
INSERT INTO public.leads VALUES (3, 'cotizacion', NULL, NULL, NULL, 'Carlos Benítez', 'carlos.benitez@gmail.com', '+595 981 123456', 'Encarnación', 'Me interesa conocer las cuotas en guaraníes para la Agya 0km.', 'Plan Cuotas Corridas 36 Meses', NULL, NULL, NULL, 'en_gestion', 'Prueba de seguimiento comercial y llamada programada.', '2026-10-06 00:05:13', NULL, NULL, NULL, NULL, '2026-10-06 00:01:33', '2026-10-06 00:05:13');


--
-- Data for Name: menu_items; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.menu_items VALUES (1, 'header', NULL, 'Vehículos', '#', '_self', NULL, NULL, 'red', 1, true, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.menu_items VALUES (2, 'header', 1, 'Vehículos 0 Km', '/#destacados-0km', '_self', NULL, 'Nuevos', 'red', 1, true, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.menu_items VALUES (3, 'header', 1, 'Vehículos Usados', '/usados', '_self', NULL, 'Stock', 'emerald', 2, true, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.menu_items VALUES (4, 'header', 1, 'Catálogo Digital', 'https://consur.com.py/catalogo-consur-s-a/', '_blank', NULL, NULL, 'red', 3, true, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.menu_items VALUES (6, 'header', NULL, 'Servicios', '/#servicios', '_self', NULL, NULL, 'red', 3, true, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.menu_items VALUES (7, 'header', NULL, 'Seguros', 'https://consur.com.py/seguros/', '_blank', NULL, NULL, 'red', 4, true, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.menu_items VALUES (12, 'footer_col_2', NULL, 'Toyota Agya (0 Km)', '/#destacados-0km', '_self', NULL, NULL, 'red', 1, true, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.menu_items VALUES (13, 'footer_col_2', NULL, 'Toyota Hilux SRV / GR (0 Km)', '/#destacados-0km', '_self', NULL, NULL, 'red', 2, true, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.menu_items VALUES (14, 'footer_col_2', NULL, 'Toyota RAV4 Hybrid (0 Km)', '/#destacados-0km', '_self', NULL, NULL, 'red', 3, true, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.menu_items VALUES (15, 'footer_col_2', NULL, 'Toyota Corolla Cross', '/#destacados-0km', '_self', NULL, NULL, 'red', 4, true, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.menu_items VALUES (16, 'footer_col_2', NULL, 'Usados Certificados con Garantía', '/usados', '_self', NULL, 'Garantía', 'red', 5, true, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.menu_items VALUES (17, 'footer_col_3', NULL, 'Taller Móvil a Domicilio', '/#taller-movil', '_self', NULL, NULL, 'red', 1, true, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.menu_items VALUES (18, 'footer_col_3', NULL, 'Agendamiento de Turnos 365', 'http://www.turnos365.com/turnos.aspx?con=131', '_blank', NULL, NULL, 'red', 2, true, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.menu_items VALUES (19, 'footer_col_3', NULL, 'Repuestos Genuinos Toyota', '/#servicios', '_self', NULL, NULL, 'red', 3, true, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.menu_items VALUES (20, 'footer_col_3', NULL, 'Mantenimiento Periódico Programado', '/#servicios', '_self', NULL, NULL, 'red', 4, true, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.menu_items VALUES (21, 'footer_col_1', NULL, 'Toyota Agya (0 Km)', '/#destacados-0km', '_self', NULL, NULL, 'red', 1, true, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.menu_items VALUES (22, 'footer_col_1', NULL, 'Toyota Hilux SRV / GR (0 Km)', '/#destacados-0km', '_self', NULL, NULL, 'red', 2, true, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.menu_items VALUES (23, 'footer_col_1', NULL, 'Toyota RAV4 Hybrid (0 Km)', '/#destacados-0km', '_self', NULL, NULL, 'red', 3, true, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.menu_items VALUES (24, 'footer_col_1', NULL, 'Toyota Corolla Cross', '/#destacados-0km', '_self', NULL, NULL, 'red', 4, true, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.menu_items VALUES (25, 'footer_col_1', NULL, 'Usados Certificados con Garantía', '/usados', '_self', NULL, 'Garantía', 'red', 5, true, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.menu_items VALUES (5, 'header', NULL, 'Posventa & Taller', '/posventa', '_self', NULL, NULL, 'red', 2, true, '2026-10-05 13:33:22', '2026-10-28 00:18:47');


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
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


--
-- Data for Name: pages; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.pages VALUES (1, 'La Empresa – Consur S.A.', 'la-empresa', 'Concesionaria Oficial de Toyota en Paraguay con más de 25 años de trayectoria y liderazgo en el sur del país.', 'https://images.unsplash.com/photo-1563720223185-11003d516935?auto=format&fit=crop&q=80&w=1600', '<h2>Nuestra Historia</h2>
<p>Consur S.A. nació con el firme compromiso de brindar a las familias y empresas del Paraguay el acceso a los vehículos más confiables, seguros y duraderos del mundo: <strong>Toyota</strong>.</p>
<p>Desde nuestra Casa Central en Encarnación y sucursales estratégicas, combinamos una atención humana personalizada con los estándares internacionales más rigurosos de Toyota Motor Corporation.</p>
<h2>Misión</h2>
<p>Proveer soluciones integrales de movilidad a través de la comercialización de vehículos 0 Km, usados garantizados, repuestos genuinos y servicios técnicos de posventa, superando siempre las expectativas de nuestros clientes con honestidad, calidez y excelencia.</p>
<h2>Visión</h2>
<p>Ser reconocidos como la concesionaria modelo y preferida de Toyota en la región, distinguiéndonos por la innovación continua, la satisfacción del cliente y el compromiso social con nuestra comunidad.</p>
<h2>Valores Corporativos</h2>
<ul>
    <li><strong>Calidad Innegable:</strong> Compromiso estricto con los estándares de fábrica Toyota.</li>
    <li><strong>Integridad:</strong> Transparencia total en cada tasación, venta y servicio.</li>
    <li><strong>Servicio Posventa Cercano:</strong> Acompañamos a nuestros clientes durante todo el ciclo de vida de su vehículo.</li>
</ul>', 'La Empresa | Consur S.A. Toyota Paraguay', 'Conozca la historia, misión y valores de Consur S.A., concesionaria oficial Toyota en Paraguay.', true, 1, '2026-10-05 14:51:44', '2026-10-05 14:51:44');
INSERT INTO public.pages VALUES (2, 'Garantía Oficial Toyota & Seguros', 'garantia-y-seguros', 'Tu inversión protegida con el respaldo absoluto de fábrica y alianzas con las principales aseguradoras.', 'https://images.unsplash.com/photo-1617814076367-b759c7d7e738?auto=format&fit=crop&q=80&w=1600', '<h2>Garantía de Fábrica Toyota</h2>
<p>Cada vehículo Toyota 0 Km adquirido en Consur S.A. cuenta con una cobertura integral de fábrica respaldada por una red global de servicio técnico especializado y repuestos 100% legítimos.</p>
<h2>Garantía en Usados Certificados</h2>
<p>Nuestros vehículos seminuevos y usados pasan por una rigurosa inspección técnica de más de 120 puntos críticos antes de salir al showroom, ofreciendo certificación documentada y garantía de tranquilidad.</p>
<h2>Convenios y Asesoría en Seguros</h2>
<p>Te facilitamos la contratación directa de pólizas contra todo riesgo con las aseguradoras líderes del mercado paraguayo, gestionando coberturas completas de forma inmediata al momento del retiro de tu unidad.</p>', 'Garantía Oficial y Seguros | Consur S.A.', 'Conocé las coberturas de garantía oficial Toyota y los beneficios en seguros que ofrece Consur S.A.', true, 2, '2026-10-05 14:51:44', '2026-10-05 14:51:44');
INSERT INTO public.pages VALUES (3, 'Términos, Condiciones y Privacidad', 'terminos-y-condiciones', 'Transparencia y seguridad en el tratamiento de tus datos y cotizaciones en línea.', 'https://images.unsplash.com/photo-1450133064473-71024230f91b?auto=format&fit=crop&q=80&w=1600', '<h2>Uso del Sitio Web</h2>
<p>El acceso y navegación en el portal web de Consur S.A. implica la aceptación plena de las presentes condiciones generales de uso. Toda información comercial sobre modelos, precios y planes de financiación es referencial y está sujeta a confirmación con un asesor.</p>
<h2>Tratamiento de Datos Personales</h2>
<p>Los datos consignados en los formularios de cotización, turnos y test drive son tratados con estricta confidencialidad por el equipo comercial de Consur S.A. y no son transferidos a terceros.</p>', 'Términos y Condiciones | Consur S.A.', 'Políticas de privacidad y términos de uso del sitio web oficial de Consur S.A.', true, 3, '2026-10-05 14:51:44', '2026-10-05 14:51:44');
INSERT INTO public.pages VALUES (4, 'Servicio Posventa – Consur S.A.', 'posventa', 'Mantené tu Toyota como nuevo con garantía de confianza, repuestos legítimos y atención técnica oficial certificada.', '/images/posventa/serviciotecnicoAI.jpg', '<div data-cms-layout="modern" class="space-y-16">

    <!-- 1. Cuadrícula de 4 Pilares de Excelencia Posventa -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl p-6 border border-neutral-200/80 shadow-xs hover:border-red-500/50 hover:shadow-md transition-all group">
            <div class="w-12 h-12 rounded-xl bg-red-50 text-red-600 flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition-transform">
                <i class="fas fa-user-shield"></i>
            </div>
            <h3 class="text-base font-semibold text-neutral-900 mb-1.5 font-heading">Técnicos Certificados</h3>
            <p class="text-xs text-neutral-600 leading-relaxed">Formación rigurosa continua bajo los estándares globales de Toyota Motor Corporation.</p>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-neutral-200/80 shadow-xs hover:border-red-500/50 hover:shadow-md transition-all group">
            <div class="w-12 h-12 rounded-xl bg-red-50 text-red-600 flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition-transform">
                <i class="fas fa-cogs"></i>
            </div>
            <h3 class="text-base font-semibold text-neutral-900 mb-1.5 font-heading">Repuestos Genuinos TGMO</h3>
            <p class="text-xs text-neutral-600 leading-relaxed">Piezas originales y lubricantes oficiales diseñados específicamente para tu modelo Toyota.</p>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-neutral-200/80 shadow-xs hover:border-red-500/50 hover:shadow-md transition-all group">
            <div class="w-12 h-12 rounded-xl bg-red-50 text-red-600 flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition-transform">
                <i class="fas fa-stopwatch-20"></i>
            </div>
            <h3 class="text-base font-semibold text-neutral-900 mb-1.5 font-heading">Box Exprés 21 Puntos</h3>
            <p class="text-xs text-neutral-600 leading-relaxed">Mantenimiento periódico preventivo y cambio de fluidos en tiempo récord con 2 técnicos.</p>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-neutral-200/80 shadow-xs hover:border-red-500/50 hover:shadow-md transition-all group">
            <div class="w-12 h-12 rounded-xl bg-red-50 text-red-600 flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition-transform">
                <i class="fas fa-truck-pickup"></i>
            </div>
            <h3 class="text-base font-semibold text-neutral-900 mb-1.5 font-heading">Taller Móvil Consur</h3>
            <p class="text-xs text-neutral-600 leading-relaxed">Llevamos el servicio técnico especializado hasta tu campo, empresa o domicilio.</p>
        </div>
    </div>

    <!-- 2. Sección Box Exprés (2 Columnas con Foto y Checklist de 21 Puntos) -->
    <div class="bg-white rounded-3xl p-6 sm:p-10 lg:p-12 border border-neutral-200/80 shadow-xs overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
            <div class="lg:col-span-6 relative order-2 lg:order-1">
                <div class="rounded-2xl overflow-hidden shadow-lg border border-neutral-100 aspect-[4/3] bg-neutral-100">
                    <img src="/images/posventa/boxexpress.jpg" 
                         alt="Servicio Box Exprés Consur Toyota" 
                         class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                </div>
                <div class="absolute -bottom-4 -right-4 bg-neutral-900 text-white px-4 py-2.5 rounded-xl shadow-lg border border-neutral-800 hidden sm:flex items-center gap-2">
                    <i class="fas fa-bolt text-amber-400"></i>
                    <span class="text-xs font-medium">Atención inmediata con 2 especialistas</span>
                </div>
            </div>

            <div class="lg:col-span-6 space-y-6 order-1 lg:order-2">
                <div>
                    <span class="text-xs uppercase font-medium tracking-widest text-red-600">Servicio Exprés Oficial</span>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-neutral-900 font-heading mt-1">
                        BOX <span class="font-normal text-red-600">EXPRÉS</span>
                    </h2>
                </div>

                <p class="text-sm text-neutral-600 leading-relaxed">
                    En nuestro servicio <strong>Box Exprés</strong>, tu vehículo recibe atención inmediata y precisa. Con dos técnicos especializados, realizamos el cambio de aceite y filtro, más una inspección completa de <strong>21 puntos clave</strong> que incluyen luces, suspensión y frenos. Un servicio rápido, eficiente y seguro, pensado para que vuelvas a la ruta sin demoras.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                    <div class="flex items-start gap-2.5">
                        <i class="fas fa-check-circle text-emerald-500 text-sm mt-0.5"></i>
                        <span class="text-xs text-neutral-700 font-medium">Aceite TGMO y filtros genuinos</span>
                    </div>
                    <div class="flex items-start gap-2.5">
                        <i class="fas fa-check-circle text-emerald-500 text-sm mt-0.5"></i>
                        <span class="text-xs text-neutral-700 font-medium">Revisión de pastillas y discos</span>
                    </div>
                    <div class="flex items-start gap-2.5">
                        <i class="fas fa-check-circle text-emerald-500 text-sm mt-0.5"></i>
                        <span class="text-xs text-neutral-700 font-medium">Inspección de tren y suspensión</span>
                    </div>
                    <div class="flex items-start gap-2.5">
                        <i class="fas fa-check-circle text-emerald-500 text-sm mt-0.5"></i>
                        <span class="text-xs text-neutral-700 font-medium">Batería, luces y alternador</span>
                    </div>
                    <div class="flex items-start gap-2.5">
                        <i class="fas fa-check-circle text-emerald-500 text-sm mt-0.5"></i>
                        <span class="text-xs text-neutral-700 font-medium">Presión y desgaste de cubiertas</span>
                    </div>
                    <div class="flex items-start gap-2.5">
                        <i class="fas fa-check-circle text-emerald-500 text-sm mt-0.5"></i>
                        <span class="text-xs text-neutral-700 font-medium">Diagnóstico computarizado OBD</span>
                    </div>
                </div>

                <div class="pt-3 flex flex-wrap items-center gap-4">
                    <a href="http://www.turnos365.com/turnos.aspx?con=131" target="_blank" 
                       class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium text-xs uppercase tracking-wider rounded-full transition shadow-md shadow-red-600/20 flex items-center gap-2">
                        <i class="far fa-calendar-check"></i>
                        <span>Agendar Box Exprés</span>
                    </a>
                    <a href="https://wa.me/595985204106?text=Hola%20Consur%2C%20quisiera%20consultar%20por%20el%20servicio%20Box%20Expr%C3%A9s" target="_blank" 
                       class="px-5 py-3 bg-neutral-100 hover:bg-neutral-200 text-neutral-800 font-medium text-xs uppercase tracking-wider rounded-full transition flex items-center gap-2">
                        <i class="fab fa-whatsapp text-emerald-600"></i>
                        <span>Consultar por WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Sección Vehículo de Cortesía (2 Columnas Invertidas) -->
    <div class="bg-white rounded-3xl p-6 sm:p-10 lg:p-12 border border-neutral-200/80 shadow-xs overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
            <div class="lg:col-span-6 space-y-6">
                <div>
                    <span class="text-xs uppercase font-medium tracking-widest text-red-600">Movilidad Sin Pausas</span>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-neutral-900 font-heading mt-1">
                        VEHÍCULO DE <span class="font-normal text-red-600">CORTESÍA</span>
                    </h2>
                </div>

                <p class="text-sm text-neutral-600 leading-relaxed">
                    Servicio posventa sin pausas: mientras cuidamos de tu Toyota, seguís tu camino. Consultá por nuestra opción de <strong>vehículo de cortesía</strong> para que tu actividad productiva, compromisos familiares o de negocios continúen sin interrupciones durante el tiempo de taller.
                </p>

                <div class="space-y-3">
                    <div class="p-3.5 rounded-xl bg-neutral-50 border border-neutral-100 flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-red-100 text-red-600 flex items-center justify-center flex-shrink-0 text-sm">
                            <i class="fas fa-car-side"></i>
                        </div>
                        <div>
                            <h4 class="text-xs font-semibold text-neutral-900">Unidades Confortables y Seguras</h4>
                            <p class="text-xs text-neutral-500 mt-0.5">Vehículos oficiales Toyota en óptimas condiciones mecánicas listos para acompañarte.</p>
                        </div>
                    </div>

                    <div class="p-3.5 rounded-xl bg-neutral-50 border border-neutral-100 flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0 text-sm">
                            <i class="fas fa-file-contract"></i>
                        </div>
                        <div>
                            <h4 class="text-xs font-semibold text-neutral-900">Gestión Ágil y Directa</h4>
                            <p class="text-xs text-neutral-500 mt-0.5">Trámite simplificado coordinado previamente con tu asesor de servicio.</p>
                        </div>
                    </div>
                </div>

                <div class="pt-2">
                    <a href="https://wa.me/595985204106?text=Hola%20Consur%2C%20quisiera%20solicitar%20informaci%C3%B3n%20sobre%20el%20Veh%C3%ADculo%20de%20Cortes%C3%ADa" target="_blank" 
                       class="inline-flex items-center gap-2 px-6 py-3 bg-neutral-900 hover:bg-neutral-800 text-white font-medium text-xs uppercase tracking-wider rounded-full transition">
                        <i class="fab fa-whatsapp text-emerald-400"></i>
                        <span>Consultar Disponibilidad de Vehículo</span>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-6 relative">
                <div class="rounded-2xl overflow-hidden shadow-lg border border-neutral-100 aspect-[4/3] bg-neutral-100">
                    <img src="/images/posventa/vehiculocortesia.jpg" 
                         alt="Vehículo de Cortesía Consur S.A." 
                         class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                </div>
                <div class="absolute -bottom-4 -left-4 bg-red-600 text-white px-4 py-2.5 rounded-xl shadow-lg hidden sm:flex items-center gap-2">
                    <i class="fas fa-shield-alt"></i>
                    <span class="text-xs font-medium">Continuidad garantizada para tu día</span>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. Banner Taller Móvil Oficial (Con Fondo y Acceso a Turnos) -->
    <div class="relative rounded-3xl overflow-hidden shadow-xl text-white">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url(''/images/posventa/tallermovilmejorado.jpg'')"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-neutral-950 via-neutral-950/85 to-neutral-950/60"></div>

        <div class="relative z-10 p-8 sm:p-12 lg:p-16 max-w-3xl space-y-6">
            <span class="text-xs uppercase font-medium tracking-widest text-red-500">Asistencia Técnica en tu Lugar</span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-white font-heading uppercase tracking-normal">
                TALLER <span class="font-normal text-red-500">MÓVIL CONSUR</span>
            </h2>

            <p class="text-sm sm:text-base text-neutral-300 leading-relaxed font-light">
                ¡El taller ahora va donde estés! Con el servicio de <strong>Taller Móvil</strong>, solucionamos lo que tu vehículo necesita, estés donde estés. Práctico, rápido y confiable. Equipado con instrumental de diagnóstico de última generación y repuestos originales.
            </p>

            <div class="p-4 rounded-2xl bg-white/10 backdrop-blur-md border border-white/15">
                <div class="text-xs font-semibold text-white uppercase tracking-wider mb-2 flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-red-500"></i>
                    <span>4 Talleres Autorizados en el Sur del País</span>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 text-xs text-neutral-300">
                    <div class="bg-black/30 px-3 py-1.5 rounded-lg text-center font-medium">Encarnación</div>
                    <div class="bg-black/30 px-3 py-1.5 rounded-lg text-center font-medium">Obligado</div>
                    <div class="bg-black/30 px-3 py-1.5 rounded-lg text-center font-medium">San Ignacio</div>
                    <div class="bg-black/30 px-3 py-1.5 rounded-lg text-center font-medium">María Auxiliadora</div>
                </div>
            </div>

            <div class="pt-2 flex flex-wrap gap-4">
                <a href="http://www.turnos365.com/turnos.aspx?con=131" target="_blank" 
                   class="px-7 py-3.5 bg-red-600 hover:bg-red-700 text-white font-medium text-xs uppercase tracking-wider rounded-full transition shadow-lg shadow-red-600/30 flex items-center gap-2">
                    <i class="far fa-calendar-alt"></i>
                    <span>Agendar Turno Online</span>
                </a>
                <a href="https://wa.me/595985204106?text=Hola%20Consur%2C%20solicito%20el%20servicio%20de%20Taller%20M%C3%B3vil" target="_blank" 
                   class="px-7 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-medium text-xs uppercase tracking-wider rounded-full transition shadow-lg shadow-emerald-600/30 flex items-center gap-2">
                    <i class="fab fa-whatsapp"></i>
                    <span>Pedir Taller Móvil</span>
                </a>
            </div>
        </div>
    </div>

    <!-- 5. Sección Te Acompañamos (Filosofía y 4 Beneficios) -->
    <div class="space-y-10">
        <div class="text-center max-w-2xl mx-auto space-y-2">
            <span class="text-xs uppercase font-medium tracking-widest text-red-600">Relación de Confianza Duradera</span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-light text-neutral-900 font-heading">
                Te <span class="font-normal text-red-600">Acompañamos</span>
            </h2>
            <p class="text-sm text-neutral-600 leading-relaxed">
                A partir del momento que Usted adquiere nuestras unidades o nuestros servicios empieza una relación donde siempre va a encontrarse acompañado.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl p-6 border border-neutral-200/80 shadow-xs hover:border-red-500/50 hover:shadow-md transition">
                <div class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center mb-3">
                    <i class="fas fa-heartbeat text-base"></i>
                </div>
                <h4 class="text-sm font-semibold text-neutral-900 mb-1 font-heading">Extienda la Vida Útil</h4>
                <p class="text-xs text-neutral-500 leading-relaxed">Mantenimientos preventivos periódicos que previenen desgastes costosos y aseguran el valor de reventa.</p>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-neutral-200/80 shadow-xs hover:border-red-500/50 hover:shadow-md transition">
                <div class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center mb-3">
                    <i class="fas fa-gas-pump text-base"></i>
                </div>
                <h4 class="text-sm font-semibold text-neutral-900 mb-1 font-heading">Ahorre Combustible</h4>
                <p class="text-xs text-neutral-500 leading-relaxed">Sistemas de inyección afinados y lubricantes oficiales reducen la fricción y el consumo en cada viaje.</p>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-neutral-200/80 shadow-xs hover:border-red-500/50 hover:shadow-md transition">
                <div class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center mb-3">
                    <i class="fas fa-chart-line-down text-base"></i>
                </div>
                <h4 class="text-sm font-semibold text-neutral-900 mb-1 font-heading">Reducción de Costos</h4>
                <p class="text-xs text-neutral-500 leading-relaxed">Detección oportuna de desgastes menores que evita paradas imprevistas o reparaciones mayores complejas.</p>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-neutral-200/80 shadow-xs hover:border-red-500/50 hover:shadow-md transition">
                <div class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center mb-3">
                    <i class="fas fa-route text-base"></i>
                </div>
                <h4 class="text-sm font-semibold text-neutral-900 mb-1 font-heading">Evite Contratiempos</h4>
                <p class="text-xs text-neutral-500 leading-relaxed">Seguridad total y tranquilidad en ruta para vos, tu familia o las unidades de tu flota de trabajo.</p>
            </div>
        </div>
    </div>

    <!-- 6. Personal Altamente Calificado & Infraestructura Oficial -->
    <div class="bg-white rounded-3xl p-6 sm:p-10 lg:p-12 border border-neutral-200/80 shadow-xs">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            <div class="lg:col-span-7 space-y-4 text-neutral-700 text-sm leading-relaxed">
                <span class="text-xs uppercase font-medium tracking-widest text-red-600">Equipo Humano y Técnico</span>
                <h3 class="text-xl sm:text-2xl font-light text-neutral-900 font-heading">
                    ¡Personal altamente calificado para brindar los mejores servicios!
                </h3>
                <p>
                    Nuestra <strong>Gerencia de Servicios</strong> se encargará de atenderlo en todo el proceso durante su visita al Servicio Técnico, tomando nota de sus necesidades y brindándole en forma ágil toda la información que necesita.
                </p>
                <p>
                    <strong>Técnicos altamente capacitados</strong> estarán poniendo el mejor de sus conocimientos para realizar los mantenimientos y reparaciones necesarias en su vehículo. El Asesor de Repuestos podrá brindarle toda la información necesaria acerca de la disponibilidad y costos de accesorios y repuestos genuinos.
                </p>
                <p class="text-xs text-neutral-500 pt-2 border-t border-neutral-100">
                    <i class="fas fa-info-circle text-red-600 mr-1.5"></i>
                    <strong>CONSUR S.A.</strong> cuenta con el Servicio Técnico oficial de los vehículos comercializados por la firma, con talleres distribuidos en ubicaciones estratégicas del departamento de Itapúa y Misiones.
                </p>
            </div>

            <div class="lg:col-span-5 bg-neutral-50 rounded-2xl p-6 border border-neutral-100 space-y-4">
                <h4 class="text-sm font-semibold text-neutral-900 uppercase font-heading tracking-wide">
                    Horarios de Atención en Talleres
                </h4>
                <div class="space-y-2 text-xs text-neutral-600">
                    <div class="flex justify-between py-1.5 border-b border-neutral-200/60">
                        <span class="font-medium text-neutral-800">Lunes a Viernes:</span>
                        <span>7:00 a 12:00 &bull; 14:00 a 17:30 Hs</span>
                    </div>
                    <div class="flex justify-between py-1.5 border-b border-neutral-200/60">
                        <span class="font-medium text-neutral-800">Sábados:</span>
                        <span>7:30 a 12:00 Hs</span>
                    </div>
                    <div class="flex justify-between py-1.5">
                        <span class="font-medium text-neutral-800">Contact Center:</span>
                        <span class="text-red-600 font-medium">+595 985 804 106</span>
                    </div>
                </div>

                <div class="pt-2">
                    <a href="http://www.turnos365.com/turnos.aspx?con=131" target="_blank" 
                       class="w-full text-center block py-3 bg-red-600 hover:bg-red-700 text-white font-medium text-xs uppercase tracking-wider rounded-xl transition shadow-md shadow-red-600/20">
                        <i class="far fa-calendar-check mr-1.5"></i> Agendar Turno en Turnos365
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>', 'Servicio Posventa Toyota | Consur S.A.', 'Servicio técnico oficial Toyota en Consur S.A. Mantenimiento Box Exprés, Taller Móvil, Vehículo de Cortesía y repuestos legítimos en Encarnación y sucursales.', true, 2, '2026-10-28 00:18:47', '2026-10-28 00:27:17');


--
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: podcasts; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.podcasts VALUES (1, 'Episodio 12', 'Tecnología Híbrida Toyota: Mitos, Realidades y Ahorro en Paraguay', 'Conversamos con ingenieros de Toyota y especialistas sobre cómo funciona el sistema híbrido autorrecargable y su rendimiento en rutas de nuestro país.', 'Equipo Técnico Oficial Consur', 'https://open.spotify.com/show/2c7HzcDvLF5XXMPbOckJn2', 'https://youtube.com', 'https://images.unsplash.com/photo-1590602847861-f357a9332bbc?auto=format&fit=crop&q=80&w=600', '42 min', '2026-09-25', true, 1, '2026-10-05 02:20:26', '2026-10-05 02:20:26');


--
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.sessions VALUES ('irfZzSUTUE30LziahLgdoS5HvVvB0tv5uziVdN20', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0', 'eyJfdG9rZW4iOiJoT05oOE5xR21KSFhmR3doeGJRTGJ0ZEppWld3N1laMVI3UHk3Rlo1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1793190657);
INSERT INTO public.sessions VALUES ('9YJJomNLLtW2HYknRwKIBZ0JM2G3RE5egdRXI4qq', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0', 'eyJfdG9rZW4iOiJTVVlHVTZRWlZobXdEYmp0MTBLTVQ4RTZzQ0FleU9WRlhEZEI3Q0ZkIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pbiIsInJvdXRlIjoiYWRtaW4uZGFzaGJvYXJkIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsInBhc3N3b3JkX2hhc2hfd2ViIjoiNTQwNWQwYTNlYjkzMTZjOTU1ZTM5YWQ5N2FjYmFiZjBiM2UzZTJjYjY1ODQyMDdmMzIyMjUxODA2YmZjMjgwYSJ9', 1793192714);
INSERT INTO public.sessions VALUES ('y56ZizfhQhqKOnxSVJHxzhcSxFCteRDxFBnKy0jt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0', 'eyJfdG9rZW4iOiJ5enZ5b1BXZDhXRDhrbkNEdVFQWTd0ZHpVMFJqYVVheHV4MU40NkdUIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2FkbWluIn0sIl9wcmV2aW91cyI6eyJ1cmwiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYWRtaW4iLCJyb3V0ZSI6ImFkbWluLmRhc2hib2FyZCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1793190649);


--
-- Data for Name: settings; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.settings VALUES (1, 'company_name', 'Consur S.A. – Concesionaria Oficial Toyota', 'text', 'general', 'Nombre de Empresa', NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.settings VALUES (2, 'contact_phone', '+595 985 804 106', 'text', 'contact', 'Teléfono de Contact Center', NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.settings VALUES (3, 'contact_whatsapp', '595985204106', 'text', 'contact', 'WhatsApp Principal (sin +)', NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.settings VALUES (4, 'contact_email', 'contacto@consur.com.py', 'text', 'contact', 'Email de Contacto', NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.settings VALUES (6, 'schedule_info', 'Lun a Vie: 7:00 a 12:00 • 14:00 a 17:30 | Sáb: 7:30 a 12:00', 'text', 'general', 'Horarios de Atención', NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.settings VALUES (7, 'turnos_url', 'http://www.turnos365.com/turnos.aspx?con=131', 'text', 'general', 'Enlace de Turnos Online', NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.settings VALUES (8, 'facebook_url', 'https://www.facebook.com/ConsurToyota/', 'text', 'social', 'Facebook URL', NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.settings VALUES (9, 'instagram_url', 'https://www.instagram.com/consur_toyota/', 'text', 'social', 'Instagram URL', NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.settings VALUES (10, 'tiktok_url', 'https://www.tiktok.com/@consurtoyota', 'text', 'social', 'TikTok URL', NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.settings VALUES (11, 'spotify_url', 'https://open.spotify.com/show/2c7HzcDvLF5XXMPbOckJn2', 'text', 'social', 'Spotify URL', NULL, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.settings VALUES (12, 'logo_type', 'typography', 'text', 'branding', 'Tipo de Logo (typography o image)', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (13, 'logo_primary_text', 'CONSUR', 'text', 'branding', 'Texto Principal Logo', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (14, 'logo_dot_color', '#DC2626', 'text', 'branding', 'Color del Punto del Logo', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (15, 'logo_brand_badge', 'TOYOTA', 'text', 'branding', 'Texto Insignia Marca', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (16, 'logo_image_url', 'https://consur.com.py/wp-content/uploads/2019/07/logoconsurweb.png', 'text', 'branding', 'URL de Imagen de Logo', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (17, 'favicon_url', '', 'text', 'branding', 'URL del Favicon', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (18, 'home_value_cards', '[{"icon":"fas fa-certificate","title":"Concesionaria Oficial","subtitle":"Garant\u00eda y respaldo Toyota"},{"icon":"fas fa-truck-pickup","title":"Taller M\u00f3vil","subtitle":"Asistencia t\u00e9cnica en tu campo"},{"icon":"fas fa-shield-alt","title":"Usados Certificados","subtitle":"150 puntos de inspecci\u00f3n"},{"icon":"fas fa-hand-holding-usd","title":"Financiaci\u00f3n Propia","subtitle":"Planes en Guaran\u00edes o D\u00f3lares"}]', 'json', 'home_sections', 'Tarjetas de Barra de Beneficios', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (19, 'sec_0km_tag', 'Línea de Modelos 0 Km', 'text', 'home_sections', '0KM - Etiqueta', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (20, 'sec_0km_title', 'Descubrí la Gama Toyota', 'text', 'home_sections', '0KM - Título Principal', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (21, 'sec_usados_tag', 'Consur Usados Certificados', 'text', 'home_sections', 'Usados - Etiqueta', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (22, 'sec_usados_title', 'Vehículos con Experiencia y Respaldo Oficial', 'text', 'home_sections', 'Usados - Título', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (23, 'sec_usados_desc', 'Accedé a autos y camionetas seleccionadas con historial verificado, revisión técnica integral en talleres Consur y planes de financiación directa.', 'text', 'home_sections', 'Usados - Descripción', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (24, 'sec_usados_btn_text', 'Ver Todo el Stock de Usados', 'text', 'home_sections', 'Usados - Texto Botón', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (25, 'sec_usados_btn_url', '/usados', 'text', 'home_sections', 'Usados - URL Botón', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (26, 'sec_usados_bg_image', 'https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=1920', 'text', 'home_sections', 'Usados - Imagen Fondo', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (27, 'sec_posventa_tag', 'Servicio de Posventa Exclusivo', 'text', 'home_sections', 'Posventa - Etiqueta', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (28, 'sec_posventa_title', 'Taller Móvil Consur Toyota', 'text', 'home_sections', 'Posventa - Título', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (29, 'sec_posventa_desc', 'Entendemos que tu tiempo y tu trabajo no se detienen. Por eso, nuestro equipo de técnicos certificados se traslada con vehículos equipados con herramientas de diagnóstico de última generación.', 'text', 'home_sections', 'Posventa - Descripción', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (30, 'sec_posventa_image', 'https://images.unsplash.com/photo-1486006920555-c77dce18193b?auto=format&fit=crop&q=80&w=1200', 'text', 'home_sections', 'Posventa - Foto Taller Móvil', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (31, 'sec_posventa_badge_title', '100% OFICIAL', 'text', 'home_sections', 'Posventa - Título Badge Flotante', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (32, 'sec_posventa_badge_desc', 'Mantenimiento con repuestos legítimos en la comodidad de tu hogar o establecimiento rural.', 'text', 'home_sections', 'Posventa - Texto Badge', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (33, 'sec_posventa_card1_icon', 'fas fa-tools', 'text', 'home_sections', 'Posventa - Card 1 Ícono', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (34, 'sec_posventa_card1_title', 'Service Programado', 'text', 'home_sections', 'Posventa - Card 1 Título', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (35, 'sec_posventa_card1_desc', 'Mantenimiento de 5.000 a 100.000 km manteniendo la garantía de fábrica.', 'text', 'home_sections', 'Posventa - Card 1 Descripción', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (36, 'sec_posventa_card2_icon', 'fas fa-oil-can', 'text', 'home_sections', 'Posventa - Card 2 Ícono', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (37, 'sec_posventa_card2_title', 'Repuestos Genuinos', 'text', 'home_sections', 'Posventa - Card 2 Título', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (38, 'sec_posventa_card2_desc', 'Filtros, lubricantes originales Toyota TGMO y pastillas de freno.', 'text', 'home_sections', 'Posventa - Card 2 Descripción', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (39, 'sec_podcast_tag', 'Espacio de Audio', 'text', 'home_sections', 'Podcast - Etiqueta', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (40, 'sec_podcast_title', 'Podcast "Ruta Consur"', 'text', 'home_sections', 'Podcast - Título', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (41, 'sec_podcast_desc', 'Novedades automotrices, tecnología híbrida y consejos para el cuidado de tu vehículo.', 'text', 'home_sections', 'Podcast - Descripción', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (42, 'sec_testimonials_tag', 'Experiencias Reales', 'text', 'home_sections', 'Testimonios - Etiqueta', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (43, 'sec_testimonials_title', 'Lo que dicen nuestros clientes', 'text', 'home_sections', 'Testimonios - Título', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (44, 'sec_branches_tag', 'Red de Atención', 'text', 'home_sections', 'Sucursales - Etiqueta', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (45, 'sec_branches_title', 'Nuestras Sucursales', 'text', 'home_sections', 'Sucursales - Título', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (46, 'sec_branches_desc', 'Visitanos en nuestras salas de exhibición y talleres autorizados en el sur del país.', 'text', 'home_sections', 'Sucursales - Subtítulo', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (47, 'form_quote_tag', 'Asesoramiento Personalizado', 'text', 'forms', 'Formulario - Etiqueta', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (48, 'form_quote_title', 'Cotizá tu Próximo Toyota', 'text', 'forms', 'Formulario - Título', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (49, 'form_quote_desc', 'Completá el formulario y un asesor comercial de Consur S.A. se comunicará contigo con las mejores opciones de pago.', 'text', 'forms', 'Formulario - Subtítulo', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (50, 'form_quote_btn_text', 'Enviar Solicitud de Cotización', 'text', 'forms', 'Formulario - Texto Botón', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (51, 'form_quote_success_title', '¡Gracias por contactarnos!', 'text', 'forms', 'Formulario - Título Éxito', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (52, 'form_quote_success_desc', 'Hemos recibido tu consulta y nos pondremos en contacto contigo a la brevedad.', 'text', 'forms', 'Formulario - Mensaje Éxito', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (53, 'form_notification_email', 'ventas@consur.com.py', 'text', 'forms', 'Email de Notificación de Leads', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (54, 'footer_col1_text', 'Concesionaria Oficial de Toyota en Paraguay. Excelencia, garantía y servicio de posventa especializado para tu tranquilidad y confianza.', 'text', 'footer', 'Footer - Texto Columna 1', NULL, '2026-10-05 13:33:22', '2026-10-05 13:33:22');
INSERT INTO public.settings VALUES (60, 'site_logo_type', 'text', 'text', 'branding', 'Tipo de Logotipo (text o image)', NULL, '2026-10-05 14:30:53', '2026-10-05 14:30:53');
INSERT INTO public.settings VALUES (61, 'site_logo_text_prefix', 'CONSUR', 'text', 'branding', 'Prefijo de Texto del Logo', NULL, '2026-10-05 14:30:53', '2026-10-05 14:30:53');
INSERT INTO public.settings VALUES (62, 'site_logo_text_suffix', '.', 'text', 'branding', 'Sufijo de Texto del Logo', NULL, '2026-10-05 14:30:53', '2026-10-05 14:30:53');
INSERT INTO public.settings VALUES (63, 'site_logo_badge', 'TOYOTA', 'text', 'branding', 'Etiqueta del Logo', NULL, '2026-10-05 14:30:53', '2026-10-05 14:30:53');
INSERT INTO public.settings VALUES (64, 'site_logo_url', 'https://consur.com.py/wp-content/uploads/2019/07/logoconsurweb.png', 'text', 'branding', 'URL de Imagen del Logo', NULL, '2026-10-05 14:30:53', '2026-10-05 14:30:53');
INSERT INTO public.settings VALUES (65, 'site_favicon_url', '', 'text', 'branding', 'URL de Favicon', NULL, '2026-10-05 14:30:53', '2026-10-05 14:30:53');
INSERT INTO public.settings VALUES (66, 'footer_about_text', 'Concesionaria Oficial de Toyota en Paraguay. Excelencia, garantía y servicio de posventa especializado para tu tranquilidad y confianza.', 'text', 'footer', 'Footer About Text', NULL, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (67, 'footer_show_facebook', '1', 'text', 'footer', 'Footer Show Facebook', NULL, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (68, 'footer_show_instagram', '1', 'text', 'footer', 'Footer Show Instagram', NULL, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (69, 'footer_show_tiktok', '1', 'text', 'footer', 'Footer Show Tiktok', NULL, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (70, 'footer_show_spotify', '1', 'text', 'footer', 'Footer Show Spotify', NULL, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (71, 'footer_show_linkedin', '0', 'text', 'footer', 'Footer Show Linkedin', NULL, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (72, 'footer_show_youtube', '0', 'text', 'footer', 'Footer Show Youtube', NULL, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (73, 'linkedin_url', 'https://www.linkedin.com/company/consur-toyota', 'text', 'social', 'Linkedin Url', NULL, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (74, 'youtube_url', 'https://www.youtube.com', 'text', 'social', 'Youtube Url', NULL, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (55, 'footer_col2_title', 'Gama de Modelos', 'text', 'footer', 'Footer Col2 Title', NULL, '2026-10-05 13:33:22', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (56, 'footer_col3_title', 'Servicios Posventa', 'text', 'footer', 'Footer Col3 Title', NULL, '2026-10-05 13:33:22', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (57, 'footer_col4_title', 'Casa Central', 'text', 'footer', 'Footer Col4 Title', NULL, '2026-10-05 13:33:22', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (58, 'footer_address', 'Ruta 1 Km 2.5, Encarnación - Paraguay', 'text', 'footer', 'Footer Address', NULL, '2026-10-05 13:33:22', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (75, 'footer_phone', '+595 71 204 106', 'text', 'footer', 'Footer Phone', NULL, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (76, 'footer_whatsapp', '+595 985 804 106', 'text', 'footer', 'Footer Whatsapp', NULL, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (77, 'footer_email', 'contacto@consur.com.py', 'text', 'footer', 'Footer Email', NULL, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (78, 'footer_show_internal_link', '1', 'text', 'footer', 'Footer Show Internal Link', NULL, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (59, 'footer_copyright', '© {year} Consur S.A. Todos los derechos reservados. Concesionaria Oficial Toyota Paraguay.', 'text', 'footer', 'Footer Copyright', NULL, '2026-10-05 13:33:22', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (79, 'footer_credits', 'Desarrollado con TALL Stack & PostgreSQL', 'text', 'footer', 'Footer Credits', NULL, '2026-10-05 14:42:34', '2026-10-05 14:42:34');
INSERT INTO public.settings VALUES (5, 'usd_to_pyg_rate', '7850', 'text', 'finance', 'Tipo de Cambio USD a Guaraníes', NULL, '2026-10-05 02:20:26', '2026-10-05 23:23:56');


--
-- Data for Name: site_sections; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.site_sections VALUES (1, 'quick_value_bar', 'Barra de Valores Rápidos (4 Bloques)', true, 1, '{"item_1": {"desc": "Garantía y respaldo Toyota", "icon": "fas fa-certificate", "title": "Concesionaria Oficial"}, "item_2": {"desc": "Asistencia técnica en tu campo", "icon": "fas fa-truck-pickup", "title": "Taller Móvil"}, "item_3": {"desc": "150 puntos de inspección", "icon": "fas fa-shield-alt", "title": "Usados Certificados"}, "item_4": {"desc": "Planes en Guaraníes o Dólares", "icon": "fas fa-hand-holding-usd", "title": "Financiación Propia"}}', '2026-10-05 14:38:08', '2026-10-05 14:38:08');
INSERT INTO public.site_sections VALUES (3, 'usados_banner', 'Banner de Usados Certificados', true, 3, '{"desc": "Accedé a autos y camionetas seleccionadas con historial verificado, revisión técnica integral en talleres Consur y planes de financiación directa.", "badge": "Consur Usados Certificados", "title": "Vehículos con Experiencia y Respaldo Oficial", "button_url": "/usados", "button_text": "Ver Todo el Stock de Usados", "background_image": "https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=1920"}', '2026-10-05 14:38:08', '2026-10-05 14:38:08');
INSERT INTO public.site_sections VALUES (4, 'posventa_taller_movil', 'Sección Posventa & Taller Móvil', true, 4, '{"desc": "Entendemos que tu tiempo y tu trabajo no se detienen. Por eso, nuestro equipo de técnicos certificados se traslada con vehículos equipados con herramientas de diagnóstico de última generación.", "badge": "Servicio de Posventa Exclusivo", "title": "Taller Móvil Consur Toyota", "main_image": "https://images.unsplash.com/photo-1486006920555-c77dce18193b?auto=format&fit=crop&q=80&w=1200", "button_1_url": "http://www.turnos365.com/turnos.aspx?con=131", "button_2_msg": "Hola Consur, solicito el servicio de Taller Móvil", "button_1_text": "Agendar Turno Online", "button_2_text": "Pedir Taller Móvil", "feature_1_desc": "Mantenimiento de 5.000 a 100.000 km manteniendo la garantía de fábrica.", "feature_1_icon": "fas fa-tools", "feature_2_desc": "Filtros, lubricantes originales Toyota TGMO y pastillas de freno.", "feature_2_icon": "fas fa-oil-can", "feature_1_title": "Service Programado", "feature_2_title": "Repuestos Genuinos", "highlight_badge_desc": "Mantenimiento con repuestos legítimos en la comodidad de tu hogar o establecimiento rural.", "highlight_badge_title": "100% OFICIAL"}', '2026-10-05 14:38:08', '2026-10-05 14:38:08');
INSERT INTO public.site_sections VALUES (5, 'podcast_section', 'Sección Podcast & Testimonios', true, 5, '{"podcast_desc": "Novedades automotrices, tecnología híbrida y consejos para el cuidado de tu vehículo.", "podcast_badge": "Espacio de Audio", "podcast_title": "Podcast \"Ruta Consur\"", "testimonials_badge": "Experiencias Reales", "testimonials_title": "Lo que dicen nuestros clientes"}', '2026-10-05 14:38:08', '2026-10-05 14:38:08');
INSERT INTO public.site_sections VALUES (6, 'branches_section', 'Sección Red de Sucursales', true, 6, '{"desc": "Visitanos en nuestras salas de exhibición y talleres autorizados en el sur del país.", "badge": "Red de Atención", "title": "Nuestras Sucursales"}', '2026-10-05 14:38:08', '2026-10-05 14:38:08');
INSERT INTO public.site_sections VALUES (7, 'quotation_section', 'Sección Formulario de Cotización', true, 7, '{"desc": "Completá el formulario y un asesor comercial de Consur S.A. se comunicará contigo con las mejores opciones de pago.", "badge": "Asesoramiento Personalizado", "title": "Cotizá tu Próximo Toyota", "button_text": "Enviar Solicitud de Cotización"}', '2026-10-05 14:38:08', '2026-10-05 14:38:08');
INSERT INTO public.site_sections VALUES (2, 'featured_0km', 'Sección Vehículos 0 Km Destacados', true, 2, '{"badge": "Línea de Modelos 0 Km", "title": "Descubrí tu próximo Toyota"}', '2026-10-05 14:38:08', '2026-10-27 20:47:13');


--
-- Data for Name: sliders; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.sliders VALUES (3, 'CONSUR USADOS CERTIFICADOS', 'CALIDAD CON GARANTÍA', 'Vehículos con chequeo riguroso de 150 puntos y financiación propia flexible.', 'Ver Stock de Usados', '/usados', NULL, NULL, 'https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=1920', NULL, 'left', true, 3, '2026-10-05 02:20:24', '2026-10-05 02:20:24');
INSERT INTO public.sliders VALUES (1, 'NUEVO LANZAMIENTO', 'TU AUTO, TU ESTILO', 'Todo lo que buscás en tu primer auto, con el respaldo y la solidez que solo Toyota y Consur te pueden dar.', 'Ver detalles de Agya', '/#destacados-0km', 'Cotizar Ahora', '#contacto', 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&q=80&w=1920', 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&q=80&w=800', 'left', true, 1, '2026-10-05 02:20:24', '2026-10-05 22:34:21');


--
-- Data for Name: testimonials; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.testimonials VALUES (1, 'Ing. Fernando Gamarra', 'Toyota Hilux SRV 4x4', 'Itapúa', 'El servicio de Taller Móvil de Consur es invaluable para los que trabajamos en el campo. Vinieron a mi estancia para el service oficial sin perder un solo día de trabajo.', 5, NULL, true, 1, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.testimonials VALUES (2, 'Dra. Patricia Villalba', 'Toyota Corolla Cross Hybrid', 'Encarnación', 'Compré mi vehículo usado con certificación de Consur y la tranquilidad que te dan es total. El consumo de combustible es mínimo y la atención posventa impecable.', 5, NULL, true, 2, '2026-10-05 02:20:26', '2026-10-05 02:20:26');


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.users VALUES (2, 'Asesor de Ventas 0KM & Usados', 'ventas@consur.com.py', '+595 985 204 106', 'ventas', true, NULL, '2026-10-05 02:20:24', '$2y$12$B2WdX74c64cmodlqHbXpgOoSpHp2qMI.LrP821l9mpZN3W18tr/5K', NULL, '2026-10-05 02:20:24', '2026-10-05 02:20:24');
INSERT INTO public.users VALUES (1, 'Carlos Benítez (Administrador General)', 'admin@consur.com.py', '+595 985 804 106', 'admin', true, NULL, '2026-10-05 23:34:29', '$2y$12$ssxCPozspJcbzlkhWQIJZOc4aP5CzglpACWiVjI9EhhZtUO8kMtSO', NULL, '2026-10-05 02:20:24', '2026-10-05 23:34:29');
INSERT INTO public.users VALUES (3, 'María Duarte (Gestora de Contenidos)', 'gestor@consur.com.py', '+595 985 304 106', 'gestor', true, NULL, '2026-10-05 23:34:29', '$2y$12$AYmLMpfi8BINeWCVIC2wlOWBOVz.TKFgCQI/Df7R2h3ih/sDL044y', NULL, '2026-10-05 23:34:29', '2026-10-05 23:34:29');
INSERT INTO public.users VALUES (4, 'Rodrigo Alcaraz (Asesor Comercial)', 'vendedor@consur.com.py', '+595 985 204 106', 'vendedor', true, NULL, '2026-10-05 23:34:29', '$2y$12$bKrvf4faSFGCPkMllUeLd.Kt505O4PabjSTj1quYqDJ2543jqLrJq', NULL, '2026-10-05 23:34:29', '2026-10-05 23:34:29');
INSERT INTO public.users VALUES (5, 'Lautaro Gimenez', 'lautaro.ventas@consur.com.py', '+595 981 777 888', 'vendedor', true, NULL, NULL, '$2y$12$wcmHm0XSST7uOiQwDMsOHeFV4HKUsfFsORXgO3/a5JdkbkpBocWGa', NULL, '2026-10-05 23:58:35', '2026-10-05 23:58:35');


--
-- Data for Name: vehicle_categories; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.vehicle_categories VALUES (1, 'Sedán', 'sedan', 'fa-car-side', NULL, true, 1, '2026-10-05 02:20:24', '2026-10-05 02:20:24');
INSERT INTO public.vehicle_categories VALUES (6, 'Pick-Up', 'pick-up', 'fa-truck-pickup', NULL, true, 2, '2026-10-27 20:45:47', '2026-10-27 20:45:47');
INSERT INTO public.vehicle_categories VALUES (2, 'SUV', 'suv', 'fa-car', NULL, true, 3, '2026-10-05 02:20:24', '2026-10-27 20:45:47');
INSERT INTO public.vehicle_categories VALUES (7, 'Comercial', 'comercial', 'fa-van-shuttle', NULL, true, 4, '2026-10-27 20:45:47', '2026-10-27 20:45:47');
INSERT INTO public.vehicle_categories VALUES (8, 'Deportivos', 'deportivos', 'fa-bolt', NULL, true, 5, '2026-10-27 20:45:47', '2026-10-27 20:45:47');
INSERT INTO public.vehicle_categories VALUES (9, 'Electrificados', 'electrificados', 'fa-leaf', NULL, true, 6, '2026-10-27 20:45:47', '2026-10-27 20:45:47');
INSERT INTO public.vehicle_categories VALUES (3, 'Camioneta', 'camioneta', 'fa-truck-pickup', NULL, false, 3, '2026-10-05 02:20:24', '2026-10-27 20:47:43');
INSERT INTO public.vehicle_categories VALUES (4, 'Hatchback', 'hatchback', 'fa-car', NULL, false, 4, '2026-10-05 02:20:24', '2026-10-27 20:47:43');
INSERT INTO public.vehicle_categories VALUES (5, 'Híbridos', 'hibridos', 'fa-leaf', NULL, false, 5, '2026-10-05 02:20:24', '2026-10-27 20:47:43');


--
-- Data for Name: vehicle_images; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.vehicle_images VALUES (10, 5, 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&q=80&w=1200', NULL, true, 1, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.vehicle_images VALUES (11, 5, 'https://images.unsplash.com/photo-1594502184342-2e12f877aa73?auto=format&fit=crop&q=80&w=1200', NULL, false, 2, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.vehicle_images VALUES (12, 5, 'https://images.unsplash.com/photo-1550346046-d2ebaa11ba47?auto=format&fit=crop&q=80&w=1200', NULL, false, 3, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.vehicle_images VALUES (13, 5, 'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?auto=format&fit=crop&q=80&w=1200', NULL, false, 4, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.vehicle_images VALUES (14, 5, 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&q=80&w=1200', NULL, false, 5, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.vehicle_images VALUES (15, 6, 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&q=80&w=1200', NULL, true, 1, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.vehicle_images VALUES (16, 6, 'https://images.unsplash.com/photo-1594502184342-2e12f877aa73?auto=format&fit=crop&q=80&w=1200', NULL, false, 2, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.vehicle_images VALUES (17, 7, 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&q=80&w=1200', NULL, true, 1, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
INSERT INTO public.vehicle_images VALUES (18, 8, 'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?auto=format&fit=crop&q=80&w=1200', NULL, true, 1, '2026-10-05 02:20:26', '2026-10-05 02:20:26');
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


--
-- Data for Name: vehicles; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.vehicles VALUES (5, 'd4faf6bc-a8be-46fa-82e1-cc3dbdc8034f', 'usado', 1, 2, 1, 'RAV4', 'HIBRID Aut.', 'toyota-rav4-hibrid-aut-2021-usado', 2021, 38500.00, 302225000, true, 'Entrega 20% y saldo en 36 cuotas fijas', 45000, 'Híbrido', 'Automática e-CVT', '4x2 Delantera', '2.5L VVT-i + Sistema Híbrido Eléctrico', 5, 'Gris Plata Metalizado', 'Cuero Negro', NULL, 'Inspeccionado y certificado por Consur S.A.', 'Unidad en estado inmaculado, único dueño, ficha técnica 100% en taller oficial Consur. Incluye certificado de batería híbrida con garantía vigente, cubiertas nuevas y polarizado premium.', '{"Color": "Gris Plata", "Placa": "Paraguaya (Transferencia directa)", "Puertas": "5 Puertas", "Garantía": "1 Año de Garantía Certificada Consur", "Combustible": "Híbrido (Nafta + Eléctrico autorrecargable)", "Kilometraje": "45.000 Km reales comprobables", "Transmisión": "Automática e-CVT con modo Sport/EV"}', '["Climatizador Automático Bi-Zona con salidas traseras", "Pantalla Táctil HD con Android Auto y Apple CarPlay", "Cámara de Visión Trasera con Guías Dinámicas", "Encendido por Botón (Smart Key / Start-Stop)", "Control de Velocidad Crucero Adaptativo", "7 Airbags y Control de Estabilidad (VSC)", "Llantas de Aleación 18\" Originales Toyota"]', true, true, true, 'disponible', 1, '2026-10-05 02:20:26', '2026-10-05 02:20:26', NULL);
INSERT INTO public.vehicles VALUES (6, '13ab7427-3371-49ea-b6f8-add157c88cf3', 'usado', 1, 3, 1, 'Hilux', 'D/C SRV 4x4 Automática', 'toyota-hilux-srv-4x4-2022-usado', 2022, 46900.00, 368165000, true, NULL, 62000, 'Diesel', 'Automática de 6 Velocidades', '4x4 con Alta y Baja', '2.8L Turbo Diesel 204 HP', 4, 'Blanco Puro', 'Cuero Negro', NULL, NULL, 'Hilux SRV equipada con barra antivuelco, carpa marítima, estribos de fábrica, protector de carrocería y luces full LED. Mantenimiento al día.', '{"Motor": "2.8L D-4D 204 HP", "Seguridad": "Toyota Safety Sense + 7 Airbags", "Tracción": "4x4 con bloqueo electrónico"}', '["Cuero", "Audio JBL", "Carpa Marítima", "Sensores Del/Tras", "Cámara Trasera"]', true, true, false, 'disponible', 2, '2026-10-05 02:20:26', '2026-10-05 02:20:26', NULL);
INSERT INTO public.vehicles VALUES (7, '1a03db41-f456-4d78-90d8-89570cfe44e1', 'usado', 1, 1, 2, 'Corolla', 'GLI 2.0 Automático', 'toyota-corolla-gli-2020-usado', 2020, 21500.00, 168775000, true, NULL, 58000, 'Nafta', 'Automática Direct Shift CVT', '4x2', '2.0L Dynamic Force 170 HP', 4, 'Negro Mica', 'Gris', NULL, NULL, 'Sedán de referencia por durabilidad y confort. Equipado con llantas de aleación, control crucero y pantalla táctil.', '{"Motor": "2.0L 170 HP", "Airbags": "7", "Consumo": "6.2 L / 100 Km"}', '["Cámara de Reversa", "Bluetooth", "Pantalla Multimedia", "Volante Multifunción"]', true, true, false, 'disponible', 3, '2026-10-05 02:20:26', '2026-10-05 02:20:26', NULL);
INSERT INTO public.vehicles VALUES (8, '5373bb23-bdbb-4d37-a330-0032cbfa72ea', 'usado', 3, 2, 1, 'Renegade', 'Longitude 1.8 AT6', 'jeep-renegade-longitude-2021-usado', 2021, 19800.00, 155430000, true, NULL, 51000, 'Nafta / Flex', 'Automática de 6 Marchas', '4x2', '1.8L 16V E-TorQ', 5, 'Rojo Colorado', NULL, NULL, NULL, 'SUV compacto con estilo aventurero único, llantas de 18 pulgadas diamantadas, tapizado en cuero e instrumental digital.', '{"Motor": "1.8L 130 HP", "Transmisión": "Automática 6 Vel"}', '["Tapizado en Cuero", "Llantas 18\"", "Sensor de Lluvia y Luces", "Climatizador Bi-zona"]', false, true, false, 'disponible', 4, '2026-10-05 02:20:26', '2026-10-05 02:20:26', NULL);
INSERT INTO public.vehicles VALUES (9, '6160a366-69e9-43f7-80ad-b78170e63440', '0km', 1, 1, 1, 'Yaris Hatchback', '1.5 XLS CVT', 'toyota-yaris-hatchback-2025', 2025, 21900.00, 171915000, true, NULL, 0, 'Nafta', 'CVT de 7 marchas', '4x2 Delantera', '1.5L Dual VVT-i 107 HP', 5, NULL, NULL, NULL, 'Divertido, ágil y con máxima seguridad', 'El Toyota Yaris Hatchback combina diseño moderno, confort superior y el mejor equipamiento de seguridad activa y pasiva.', NULL, NULL, false, true, false, 'disponible', 1, '2026-10-27 20:46:54', '2026-10-27 20:46:54', NULL);
INSERT INTO public.vehicles VALUES (10, 'b51e7f45-2ac5-423c-984f-53696d714d28', '0km', 1, 1, 1, 'Corolla', '2.0 XEi Direct Shift CVT', 'toyota-corolla-2025', 2025, 28500.00, 223725000, true, NULL, 0, 'Nafta', 'Direct Shift CVT (10 vel)', '4x2 Delantera', '2.0L Dynamic Force 171 HP', 4, NULL, NULL, NULL, 'El sedán más vendido del mundo', 'Elegancia, confiabilidad legendaria, tecnología Toyota Safety Sense y una experiencia de conducción inigualable.', NULL, NULL, false, true, false, 'disponible', 2, '2026-10-27 20:46:54', '2026-10-27 20:46:54', NULL);
INSERT INTO public.vehicles VALUES (11, '8b710554-e813-48cc-9937-39d1989e56fc', '0km', 1, 1, 1, 'Agya', '1.0 MT / AT', 'toyota-agya-2025', 2025, 14900.00, 116965000, true, NULL, 0, 'Nafta', 'Automática / Manual', '4x2 Delantera', '1.0L 3 Cilindros Dual VVT-i', 5, NULL, NULL, NULL, 'Tu auto, tu estilo', 'Tu primer 0 Km Toyota. Confort, conectividad y economía sobresaliente para tu día a día en la ciudad.', NULL, NULL, false, true, false, 'disponible', 3, '2026-10-27 20:46:54', '2026-10-27 20:46:54', NULL);
INSERT INTO public.vehicles VALUES (12, '1f57e6f5-e5ee-4d2c-a1b6-cec6302e1368', '0km', 1, 6, 1, 'Hilux Cabina Doble', 'SRV 4x4 2.8 TDI Automática', 'toyota-hilux-cabina-doble-2025', 2025, 58500.00, 459225000, true, NULL, 0, 'Diesel', 'Automática de 6 velocidades', '4x4 con reductora y bloqueo', '2.8L Turbo Diesel 204 HP', 4, NULL, NULL, NULL, 'La pickup líder absoluta de Paraguay', 'Potencia, durabilidad inquebrantable, confort premium interior y seguridad Toyota Safety Sense.', NULL, NULL, false, true, false, 'disponible', 1, '2026-10-27 20:46:54', '2026-10-27 20:46:54', NULL);
INSERT INTO public.vehicles VALUES (13, 'bed6ca95-88fb-45b8-9fbc-25f3dcde7e65', '0km', 1, 6, 1, 'Hilux Cabina Simple', 'DX 4x4 2.8 TDI Manual', 'toyota-hilux-cabina-simple-2025', 2025, 38900.00, 305365000, true, NULL, 0, 'Diesel', 'Manual de 6 velocidades', '4x4 con reductora', '2.8L Turbo Diesel 204 HP', 2, NULL, NULL, NULL, 'Máxima capacidad para el trabajo pesado', 'Chasis reforzado, gran caja de carga y la robustez que el campo y la industria exigen.', NULL, NULL, false, true, false, 'disponible', 2, '2026-10-27 20:46:54', '2026-10-27 20:46:54', NULL);
INSERT INTO public.vehicles VALUES (14, 'fb7d3b83-9f59-41f1-bb1d-1694fba6d734', '0km', 1, 6, 1, 'Hilux GR-Sport', 'GR-S 4x4 2.8 TDI 224 HP', 'toyota-hilux-gr-sport-2025', 2025, 69900.00, 548715000, true, NULL, 0, 'Diesel', 'Automática de 6 marchas con levas', '4x4 deportiva', '2.8L GR-Tuned 224 HP / 550 Nm', 4, NULL, NULL, NULL, 'ADN Gazoo Racing sobre cualquier terreno', 'Trochas ensanchadas, amortiguadores monotubo Fox, diseño exclusivo y potencia incrementada.', NULL, NULL, false, true, false, 'disponible', 3, '2026-10-27 20:46:54', '2026-10-27 20:46:54', NULL);
INSERT INTO public.vehicles VALUES (15, '0b70c196-8b57-488e-91ac-ae72715936f6', '0km', 1, 2, 1, 'Corolla Cross', 'XRE 2.0 Direct Shift CVT', 'toyota-corolla-cross-2025', 2025, 33900.00, 266115000, true, NULL, 0, 'Nafta', 'CVT de 10 marchas simuladas', '4x2 Delantera', '2.0L Dynamic Force 170 HP', 5, NULL, NULL, NULL, 'El SUV familiar definitivo', 'Gran habitabilidad, baúl espacioso, techo solar y la seguridad integral de la plataforma TNGA.', NULL, NULL, false, true, false, 'disponible', 1, '2026-10-27 20:46:54', '2026-10-27 20:46:54', NULL);
INSERT INTO public.vehicles VALUES (16, 'ab73b0ff-e1ce-4ae7-b5c9-2a5a2eced41d', '0km', 1, 2, 1, 'Fortuner / SW4', 'SRX 4x4 2.8 TDI 7 Asientos', 'toyota-fortuner-sw4-2025', 2025, 74500.00, 584825000, true, NULL, 0, 'Diesel', 'Automática de 6 velocidades', '4x4 Integral con Reductora', '2.8L Turbo Diesel 204 HP', 5, NULL, NULL, NULL, 'Lujo, confort y capacidad todoterreno para 7 pasajeros', 'La combinación perfecta entre la robustez del chasis Hilux y el refinamiento de un SUV de alta gama.', NULL, NULL, false, true, false, 'disponible', 2, '2026-10-27 20:46:54', '2026-10-27 20:46:54', NULL);
INSERT INTO public.vehicles VALUES (17, '838b06c0-88f2-4a34-ac09-a04936a4562a', '0km', 1, 2, 1, 'Yaris Cross', '1.5 XLS CVT', 'toyota-yaris-cross-2025', 2025, 26900.00, 211165000, true, NULL, 0, 'Nafta', 'Automática CVT', '4x2 Delantera', '1.5L Dual VVT-i', 5, NULL, NULL, NULL, 'Estilo crossover dinámico y versátil', 'Compacto por fuera, espacioso por dentro y con excelente despeje del suelo para la ciudad y el viaje.', NULL, NULL, false, true, false, 'disponible', 3, '2026-10-27 20:46:54', '2026-10-27 20:46:54', NULL);
INSERT INTO public.vehicles VALUES (18, '2446fcbf-595b-46ab-9a2c-516f434436b9', '0km', 1, 2, 1, 'Land Cruiser Prado', 'TX-L 2.8 TDI 4x4 7 Pasajeros', 'toyota-land-cruiser-prado-2025', 2025, 98900.00, 776365000, true, NULL, 0, 'Diesel', 'Automática de 8 velocidades', '4x4 Permanente con Torsen', '2.8L Turbo Diesel Intercooler', 5, NULL, NULL, NULL, 'El rey del todoterreno renovado', 'Nueva generación de la legendaria Prado. Diseño neo-retro, capacidades off-road inalcanzables y lujo supremo.', NULL, NULL, false, true, false, 'disponible', 4, '2026-10-27 20:46:54', '2026-10-27 20:46:54', NULL);
INSERT INTO public.vehicles VALUES (19, 'c1dc3d70-3bca-4d81-8ae8-27d6832b285c', '0km', 1, 2, 1, 'Raize Sport', '1.0 Turbo CVT', 'toyota-raize-sport-2025', 2025, 21500.00, 168775000, true, NULL, 0, 'Nafta', 'Automática CVT', '4x2 Delantera', '1.0L Turbo 98 HP', 5, NULL, NULL, NULL, 'El SUV compacto más ágil de la ciudad', 'Eficiente motor turbo, diseño juvenil y moderno equipamiento de infoentretenimiento.', NULL, NULL, false, true, false, 'disponible', 5, '2026-10-27 20:46:54', '2026-10-27 20:46:54', NULL);
INSERT INTO public.vehicles VALUES (20, 'd3deab34-c547-49d1-a32b-697c0e83ce5f', '0km', 1, 7, 1, 'Hiace Furgón', '2.8 TDI L2H2 Techo Alto', 'toyota-hiace-furgon-2025', 2025, 43500.00, 341475000, true, NULL, 0, 'Diesel', 'Manual / Automática de 6 velocidades', '4x2 Trasera', '2.8L 1GD-FTV 177 HP', 5, NULL, NULL, NULL, 'El socio ideal para hacer crecer tu negocio', 'Gran volumen de carga útil de 9.3 m³, durabilidad comprobada Toyota y bajo costo de mantenimiento.', NULL, NULL, false, true, false, 'disponible', 1, '2026-10-27 20:46:54', '2026-10-27 20:46:54', NULL);
INSERT INTO public.vehicles VALUES (21, '47fd8872-74fa-4ec6-a72b-5f27b2516765', '0km', 1, 7, 1, 'Hiace Commuter', '2.8 TDI 14+1 Pasajeros', 'toyota-hiace-commuter-2025', 2025, 51900.00, 407415000, true, NULL, 0, 'Diesel', 'Automática de 6 velocidades', '4x2 Trasera', '2.8L Turbo Diesel 177 HP', 4, NULL, NULL, NULL, 'Transporte ejecutivo y de pasajeros con máxima comodidad', 'Capacidad para 14 pasajeros más conductor, aire acondicionado independiente y confort superior.', NULL, NULL, false, true, false, 'disponible', 2, '2026-10-27 20:46:54', '2026-10-27 20:46:54', NULL);
INSERT INTO public.vehicles VALUES (22, '7bdecc12-5d56-4dfb-a886-0102ef9e245f', '0km', 1, 8, 1, 'GR Yaris', '1.6 Turbo GR-Four 261 HP', 'toyota-gr-yaris-2025', 2025, 64900.00, 509465000, true, NULL, 0, 'Nafta', 'Manual de 6 marchas iMT', 'GR-Four Tracción Integral Permanente', '1.6L 3 Cilindros Turbo 261 HP', 3, NULL, NULL, NULL, 'Pura sangre del Campeonato Mundial de Rally (WRC)', 'Desarrollado directamente por el equipo Toyota Gazoo Racing World Rally Team.', NULL, NULL, false, true, false, 'disponible', 1, '2026-10-27 20:46:54', '2026-10-27 20:46:54', NULL);
INSERT INTO public.vehicles VALUES (23, '3638326f-0d11-4d50-a5d3-c587e93768ea', '0km', 1, 8, 1, 'Corolla GR-Sport', '2.0 Dynamic Force GR-S', 'toyota-corolla-gr-sport-2025', 2025, 32900.00, 258265000, true, NULL, 0, 'Nafta', 'Direct Shift CVT con paddle shifts', '4x2 Delantera con suspensión deportiva', '2.0L Dynamic Force 171 HP', 4, NULL, NULL, NULL, 'El espíritu de Gazoo Racing en tu Corolla', 'Suspensión calibrada por GR, faldones y alerón deportivo, asientos de alcántara con costuras rojas.', NULL, NULL, false, true, false, 'disponible', 2, '2026-10-27 20:46:54', '2026-10-27 20:46:54', NULL);
INSERT INTO public.vehicles VALUES (24, '4ff97270-d1bd-43ee-ad2b-8f7f8dc3d7f1', '0km', 1, 8, 1, 'GR86', '2.4 Boxer Manual 235 HP', 'toyota-gr86-2025', 2025, 54900.00, 430965000, true, NULL, 0, 'Nafta', 'Manual de 6 velocidades', 'Tracción Trasera RWD con Torsen LSD', '2.4L Boxer Atmosférico 235 HP', 2, NULL, NULL, NULL, 'Auténtica pasión por la conducción deportiva pura', 'Bajo centro de gravedad, distribución de pesos perfecta 50:50 y tracción trasera pura.', NULL, NULL, false, true, false, 'disponible', 3, '2026-10-27 20:46:54', '2026-10-27 20:46:54', NULL);
INSERT INTO public.vehicles VALUES (25, '8ffa57ad-6438-44e3-bd24-a40a65bccfe7', '0km', 1, 9, 1, 'Corolla Hybrid', '1.8 SEG e-CVT Híbrido', 'toyota-corolla-hybrid-2025', 2025, 31900.00, 250415000, true, NULL, 0, 'Híbrido (Nafta + Eléctrico)', 'e-CVT Automática', '4x2 Delantera', '1.8L Atkinson + Motor Eléctrico (122 HP combinado)', 4, NULL, NULL, NULL, 'Máxima eficiencia sin necesidad de enchufar', 'Batería autorrecargable, silencio absoluto en modo EV y consumos de menos de 4 litros cada 100 Km.', NULL, NULL, false, true, true, 'disponible', 1, '2026-10-27 20:46:54', '2026-10-27 20:46:54', NULL);
INSERT INTO public.vehicles VALUES (26, '1c5e611d-6b05-4268-80e7-01203573e2cf', '0km', 1, 9, 1, 'Corolla Cross Hybrid', '1.8 SEG e-CVT Híbrido', 'toyota-corolla-cross-hybrid-2025', 2025, 36900.00, 289665000, true, NULL, 0, 'Híbrido (Nafta + Eléctrico)', 'e-CVT Automática', '4x2 Delantera', '1.8L Atkinson + Motor Eléctrico (122 HP combinado)', 5, NULL, NULL, NULL, 'El SUV híbrido favorito para la familia ecológica', 'Combina la versatilidad de un SUV moderno con la tecnología híbrida líder mundial de Toyota.', NULL, NULL, false, true, true, 'disponible', 2, '2026-10-27 20:46:54', '2026-10-27 20:46:54', NULL);
INSERT INTO public.vehicles VALUES (27, '0815a326-bc11-4c50-9144-78323f1394f1', '0km', 1, 9, 1, 'RAV4 Hybrid', 'Limited AWD e-CVT 222 HP', 'toyota-rav4-hybrid-2025', 2025, 52900.00, 415265000, true, NULL, 0, 'Híbrido (Nafta + Eléctrico)', 'e-CVT con modo secuencial', 'AWD-i Tracción Inteligente Eléctrica', '2.5L Dynamic Force + Motores Eléctricos (222 HP)', 5, NULL, NULL, NULL, 'Potencia inteligente con tracción electrónica en las 4 ruedas', 'Equipamiento de lujo Limited, techo panorámico, audio JBL y aceleración instantánea con tracción inteligente AWD-i.', NULL, NULL, false, true, true, 'disponible', 3, '2026-10-27 20:46:54', '2026-10-27 20:46:54', NULL);
INSERT INTO public.vehicles VALUES (28, 'cea66037-94d4-47f7-84e4-432b75abadaa', '0km', 1, 9, 1, 'Yaris Cross Hybrid', '1.5 e-CVT Híbrido', 'toyota-yaris-cross-hybrid-2025', 2025, 29900.00, 234715000, true, NULL, 0, 'Híbrido (Nafta + Eléctrico)', 'e-CVT Automática', '4x2 Delantera', '1.5L Híbrido Autorrecargable 116 HP', 5, NULL, NULL, NULL, 'Tu SUV compacto con consumo récord en ciudad', 'Hasta 80% del tiempo de conducción urbana en modo 100% eléctrico con emisión cero.', NULL, NULL, false, true, true, 'disponible', 4, '2026-10-27 20:46:54', '2026-10-27 20:46:54', NULL);


--
-- Name: activity_logs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.activity_logs_id_seq', 32, true);


--
-- Name: branches_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.branches_id_seq', 2, true);


--
-- Name: brands_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.brands_id_seq', 5, true);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: form_configs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.form_configs_id_seq', 4, true);


--
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);


--
-- Name: leads_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.leads_id_seq', 6, true);


--
-- Name: menu_items_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.menu_items_id_seq', 25, true);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 13, true);


--
-- Name: pages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pages_id_seq', 4, true);


--
-- Name: podcasts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.podcasts_id_seq', 1, true);


--
-- Name: settings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.settings_id_seq', 79, true);


--
-- Name: site_sections_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.site_sections_id_seq', 7, true);


--
-- Name: sliders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sliders_id_seq', 3, true);


--
-- Name: testimonials_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.testimonials_id_seq', 2, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 5, true);


--
-- Name: vehicle_categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.vehicle_categories_id_seq', 9, true);


--
-- Name: vehicle_images_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.vehicle_images_id_seq', 94, true);


--
-- Name: vehicles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.vehicles_id_seq', 28, true);


--
-- Name: activity_logs activity_logs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.activity_logs
    ADD CONSTRAINT activity_logs_pkey PRIMARY KEY (id);


--
-- Name: branches branches_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.branches
    ADD CONSTRAINT branches_pkey PRIMARY KEY (id);


--
-- Name: brands brands_name_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.brands
    ADD CONSTRAINT brands_name_unique UNIQUE (name);


--
-- Name: brands brands_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.brands
    ADD CONSTRAINT brands_pkey PRIMARY KEY (id);


--
-- Name: brands brands_slug_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.brands
    ADD CONSTRAINT brands_slug_unique UNIQUE (slug);


--
-- Name: cache_locks cache_locks_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);


--
-- Name: cache cache_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: form_configs form_configs_form_key_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.form_configs
    ADD CONSTRAINT form_configs_form_key_unique UNIQUE (form_key);


--
-- Name: form_configs form_configs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.form_configs
    ADD CONSTRAINT form_configs_pkey PRIMARY KEY (id);


--
-- Name: job_batches job_batches_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);


--
-- Name: jobs jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);


--
-- Name: leads leads_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.leads
    ADD CONSTRAINT leads_pkey PRIMARY KEY (id);


--
-- Name: menu_items menu_items_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.menu_items
    ADD CONSTRAINT menu_items_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: pages pages_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pages
    ADD CONSTRAINT pages_pkey PRIMARY KEY (id);


--
-- Name: pages pages_slug_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pages
    ADD CONSTRAINT pages_slug_unique UNIQUE (slug);


--
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- Name: podcasts podcasts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.podcasts
    ADD CONSTRAINT podcasts_pkey PRIMARY KEY (id);


--
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- Name: settings settings_key_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.settings
    ADD CONSTRAINT settings_key_unique UNIQUE (key);


--
-- Name: settings settings_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.settings
    ADD CONSTRAINT settings_pkey PRIMARY KEY (id);


--
-- Name: site_sections site_sections_key_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.site_sections
    ADD CONSTRAINT site_sections_key_unique UNIQUE (key);


--
-- Name: site_sections site_sections_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.site_sections
    ADD CONSTRAINT site_sections_pkey PRIMARY KEY (id);


--
-- Name: sliders sliders_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sliders
    ADD CONSTRAINT sliders_pkey PRIMARY KEY (id);


--
-- Name: testimonials testimonials_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.testimonials
    ADD CONSTRAINT testimonials_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: vehicle_categories vehicle_categories_name_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vehicle_categories
    ADD CONSTRAINT vehicle_categories_name_unique UNIQUE (name);


--
-- Name: vehicle_categories vehicle_categories_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vehicle_categories
    ADD CONSTRAINT vehicle_categories_pkey PRIMARY KEY (id);


--
-- Name: vehicle_categories vehicle_categories_slug_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vehicle_categories
    ADD CONSTRAINT vehicle_categories_slug_unique UNIQUE (slug);


--
-- Name: vehicle_images vehicle_images_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vehicle_images
    ADD CONSTRAINT vehicle_images_pkey PRIMARY KEY (id);


--
-- Name: vehicles vehicles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vehicles
    ADD CONSTRAINT vehicles_pkey PRIMARY KEY (id);


--
-- Name: vehicles vehicles_slug_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vehicles
    ADD CONSTRAINT vehicles_slug_unique UNIQUE (slug);


--
-- Name: vehicles vehicles_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vehicles
    ADD CONSTRAINT vehicles_uuid_unique UNIQUE (uuid);


--
-- Name: activity_logs_created_at_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX activity_logs_created_at_index ON public.activity_logs USING btree (created_at);


--
-- Name: activity_logs_entity_type_entity_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX activity_logs_entity_type_entity_id_index ON public.activity_logs USING btree (entity_type, entity_id);


--
-- Name: cache_expiration_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX cache_expiration_index ON public.cache USING btree (expiration);


--
-- Name: cache_locks_expiration_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX cache_locks_expiration_index ON public.cache_locks USING btree (expiration);


--
-- Name: failed_jobs_connection_queue_failed_at_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX failed_jobs_connection_queue_failed_at_index ON public.failed_jobs USING btree (connection, queue, failed_at);


--
-- Name: jobs_queue_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);


--
-- Name: leads_created_at_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX leads_created_at_index ON public.leads USING btree (created_at);


--
-- Name: leads_type_status_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX leads_type_status_index ON public.leads USING btree (type, status);


--
-- Name: menu_items_location_sort_order_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX menu_items_location_sort_order_index ON public.menu_items USING btree (location, sort_order);


--
-- Name: menu_items_parent_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX menu_items_parent_id_index ON public.menu_items USING btree (parent_id);


--
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


--
-- Name: site_sections_key_is_visible_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX site_sections_key_is_visible_index ON public.site_sections USING btree (key, is_visible);


--
-- Name: vehicle_images_vehicle_id_is_main_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX vehicle_images_vehicle_id_is_main_index ON public.vehicle_images USING btree (vehicle_id, is_main);


--
-- Name: vehicles_brand_id_vehicle_category_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX vehicles_brand_id_vehicle_category_id_index ON public.vehicles USING btree (brand_id, vehicle_category_id);


--
-- Name: vehicles_condition_status_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX vehicles_condition_status_index ON public.vehicles USING btree (condition, status);


--
-- Name: vehicles_price_usd_year_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX vehicles_price_usd_year_index ON public.vehicles USING btree (price_usd, year);


--
-- Name: vehicles_slug_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX vehicles_slug_index ON public.vehicles USING btree (slug);


--
-- Name: activity_logs activity_logs_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.activity_logs
    ADD CONSTRAINT activity_logs_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE SET NULL;


--
-- Name: leads leads_assigned_to_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.leads
    ADD CONSTRAINT leads_assigned_to_user_id_foreign FOREIGN KEY (assigned_to_user_id) REFERENCES public.users(id) ON DELETE SET NULL;


--
-- Name: leads leads_branch_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.leads
    ADD CONSTRAINT leads_branch_id_foreign FOREIGN KEY (branch_id) REFERENCES public.branches(id) ON DELETE SET NULL;


--
-- Name: leads leads_vehicle_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.leads
    ADD CONSTRAINT leads_vehicle_id_foreign FOREIGN KEY (vehicle_id) REFERENCES public.vehicles(id) ON DELETE SET NULL;


--
-- Name: menu_items menu_items_parent_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.menu_items
    ADD CONSTRAINT menu_items_parent_id_foreign FOREIGN KEY (parent_id) REFERENCES public.menu_items(id) ON DELETE CASCADE;


--
-- Name: vehicle_images vehicle_images_vehicle_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vehicle_images
    ADD CONSTRAINT vehicle_images_vehicle_id_foreign FOREIGN KEY (vehicle_id) REFERENCES public.vehicles(id) ON DELETE CASCADE;


--
-- Name: vehicles vehicles_branch_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vehicles
    ADD CONSTRAINT vehicles_branch_id_foreign FOREIGN KEY (branch_id) REFERENCES public.branches(id) ON DELETE SET NULL;


--
-- Name: vehicles vehicles_brand_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vehicles
    ADD CONSTRAINT vehicles_brand_id_foreign FOREIGN KEY (brand_id) REFERENCES public.brands(id) ON DELETE CASCADE;


--
-- Name: vehicles vehicles_vehicle_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vehicles
    ADD CONSTRAINT vehicles_vehicle_category_id_foreign FOREIGN KEY (vehicle_category_id) REFERENCES public.vehicle_categories(id) ON DELETE SET NULL;


--
-- PostgreSQL database dump complete
--

\unrestrict 9rXOCnr5k0GDdJ41AECcNsKSGS66nAii30EunLYCvGYdBrM5k0QUW3eWU36uAZH

