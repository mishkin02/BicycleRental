--
-- PostgreSQL database dump
--

-- Dumped from database version 16.0
-- Dumped by pg_dump version 16.0

-- Started on 2024-03-13 23:16:28

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
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
-- TOC entry 216 (class 1259 OID 33722)
-- Name: Bicycles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Bicycles" (
    id integer NOT NULL,
    model_id integer NOT NULL,
    status boolean
);


ALTER TABLE public."Bicycles" OWNER TO postgres;

--
-- TOC entry 4820 (class 0 OID 0)
-- Dependencies: 216
-- Name: TABLE "Bicycles"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."Bicycles" IS 'Таблица с велосипедами:
id - идентификатор велосипеда
model_id - идентификатор модели велосипеда
Status - доступен ли велосипед для аренды: 1 - да, 0 - нет';


--
-- TOC entry 215 (class 1259 OID 33721)
-- Name: Bicycle _id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Bicycle _id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public."Bicycle _id_seq" OWNER TO postgres;

--
-- TOC entry 4821 (class 0 OID 0)
-- Dependencies: 215
-- Name: Bicycle _id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Bicycle _id_seq" OWNED BY public."Bicycles".id;


--
-- TOC entry 220 (class 1259 OID 33736)
-- Name: Customers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Customers" (
    id integer NOT NULL,
    first_name character varying(32) NOT NULL,
    last_name character varying(32),
    email character varying(100),
    phone_number character varying(18)
);


ALTER TABLE public."Customers" OWNER TO postgres;

--
-- TOC entry 4822 (class 0 OID 0)
-- Dependencies: 220
-- Name: TABLE "Customers"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."Customers" IS 'Таблица с клиентами:
id - идентификатор клиента
first_name - имя
last_name - фамилия
email - электронная почта
phone_number - номер телефона';


--
-- TOC entry 219 (class 1259 OID 33735)
-- Name: Customers_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Customers_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public."Customers_id_seq" OWNER TO postgres;

--
-- TOC entry 4823 (class 0 OID 0)
-- Dependencies: 219
-- Name: Customers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Customers_id_seq" OWNED BY public."Customers".id;


--
-- TOC entry 218 (class 1259 OID 33729)
-- Name: Models; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Models" (
    id integer NOT NULL,
    name character varying(64) NOT NULL,
    type character varying(32),
    rental_price_hour integer,
    rental_price_day integer
);


ALTER TABLE public."Models" OWNER TO postgres;

--
-- TOC entry 4824 (class 0 OID 0)
-- Dependencies: 218
-- Name: TABLE "Models"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."Models" IS 'Таблица с моделями велосипедов:
id - идентификатор модели
name - название модели
type - тип модели(горный/детский и т.д.)
rental_price_hour - цена проката почасовая
rental_price_day - цена проката за день';


--
-- TOC entry 217 (class 1259 OID 33728)
-- Name: Models_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Models_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public."Models_id_seq" OWNER TO postgres;

--
-- TOC entry 4825 (class 0 OID 0)
-- Dependencies: 217
-- Name: Models_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Models_id_seq" OWNED BY public."Models".id;


--
-- TOC entry 222 (class 1259 OID 33743)
-- Name: Rentals; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Rentals" (
    id integer NOT NULL,
    customer_id integer NOT NULL,
    bicycle_id integer NOT NULL,
    rental_date date NOT NULL,
    return_date date NOT NULL
);


ALTER TABLE public."Rentals" OWNER TO postgres;

--
-- TOC entry 4826 (class 0 OID 0)
-- Dependencies: 222
-- Name: TABLE "Rentals"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public."Rentals" IS 'Таблица с Арендами:
id - идентификатор аренды
customer_id - идентификатор клиента
bicycle_id - идентификатор арендуемого велосипеда
rental_date - дата начала аренды
return_date - дата возврата';


--
-- TOC entry 221 (class 1259 OID 33742)
-- Name: Rentals_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Rentals_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public."Rentals_id_seq" OWNER TO postgres;

--
-- TOC entry 4827 (class 0 OID 0)
-- Dependencies: 221
-- Name: Rentals_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Rentals_id_seq" OWNED BY public."Rentals".id;


