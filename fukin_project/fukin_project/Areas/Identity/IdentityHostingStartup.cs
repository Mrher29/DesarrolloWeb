using System;
using fukin_project.Areas.Identity.Data;
using fukin_project.Data;
using Microsoft.AspNetCore.Hosting;
using Microsoft.AspNetCore.Identity;
using Microsoft.AspNetCore.Identity.UI;
using Microsoft.EntityFrameworkCore;
using Microsoft.Extensions.Configuration;
using Microsoft.Extensions.DependencyInjection;

[assembly: HostingStartup(typeof(fukin_project.Areas.Identity.IdentityHostingStartup))]
namespace fukin_project.Areas.Identity
{
    public class IdentityHostingStartup : IHostingStartup
    {
        public void Configure(IWebHostBuilder builder)
        {
            builder.ConfigureServices((context, services) => {
                services.AddDbContext<fukin_projectContext>(options =>
                    options.UseSqlServer(
                        context.Configuration.GetConnectionString("fukin_projectContextConnection")));

                services.AddDefaultIdentity<fukin_projectUser>(options => {
                    options.SignIn.RequireConfirmedAccount = false;
                        options.Password.RequireLowercase = false;
                    options.Password.RequireUppercase = false; 
                })
                    .AddEntityFrameworkStores<fukin_projectContext>();
            });
        }
    }
}