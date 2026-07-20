# INTT — Instrucciones de instalación

> **⚠️ El orden de los pasos no es opcional.**
> El tema y el plugin deben estar activados **antes** de importar el contenido.
> Si se importa el XML primero, WordPress descartará silenciosamente los registros de
> `oficina`, `tramite` y `alerta_intt`, sin mostrar ninguna advertencia.

---

## 1. Contenido del paquete

| Archivo / carpeta | Descripción |
|---|---|
| `intt-theme/` | Tema de bloques (FSE). Incluye `acf-json/`, que registra tipos de contenido, taxonomías y campos. |
| `intt-blocks/` | Plugin propio. Registra el tipo de contenido `alerta_intt` y cuatro bloques personalizados. |
| `uploads/` | Copia de respaldo de los archivos multimedia (ver sección 4). |
| `advanced-custom-fields-pro.zip` | Instalador de ACF Pro. |
| `intt.WordPress.2026-07-20.xml` | Contenido exportado en formato WXR. |

**Requisitos:** WordPress 6.5+, PHP 8.0+, ACF Pro (incluido).

> **Licencia de ACF Pro:** para recibir actualizaciones y soporte, INTT debe adquirir su
> propia licencia en advancedcustomfields.com/pro y registrarla en
> **Ajustes → Actualizaciones de ACF PRO**.

---

## 2. Instalación

**Paso 1 — Copiar los archivos**

```
intt-theme/   →  wp-content/themes/intt-theme/
intt-blocks/  →  wp-content/plugins/intt-blocks/
```

**Paso 2 — Instalar y activar ACF Pro**

**Plugins → Añadir nuevo → Subir plugin** → seleccionar `advanced-custom-fields-pro.zip` → instalar y activar.

**Paso 3 — Activar el tema**

**Apariencia → Temas** → activar **INTT Theme**.

*Verificación:* deben aparecer **Oficinas** y **Trámites** en el menú lateral. Si no aparecen, no continuar.

**Paso 4 — Activar el plugin**

**Plugins** → activar **INTT Blocks**.

*Verificación:* debe aparecer **Alertas** en el menú lateral.

**Paso 5 — Importar el contenido**

1. **Herramientas → Importar** → instalar y ejecutar el importador de **WordPress**.
2. Seleccionar `intt.WordPress.2026-07-20.xml`.
3. En la asignación de autores, asignar el contenido a un usuario administrador de INTT.
4. **Marcar la casilla "Descargar e importar archivos adjuntos".**
5. Ejecutar la importación.

---

## 3. Verificación

| Elemento | Cantidad esperada |
|---|---|
| Oficinas | 76 |
| Trámites | 78 |
| Alertas | 1 |
| Páginas | 7 |
| Entradas | 4 |
| Medios | 16 |

Además: abrir una oficina y un trámite y confirmar que los campos personalizados tienen datos; revisar el front-end; y comprobar en **Apariencia → Editor** que las plantillas cargan correctamente.

> En **ACF → Grupos de campos** puede aparecer el aviso *"Sincronización disponible"*.
> Es normal y se puede sincronizar sin riesgo.

---

## 4. Archivos multimedia

El XML referencia las imágenes por URL, así que se descargan automáticamente al marcar
la casilla del paso 5.

Si no aparecen, copiar el contenido de `uploads/` a `wp-content/uploads/` respetando la
estructura de subcarpetas, y usar un plugin como **Media Sync** para registrarlas en la
biblioteca de medios.

---

## 5. Notas técnicas

- **`intt-blocks`:** la carpeta `build/` contiene los bloques compilados y es la que usa
  WordPress. `src/` y `package.json` se incluyen para permitir modificaciones futuras.
  Para recompilar:

  ```bash
  cd wp-content/plugins/intt-blocks
  npm install
  npm run build
  ```

- **Tema de bloques (FSE):** las plantillas se editan desde **Apariencia → Editor**, no
  mediante archivos PHP.

---

## Resumen del orden

```
1. Copiar intt-theme/ y intt-blocks/
2. Instalar + activar ACF Pro
3. Activar el tema           ← registra oficina, tramite, taxonomías, campos
4. Activar el plugin         ← registra alerta_intt
5. Importar intt.WordPress.2026-07-20.xml  ← SIEMPRE AL FINAL
```