--
-- TOC entry 4649 (class 2604 OID 33725)
-- Name: Bicycles id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Bicycles" ALTER COLUMN id SET DEFAULT nextval('public."Bicycle _id_seq"'::regclass);


--
-- TOC entry 4651 (class 2604 OID 33739)
-- Name: Customers id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Customers" ALTER COLUMN id SET DEFAULT nextval('public."Customers_id_seq"'::regclass);


--
-- TOC entry 4650 (class 2604 OID 33732)
-- Name: Models id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Models" ALTER COLUMN id SET DEFAULT nextval('public."Models_id_seq"'::regclass);


--
-- TOC entry 4652 (class 2604 OID 33746)
-- Name: Rentals id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Rentals" ALTER COLUMN id SET DEFAULT nextval('public."Rentals_id_seq"'::regclass);


--
-- TOC entry 4808 (class 0 OID 33722)
-- Dependencies: 216
-- Data for Name: Bicycles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Bicycles" (id, model_id, status) FROM stdin;
\.


--
-- TOC entry 4812 (class 0 OID 33736)
-- Dependencies: 220
-- Data for Name: Customers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Customers" (id, first_name, last_name, email, phone_number) FROM stdin;
\.


--
-- TOC entry 4810 (class 0 OID 33729)
-- Dependencies: 218
-- Data for Name: Models; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Models" (id, name, type, rental_price_hour, rental_price_day) FROM stdin;
\.


--
-- TOC entry 4814 (class 0 OID 33743)
-- Dependencies: 222
-- Data for Name: Rentals; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Rentals" (id, customer_id, bicycle_id, rental_date, return_date) FROM stdin;
\.


--
-- TOC entry 4828 (class 0 OID 0)
-- Dependencies: 215
-- Name: Bicycle _id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Bicycle _id_seq"', 1, false);


--
-- TOC entry 4829 (class 0 OID 0)
-- Dependencies: 219
-- Name: Customers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Customers_id_seq"', 1, false);


--
-- TOC entry 4830 (class 0 OID 0)
-- Dependencies: 217
-- Name: Models_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Models_id_seq"', 1, false);


--
-- TOC entry 4831 (class 0 OID 0)
-- Dependencies: 221
-- Name: Rentals_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Rentals_id_seq"', 1, false);


--
-- TOC entry 4654 (class 2606 OID 33727)
-- Name: Bicycles Bicycle _pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Bicycles"
    ADD CONSTRAINT "Bicycle _pkey" PRIMARY KEY (id);


--
-- TOC entry 4658 (class 2606 OID 33741)
-- Name: Customers Customers_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Customers"
    ADD CONSTRAINT "Customers_pkey" PRIMARY KEY (id);


--
-- TOC entry 4656 (class 2606 OID 33734)
-- Name: Models Models_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Models"
    ADD CONSTRAINT "Models_pkey" PRIMARY KEY (id);


--
-- TOC entry 4660 (class 2606 OID 33748)
-- Name: Rentals Rentals_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Rentals"
    ADD CONSTRAINT "Rentals_pkey" PRIMARY KEY (id);


--
-- TOC entry 4661 (class 2606 OID 33749)
-- Name: Bicycles Bicycles_model_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Bicycles"
    ADD CONSTRAINT "Bicycles_model_id_fkey" FOREIGN KEY (model_id) REFERENCES public."Models"(id) NOT VALID;


--
-- TOC entry 4662 (class 2606 OID 33759)
-- Name: Rentals Rentals_bicycle_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Rentals"
    ADD CONSTRAINT "Rentals_bicycle_id_fkey" FOREIGN KEY (bicycle_id) REFERENCES public."Bicycles"(id) NOT VALID;


--
-- TOC entry 4663 (class 2606 OID 33754)
-- Name: Rentals Rentals_customer_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Rentals"
    ADD CONSTRAINT "Rentals_customer_id_fkey" FOREIGN KEY (customer_id) REFERENCES public."Customers"(id) NOT VALID;


-- Completed on 2024-03-13 23:16:28

--
-- PostgreSQL database dump complete
--

