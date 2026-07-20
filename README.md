# INTT — Instrucciones de instalación

> **⚠️ El orden de los pasos no es opcional.**
> Antes de importar el archivo XML, deben estar activos:
> - **ACF Pro** y el **tema `intt-theme`** — juntos registran los tipos de contenido
>   `oficina` y `tramite` (definidos en `intt-theme/acf-json/`).
> - El **tema** también registra el tipo de contenido `alerta_intt`.
>
> Si se importa el XML antes de activar ambos, WordPress descartará silenciosamente
> los 155+ registros de `oficina`, `tramite` y `alerta_intt`, sin mostrar ninguna advertencia.


## 1. Contenido del paquete

| Archivo / carpeta | Descripción |
|---|---|
| `intt-theme/` | Tema de bloques (FSE). Incluye `acf-json/`, que registra tipos de contenido, taxonomías y campos. |
| `intt-blocks/` | Plugin propio. Aporta cuatro bloques personalizados (megamenu, megamenu-col, nav-item, organization-chart). No interviene en la importación. |
| `uploads/` | Copia de respaldo de los archivos multimedia (ver sección 4). |
| `advanced-custom-fields-pro.zip` | Instalador de ACF Pro. |
| `intt.WordPress.2026-07-20.xml` | Contenido exportado en formato WXR. |

**Requisitos:** WordPress 6.5+, PHP 8.0+, ACF Pro (incluido).

> **Licencia de ACF Pro:** la licencia corre por nuestra cuenta. La clave se envía por
> separado (no se incluye en el repositorio por seguridad). Para activarla:
> **ACF → Actualizaciones** → pegar la clave → **Activar licencia**.
>
> **URL de staging:** no es requisito, pero si montan esto en una URL con "staging" en
> el dominio, la activación de la licencia de ACF es más simple (no consume una
> activación). Si es posible, avísenme el dominio y lo configuro de mi lado.


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

Este plugin no interviene en la importación, pero es necesario para que los bloques
personalizados del editor funcionen. Sin él, las páginas que los usan mostrarán
bloques rotos.

*Verificación:* en el editor de bloques deben aparecer los bloques de INTT.

**Paso 5 — Importar el contenido**

1. **Herramientas → Importar** → instalar y ejecutar el importador de **WordPress**.
2. Seleccionar `intt.WordPress.2026-07-20.xml`.
3. En la asignación de autores, asignar el contenido a un usuario administrador de INTT.
4. **Marcar la casilla "Descargar e importar archivos adjuntos".**
5. Ejecutar la importación.


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


## 4. Archivos multimedia

El XML referencia las imágenes por URL, así que se descargan automáticamente al marcar
la casilla del paso 5.

Si no aparecen, copiar el contenido de `uploads/` a `wp-content/uploads/` respetando la
estructura de subcarpetas, y usar un plugin como **Media Sync** para registrarlas en la
biblioteca de medios.


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


## Resumen del orden

```
1. Copiar intt-theme/ y intt-blocks/
2. Instalar + activar ACF Pro   ← necesario para oficina y tramite
3. Activar el tema              ← carga acf-json (campos, taxonomías) + registra alerta_intt
4. Activar el plugin            ← bloques del editor (no afecta la importación)
5. Importar el XML              ← SIEMPRE AL FINAL
```
