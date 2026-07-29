# Registro de cambios

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
