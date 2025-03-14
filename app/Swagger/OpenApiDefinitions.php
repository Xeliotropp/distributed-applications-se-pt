<?php

namespace App\Swagger;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Laravel API",
 *     description="Laravel API Documentation",
 *     @OA\Contact(
 *         email="your.email@example.com",
 *         name="API Support"
 *     )
 * )
 * 
 * @OA\Server(
 *     url="http://localhost:8000",
 *     description="Local Development Server"
 * )
 * 
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 * /**
 * @OA\Schema(
 *     schema="Client",
 *     required={"name", "email", "phone"},
 *     @OA\Property(property="id", type="integer", format="int64", description="Client ID"),
 *     @OA\Property(property="name", type="string", description="Client name"),
 *     @OA\Property(property="email", type="string", format="email", description="Client email address"),
 *     @OA\Property(property="phone", type="string", description="Client phone number"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Creation date"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Last update date")
 * )
 *
 * /**
 * @OA\Schema(
 *     schema="Contractor",
 *     @OA\Property(property="id", type="integer", format="int64", description="Contractor ID"),
 *     @OA\Property(property="contractor_name", type="string", description="Contractor name"),
 *     @OA\Property(property="commission_percentage", type="number", format="float", description="Commission percentage"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Creation date"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Last update date")
 * )
 *
 * /**
 * @OA\Schema(
 *     schema="Task",
 *     @OA\Property(property="id", type="integer", format="int64", description="Task ID"),
 *     @OA\Property(property="title", type="string", description="Task title"),
 *     @OA\Property(property="client_id", type="integer", description="Client ID"),
 *     @OA\Property(property="status", type="string", description="Task status"),
 *     @OA\Property(property="mk", type="string", enum={"0","1"}, description="MK flag"),
 *     @OA\Property(property="mkcold", type="string", enum={"0","1"}, description="MK Cold flag"),
 *     @OA\Property(property="osv", type="string", enum={"0","1"}, description="OSV flag"),
 *     @OA\Property(property="osvEvak", type="string", enum={"0","1"}, description="OSV Evak flag"),
 *     @OA\Property(property="sh", type="string", enum={"0","1"}, description="SH flag"),
 *     @OA\Property(property="shobSgr", type="string", enum={"0","1"}, description="Shob SGR flag"),
 *     @OA\Property(property="shokolSr", type="string", enum={"0","1"}, description="Shokol SR flag"),
 *     @OA\Property(property="vent", type="string", enum={"0","1"}, description="Ventilation flag"),
 *     @OA\Property(property="klim", type="string", enum={"0","1"}, description="Climate flag"),
 *     @OA\Property(property="f0", type="string", enum={"0","1"}, description="F0 flag"),
 *     @OA\Property(property="z", type="string", enum={"0","1"}, description="Z flag"),
 *     @OA\Property(property="m", type="string", enum={"0","1"}, description="M flag"),
 *     @OA\Property(property="izol", type="string", enum={"0","1"}, description="Isolation flag"),
 *     @OA\Property(property="dtz", type="string", enum={"0","1"}, description="DTZ flag"),
 *     @OA\Property(property="mk_next", type="string", enum={"0","1"}, description="MK next flag"),
 *     @OA\Property(property="mkcold_next", type="string", enum={"0","1"}, description="MK Cold next flag"),
 *     @OA\Property(property="osv_next", type="string", enum={"0","1"}, description="OSV next flag"),
 *     @OA\Property(property="osvEvak_next", type="string", enum={"0","1"}, description="OSV Evak next flag"),
 *     @OA\Property(property="sh_next", type="string", enum={"0","1"}, description="SH next flag"),
 *     @OA\Property(property="shobSgr_next", type="string", enum={"0","1"}, description="Shob SGR next flag"),
 *     @OA\Property(property="shokolSr_next", type="string", enum={"0","1"}, description="Shokol SR next flag"),
 *     @OA\Property(property="vent_next", type="string", enum={"0","1"}, description="Ventilation next flag"),
 *     @OA\Property(property="klim_next", type="string", enum={"0","1"}, description="Climate next flag"),
 *     @OA\Property(property="f0_next", type="string", enum={"0","1"}, description="F0 next flag"),
 *     @OA\Property(property="z_next", type="string", enum={"0","1"}, description="Z next flag"),
 *     @OA\Property(property="m_next", type="string", enum={"0","1"}, description="M next flag"),
 *     @OA\Property(property="izol_next", type="string", enum={"0","1"}, description="Isolation next flag"),
 *     @OA\Property(property="dtz_next", type="string", enum={"0","1"}, description="DTZ next flag"),
 *     @OA\Property(property="paid", type="string", enum={"0","1"}, description="Paid flag"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Creation date"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Last update date")
 * )
 *
 */

class OpenApiDefinitions {}