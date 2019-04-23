<?php

/**
 * @SWG\Get(
 *     tags={"Companies"},
 *     path="/companies",
 *     summary="Get companies list",
 *     description="Get companies list",
 *
 *     @SWG\Response(response=200, description="OK: The request has succeeded."),
 *     @SWG\Response(response=401, description="UNAUTHORIZED: Authentication required."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
 *  * @SWG\Get(
 *     tags={"Companies"},
 *     path="/companies/{company_id}",
 *     summary="Get company by id",
 *     description="Get company by id",
 *     @SWG\Parameter(
 *         description="Company id",
 *         in="path",
 *         name="company_id",
 *         required=true,
 *         type="integer",
 *         format="int32"
 *     ),
 *     @SWG\Response(response=200, description="OK: The request has succeeded."),
 *     @SWG\Response(response=401, description="UNAUTHORIZED: Authentication required."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
 *
 *
 *TODO: SCHEMA
 *
 * * @SWG\Post(
 *     tags={"Companies"},
 *     path="/companies/create",
 *     summary="Create company",
 *     description="Create company",
 *     @SWG\Parameter(
 *         name="Company",
 *         in="body",
 *         required=true,
 *         @SWG\Schema(
 *             @SWG\Property(
 *                 property="name",
 *                 type="string"
 *             ),
 *             @SWG\Property(
 *                 property="descrtiption",
 *                 type="string"
 *             ),
 *             @SWG\Property(
 *                 property="phone",
 *                 type="string",
 *             ),
 *              @SWG\Property(
 *                 property="site",
 *                 type="string"
 *             ),
 *              @SWG\Property(
 *                 property="email",
 *                 type="string"
 *             ),
 *              @SWG\Property(
 *                 property="address",
 *                 type="point"
 *             ),
 *              @SWG\Property(
 *                 property="inn",
 *                 type="point"
 *             ),
 *              @SWG\Property(
 *                 property="kpp",
 *                 type="string"
 *             ),
 *              @SWG\Property(
 *                 property="ogrn",
 *                 type="string"
 *             ),
 *              @SWG\Property(
 *                 property="place",
 *                 type="string"
 *             ),
 *              @SWG\Property(
 *                 property="lat",
 *                 type="string"
 *             ),
 *             @SWG\Property(
 *                 property="lng",
 *                 type="string"
 *             ),
 *         )
 *     ),
 *     @SWG\Response(response=204, description="OK: The request has succeeded."),
 *     @SWG\Response(response=401, description="UNAUTHORIZED: Authentication required."),
 *     @SWG\Response(response=403, description="FORBIDDEN: You do not have the necessary rights."),
 *     @SWG\Response(response=422, description="UNPROCESSABLE ENTITY: Request validations error."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
 *
 * @SWG\Delete(
 *     tags={"Companies"},
 *     path="/companies/{company_id}",
 *     summary="Delete company",
 *     description="Delete company by id",
 *     @SWG\Parameter(
 *         description="company_id",
 *         in="path",
 *         name="company_id",
 *         required=true,
 *         type="string"
 *     ),
 *     @SWG\Response(response=204, description="OK: The request has succeeded."),
 *     @SWG\Response(response=401, description="UNAUTHORIZED: Authentication required."),
 *     @SWG\Response(response=403, description="FORBIDDEN: You do not have the necessary rights."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
 *
 * * @SWG\Put(
 *     tags={"Companies"},
 *     path="/api/companies/{company_id}",
 *     summary="Update company",
 *     description="Update company",
 *     @SWG\Parameter(
 *         description="Company id",
 *         in="path",
 *         name="company_id",
 *         required=true,
 *         type="integer",
 *         format="int32"
 *     ),
 *     @SWG\Parameter(
 *         name="User",
 *         in="body",
 *         required=true,
 *         @SWG\Schema(
 *             @SWG\Property(
 *                 property="name",
 *                 type="string"
 *             ),
 *             @SWG\Property(
 *                 property="descrtiption",
 *                 type="string"
 *             ),
 *             @SWG\Property(
 *                 property="phone",
 *                 type="string",
 *             ),
 *              @SWG\Property(
 *                 property="site",
 *                 type="string"
 *             ),
 *              @SWG\Property(
 *                 property="email",
 *                 type="string"
 *             ),
 *              @SWG\Property(
 *                 property="address",
 *                 type="point"
 *             ),
 *              @SWG\Property(
 *                 property="inn",
 *                 type="point"
 *             ),
 *              @SWG\Property(
 *                 property="kpp",
 *                 type="string"
 *             ),
 *              @SWG\Property(
 *                 property="ogrn",
 *                 type="string"
 *             ),
 *              @SWG\Property(
 *                 property="place",
 *                 type="string"
 *             ),
 *              @SWG\Property(
 *                 property="lat",
 *                 type="string"
 *             ),
 *             @SWG\Property(
 *                 property="lng",
 *                 type="string"
 *             ),
 *         )
 *     ),
 *     @SWG\Response(response=200, description="OK: The request has succeeded."),
 *     @SWG\Response(response=401, description="UNAUTHORIZED: Authentication required."),
 *     @SWG\Response(response=403, description="FORBIDDEN: You do not have the necessary rights."),
 *     @SWG\Response(response=422, description="UNPROCESSABLE ENTITY: Request validations error."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
 *
 *
 */
