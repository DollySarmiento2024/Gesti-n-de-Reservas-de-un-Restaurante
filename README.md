# 🍽️ Restaurante DWES – Seguridad con Symfony

![Symfony](https://img.shields.io/badge/Symfony-6.4_LTS-black?logo=symfony)
![Docker](https://img.shields.io/badge/Docker-Containerized-blue?logo=docker)
![Estado](https://img.shields.io/badge/Estado-En%20desarrollo-orange)
![Licencia](https://img.shields.io/badge/Licencia-MIT-green)

El objetivo es demostrar el dominio de la **seguridad en Symfony** mediante el desarrollo de un sistema de gestión de usuarios y reservas para el **Restaurante DWES**, cumpliendo estándares de calidad y buenas prácticas.

---

## 🎯 Objetivos

- Aplicar los conocimientos de **Seguridad en Symfony**.
- Implementar un sistema de autenticación y autorización robusto.
- Gestionar usuarios y reservas con control de accesos según roles.
- Desplegar el proyecto en un entorno **Docker** aislado y funcional.

---

## ⚙️ Tecnologías

- **Symfony 6.4 LTS**
- **PHP 8.x**
- **Doctrine ORM**
- **Docker + Docker Compose**
- **MySQL**
- **Twig**

---

## 🚀 Funcionalidades principales

- **Registro de usuarios** con validación por correo electrónico.
- **Login / Logout** dinámico según el estado del usuario.
- **Perfil de usuario**: visualización y edición de datos personales.
- **Gestión de usuarios** (ROLE_ADMIN): alta, edición y eliminación.
- **Reservas**:
  - Creación de reservas (ROLE_RESER).
  - Visualización y eliminación por el propio usuario o un admin.
  - Administración global de reservas (ROLE_ADMIN).
- **Páginas públicas**: Carta, Localización, Quiénes somos, Inicio.

---

## 🗺️ Rutas principales

| Ruta | Descripción | Acceso |
|-------|-------------|---------|
| `/` | Página de inicio con descripción y accesos dinámicos | Público |
| `/registro` | Registro de nuevos usuarios | Público |
| `/login` | Inicio de sesión | Público |
| `/logout` | Cierre de sesión | Logueados |
| `/user` | Administración de usuarios | ROLE_ADMIN |
| `/user/profile` | Perfil del usuario | Logueados |
| `/reservas/new` | Crear reserva | ROLE_RESER |
| `/reservas` | Administración de reservas | ROLE_ADMIN |
| `/carta` | Carta del restaurante | Público |
| `/location` | Localización y horario | Público |
| `/about` | Historia del restaurante | Público |

👩‍💻 Autor

Fernanda Sarmiento 

📄 Licencia

Este proyecto está disponible bajo la licencia MIT.

