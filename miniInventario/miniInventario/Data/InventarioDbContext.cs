using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.EntityFrameworkCore;
using miniInventario.Models;

namespace miniInventario.Data
{
    public class InventarioDbContext : DbContext
    {
        public InventarioDbContext (DbContextOptions<InventarioDbContext> options) : base(options)
        {

        }

        public DbSet<producto> producto { get; set; }
        public DbSet<existencia> existencia { get; set;  }
    }
}
