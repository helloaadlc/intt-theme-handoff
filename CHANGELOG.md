# Registro de cambios

---

## [2026-08-28]

### Pasos para aplicar la actualización

1. Reemplazar la carpeta `intt-theme/` en el servidor con la versión del repositorio
2. Reemplazar la carpeta `intt-blocks/` en el servidor con la versión del repositorio
3. Instalar el plugin **Relevanssi** (versión gratuita, desde el directorio oficial)
4. En el panel de WordPress: **ACF → Sincronizar** los grupos de campos con aviso pendiente
5. En el panel de WordPress: **Herramientas → Importar → WordPress** y subir `intt.WordPress.2026-08-28.xml`

### Qué cambió

**Biblioteca (nuevo)**
- Nuevo CPT `documento` con archive editable en `/biblioteca/`
- Bloque `biblioteca-list` para listar documentos por categoría
- Migración inicial de documentos técnicos (comité de expertos ONU, libros, manuales varios, normas técnicas, reglamentos técnicos)

**Búsqueda**
- Integración con Relevanssi para búsqueda con highlighting sobre `descripcion_corta`
- Página dedicada `/buscar/` como landing del ícono lupa
- Buscadores nativos en `/tramites/` y `/oficinas/` filtrados por CPT
- Configuración de Relevanssi Live Ajax con traducción `es_VE` completa

**Oficinas**
- Template `single-oficina` con filtros de excerpt y bypass en `pre_get_posts`
- Buscador nativo en la plantilla `/oficinas/`
- Link "Ver en el mapa" uniformado

**Trámites**
- Ordenamiento manual de tarjetas destacadas vía `menu_order` desde el editor
- Archivo del CPT habilitado con breadcrumbs
- Bloque `otros-destacados` eliminado (no se usaba en producción)
- Bloque `archivo-tramites-intro` para intro editable en el archivo

**Navegación**
- Megamenu reestructurado a 4 columnas con labels simplificados
- Ícono de búsqueda como primer item de navegación
- Link "Ubicaciones" al archivo de oficinas
- Template `404.html`

**Home**
- Hero y radio convertidos a partes de plantilla independientes
- Sección "otros-trámites" expandible con toggle "ver más"
- Sección de acceso rápido a la cuenta (`inicio-acceso`)

**Refactorización**
- Breadcrumbs unificados en single/taxonomy/archive de trámites
- Layout de archive y taxonomy estandarizado con single (columna derecha 800px, sidebar sticky)
- Reglas del grid centralizadas en `style.css` (eliminados `!important` y estilos inline)
- Tokenización de literales y unificación de breakpoints en 784px
- URLs absolutas de `intt-v2.local` convertidas a rutas relativas en partes de plantilla
- Token `radius.xs = 2px` agregado a `theme.json`

**Plugin `intt-blocks`**
- Bloque `organization-chart` retirado (reemplazado por patrón estático de bloques nativos)

---

## [2026-07-29]

### Pasos para aplicar la actualización

1. Reemplazar la carpeta `intt-theme/` en el servidor con la versión del repositorio
2. En el panel de WordPress: **ACF → Sincronizar** el grupo de campos `group_6a39bf31ca1a8`
3. En el panel de WordPress: **Herramientas → Importar → WordPress** y subir `intt.WordPress.2026-07-29.xml`

### Qué cambió

**Oficinas**
- Convención de nombres cambiada: `INTT - [Nombre]` → `Oficina [Nombre]`
- Campos de redes sociales eliminados
- Campo `Dirección` ahora es obligatorio
- Campos nuevos: `Municipio`, `Ubicación en el Mapa`, `URL de Google Maps`

**Trámites**
- Reorganización de permisos, autorizaciones y certificaciones
- Campo `imagen destacada` agregado

**Tema**
- Bloque `estado-cards` actualizado
- Bloque `oficina-card`: horario dividido en `horario_de_atencion` + `dias`
- Tom Select cargado vía CDN *(requiere conexión a internet)*
- Patrón `organigrama` agregado (bloques nativos)
